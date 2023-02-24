<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\PP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElectionsController extends Controller
{
    public function index()
    {
        $data['elections'] = Election::all();
        $data['parties'] = PP::where('id','!=',0)->get();
        $data['lgas'] = LGA::all();
        return view('elections.index',$data);
    }

    public function store(Request $request)
    {
    //    return $request->all();

    $validator = Validator::make($request->all(), [
        'title' => 'required|max:191',
        'parties' => 'required|max:191',
        'lgas' => 'required|max:191',
        'date' => 'required|max:191',

    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 401,
            'errors' => $validator->messages(),
        ]);
    } 
        $data = new Election();
        $data->title = $request->title;
        $data->date = $request->date;
        $data->parties = implode(',', $request->parties);
        $data->lgas = $request->lgas;
        if($request->lgas == 'selected')
        {
            $data->selected_lgas = implode(',', $request->selected_lgas); 
        }else
        {
            $data->selected_lgas = null;
        }
        $data->save();

        return response()->json([
            'status' => 201,
            'message' => 'Election Registered Successfully',
        ]);
    }


    public function delete(Request $request){
        $data = Election::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Election Deleted Successfully'
            ]);
        };
    }

    public function accepting(Request $request)
    {
        $election = Election::where('id', $request->id)->first();

        if ($election->accepting == 0) {
            $election->accepting = 1;
            $election->update();

            return response()->json([
                'status' => 200,
                'message' => 'Collation has Started sucessfully',
            ]);

        }
        if ($election->accepting == 1) {
            $election->accepting = 0;
            $election->update();

            return response()->json([
                'status' => 200,
                'message' => 'Collation has been Stopped sucessfully',
            ]);

        }
       

    }


}
