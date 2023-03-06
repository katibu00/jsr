<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\PostResult;
use App\Models\PostResultSubmit;
use App\Models\PP;
use App\Models\PU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostResultController extends Controller
{
    public function index()
    {
        $lgaId = auth()->user()->lga_id;
        if(auth()->user()->usertype == 'admin')
        {
            $data['lgas'] = LGA::all();
            $data['elections'] = Election::all();

        }else
        {
            $data['lgas'] = LGA::where('id',auth()->user()->lga_id)->get();
            $data['elections'] = Election::select('id','title')->where('accepting', '=', 1)
            ->where(function ($query) use ($lgaId) {
                $query->where('selected_lgas', 'LIKE', '%,'.$lgaId.',%')
                      ->orWhere('selected_lgas', 'LIKE', $lgaId.',%')
                      ->orWhere('selected_lgas', 'LIKE', '%,'.$lgaId)
                      ->orWhere('selected_lgas', '=', $lgaId);
            })
            ->orWhere('lgas', '=', 'all')
            ->get();
        }       

        return view('post_result.index', $data);
    }
    public function indexWard()
    {
        $lgaId = auth()->user()->lga_id;
        if(auth()->user()->usertype == 'admin')
        {
            $data['lgas'] = LGA::all();
            $data['elections'] = Election::all();

        }else
        {
            $data['lgas'] = LGA::where('id',auth()->user()->lga_id)->get();
            $data['elections'] = Election::select('id','title')->where('accepting', '=', 1)
            ->where(function ($query) use ($lgaId) {
                $query->where('selected_lgas', 'LIKE', '%,'.$lgaId.',%')
                      ->orWhere('selected_lgas', 'LIKE', $lgaId.',%')
                      ->orWhere('selected_lgas', 'LIKE', '%,'.$lgaId)
                      ->orWhere('selected_lgas', '=', $lgaId);
            })
            ->orWhere('lgas', '=', 'all')
            ->get();
        }       
        return view('post_result.ward.index', $data);
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
        return response()->json([
            'parties' => $parties,
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
        $election = Election::find($request->election_id);
        if($election->accepting != 1)
        {
            return response()->json([
                'status' => 400,
                'message' => "Result Collation not enabled for the selected Election",
            ]);
        }
        $user_id = auth()->user()->id;

        $ward_exist = PostResultSubmit::select('id')->where('election_id', $request->election_id)->where('pu_id', $request->pu_id)->first();

        if ($ward_exist) {

            $rowCount = count($request->party_id);
            if ($rowCount != null) {
                for ($i = 0; $i < $rowCount; $i++) {
                    $data = PostResult::where('post_submit_id',$ward_exist->id)->where('party_id', $request->party_id[$i])->first();
                    $data->votes = $request->votes[$i];
                    $data->update();
                }
            }

            $ward_exist->registered = $request->registered;
            $ward_exist->accredited = $request->accredited;
            $ward_exist->valid = $request->valid;
            $ward_exist->rejected = $request->rejected;
            $ward_exist->update();

            return response()->json([
                'status' => 201,
                'message' => 'Election Result Updated Successfully',
            ]);
        }

        $submit = new PostResultSubmit();
        $submit->election_id = $request->election_id;
        $submit->lga_id = $request->lga_id;
        $submit->ward_id = $request->ward_id;
        $submit->pu_id = $request->pu_id;
        $submit->user_id = $user_id;
        $submit->registered = $request->registered;
        $submit->accredited = $request->accredited;
        $submit->valid = $request->valid;
        $submit->rejected = $request->rejected;
        $submit->save();

        $rowCount = count($request->party_id);
        if ($rowCount != null) {
            for ($i = 0; $i < $rowCount; $i++) {
                $data = new PostResult();
                $data->post_submit_id = $submit->id;
                $data->election_id = $request->election_id;
                $data->lga_id = $request->lga_id;
                $data->party_id = $request->party_id[$i];
                $data->votes = $request->votes[$i];
                $data->save();
            }
        }

        return response()->json([
            'status' => 201,
            'message' => 'Election Result Posted Successfully',
        ]);
    }
    public function storeWard(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'election_id' => 'required|max:191',
            'lga_id' => 'required|max:191',
            'ward_id' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => $validator->messages(),
            ]);
        }
        $election = Election::find($request->election_id);
        if($election->accepting != 1)
        {
            return response()->json([
                'status' => 400,
                'message' => "Result Collation not enabled for the selected Election",
            ]);
        }
        $user_id = auth()->user()->id;

        $ward_exist = PostResultSubmit::select('id')->where('election_id', $request->election_id)->where('ward_id', $request->ward_id)->whereNotNull('wards_count')->first();

        if ($ward_exist) {

            $rowCount = count($request->party_id);
            if ($rowCount != null) {
                for ($i = 0; $i < $rowCount; $i++) {
                    $data = PostResult::where('post_submit_id',$ward_exist->id)->where('party_id', $request->party_id[$i])->first();
                    $data->votes = $request->votes[$i];
                    $data->update();
                }
            }

            $ward_exist->registered = $request->hidden_registered;
            $ward_exist->accredited = $request->accredited;
            $ward_exist->valid = $request->valid;
            $ward_exist->rejected = $request->rejected;
            $ward_exist->update();

            return response()->json([
                'status' => 201,
                'message' => 'Election Result Updated Successfully',
            ]);
        }

        $submit = new PostResultSubmit();
        $submit->election_id = $request->election_id;
        $submit->lga_id = $request->lga_id;
        $submit->ward_id = $request->ward_id;
        $submit->user_id = $user_id;
        $submit->registered = $request->hidden_registered;
        $submit->accredited = $request->accredited;
        $submit->valid = $request->valid;
        $submit->rejected = $request->rejected;

        $count = PU::select('id')->where('ward_id',$request->ward_id)->count();
        $submit->wards_count = $count;
        $submit->save();

        $rowCount = count($request->party_id);
        if ($rowCount != null) {
            for ($i = 0; $i < $rowCount; $i++) {
                $data = new PostResult();
                $data->post_submit_id = $submit->id;
                $data->election_id = $request->election_id;
                $data->lga_id = $request->lga_id;
                $data->party_id = $request->party_id[$i];
                $data->votes = $request->votes[$i];
                $data->save();
            }
        }

        return response()->json([
            'status' => 201,
            'message' => 'Election Result Posted Successfully',
        ]);
    }
}
