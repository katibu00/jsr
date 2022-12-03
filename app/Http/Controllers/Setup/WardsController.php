<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\LGA;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardsController extends Controller
{
    public function index()
    {
        $data['allData'] = LGA::orderBy('name')->paginate(5);
        $data['lgas'] = LGA::orderBy('name')->get();
        return view('setup.wards.index',$data);
    }

    public function store(Request $request)
    {

        $classCount = count($request->name);
        if($classCount != NULL){
            for ($i=0; $i < $classCount; $i++){
                $data = new Ward();
                $data->lga_id = $request->lga;
                $data->name = $request->name[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>200,
            'message'=>'Wards Created Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = Ward::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Ward Deleted Successfully'
            ]);
        };
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
        ]);
       
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
      
        $data = Ward::findOrFail($request->id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'Ward Updated Successfully',
        ]);
    }
}
