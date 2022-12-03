<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\LGA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LGAController extends Controller
{
    public function index()
    {
        $data['lgas'] = LGA::orderBy('name')->get();
        return view('setup.lga.index',$data);
    }

    public function store(Request $request)
    {
        $classCount = count($request->name);
        if($classCount != NULL){
            for ($i=0; $i < $classCount; $i++){
                $data = new LGA();
                $data->name = $request->name[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>200,
            'message'=>'LGA(s) Created Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = LGA::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'LGA Deleted Successfully'
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
      
        $data = LGA::findOrFail($request->id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'LGA Updated Successfully',
        ]);
    }
}
