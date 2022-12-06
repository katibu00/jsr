<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\PostResult;
use App\Models\PP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostResultController extends Controller
{
    public function index()
    {
        $data['lgas'] = LGA::all();
        $data['elections'] = Election::where('accepting', 1)->get();
        return view('post_result.index', $data);
    }

    public function getElections(Request $request)
    {
        $election = Election::select('parties')->where('id', $request->election_id)->first();

        $party_ids = explode(',', $election->parties);

        $parties = [];
        foreach ($party_ids as $ids) {
            $row = PP::select('id', 'code')->where('id', $ids)->first();
            array_push($parties, $row);

        }
        $warn = 'no';
        $exist = PostResult::where('election_id',$request->election_id)->where('pu_id',$request->pu_id)->first();
        if($exist)
        {
            $warn = 'yes';
        }

        return response()->json([
            'parties' => $parties,
            'warn' => $warn,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'election_id' => 'required|max:191',
            'lga_id' => 'required|max:191',
            'ward_id' => 'required|max:191',
            'pu_id' => 'required|max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => $validator->messages(),
            ]);
        }
        $user_id = auth()->user()->id;

        $pu_exist = PostResult::select('id')->where('pu_id', $request->pu_id)->first();

        if ($pu_exist) {

            $rowCount = count($request->party_id);
            if ($rowCount != null) {
                for ($i = 0; $i < $rowCount; $i++) {
                    $data = PostResult::where('pu_id', $request->pu_id)->where('party_id', $request->party_id[$i])->first();
                    $data->votes = $request->votes[$i];
                    $data->update();
                }
            }

            return response()->json([
                'status' => 201,
                'message' => 'Election Result Updated Successfully',
            ]);
        }

        $rowCount = count($request->party_id);
        if ($rowCount != null) {
            for ($i = 0; $i < $rowCount; $i++) {
                $data = new PostResult();
                $data->election_id = $request->election_id;
                $data->lga_id = $request->lga_id;
                $data->ward_id = $request->ward_id;
                $data->pu_id = $request->pu_id;
                $data->party_id = $request->party_id[$i];
                $data->votes = $request->votes[$i];
                $data->user_id = $user_id;
                $data->save();
            }
        }

        return response()->json([
            'status' => 201,
            'message' => 'Election Result Posted Successfully',
        ]);
    }
}
