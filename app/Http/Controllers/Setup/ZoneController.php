<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\LGA;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;


class ZoneController extends Controller
{
    public function index()
    {
        $data['zones'] = Zone::get();
        $data['lgas'] = LGA::orderBy('name')->get();
        return view('setup.zones.index',$data);
    }

    public function store(Request $request)
    {
        $data = new Zone();
        $data->name = $request->name;
        $data->lga_id = implode(',', $request->lgas);
        $data->save();

        return response()->json([
            'status' => 200,
            'message' => 'Zone has been Created sucessfully'
        ]);
    }

    public function delete(Request $request){
        $data = Zone::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Zone Deleted Successfully'
            ]);
        };
    }

}
