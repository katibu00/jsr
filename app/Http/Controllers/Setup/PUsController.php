<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\LGA;
use App\Models\PU;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PUsController extends Controller
{
    public function index()
    {
        $data['lgas'] = LGA::orderBy('name')->get();
        return view('setup.pus.index',$data);
    }

    public function store(Request $request)
    {
      

        $rowCount = count($request->name);
        if($rowCount != NULL){
            for ($i=0; $i < $rowCount; $i++){
                $data = new PU();
                $data->name = $request->name[$i];
                $data->lga_id = $request->lga;
                $data->ward_id = $request->ward;
                $data->voters = $request->voters[$i];
                $data->save();
            }
        }

        return response()->json([
            'status'=>200,
            'message'=>'Polling Units Created Successfully',
        ]);
    }

    public function delete(Request $request){
       
        $data = PU::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'PU Deleted Successfully'
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
      
        $data = PU::findOrFail($request->id);
        $data->name = $request->name;
        $data->voters = $request->voters;
        $data->status = $request->status;
        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'PU Updated Successfully',
        ]);
    }

    public function getWards(Request $request)
    {
        $wards = Ward::select('name','id')->where('lga_id',$request->lga_id)->get();
        return response()->json([
            'wards'=>$wards,
        ]);
    }
    public function getPUs(Request $request)
    {
        $pus = PU::select('name','id','voters','status')->where('lga_id',$request->lga_id)->where('ward_id',$request->ward_id)->get();
        return response()->json([
            'pus'=>$pus,
        ]);
    }
    
}
