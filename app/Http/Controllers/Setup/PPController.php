<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\PP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as File;
use Illuminate\Support\Facades\Validator;

class PPController extends Controller
{
    public function index()
    {
        $data['pps'] = PP::where('id','!=',0)->orderBy('name')->get();
        return view('setup.pp.index',$data);
    }

    public function store(Request $request)
    {

       
    
        $data = new PP();
        $data->name = $request->name;
        $data->code = $request->code;
        $data->color = $request->color;
        $data->border = $request->border;
        
        $destination = 'uploads'; 
            
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file = $request->file('logo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads',$filename);

        $data->logo = $filename;
        $data->save();
           
        

        return response()->json([
            'status'=>200,
            'message'=>'Party Created Successfully',
        ]);
    }

    public function delete(Request $request){
        $data = PP::find($request->id);
        if($data->delete()){
            return response()->json([
                'status' => 200,
                'message' => 'Political Party Deleted Successfully'
            ]);
        };
    }


    public function update(Request $request)
    {
      
        $data = PP::find($request->update_id);
        $data->name = $request->edit_name;
        $data->code = $request->edit_code;
        $data->border = $request->edit_border;
        $data->color = $request->edit_color;

        if ($request->file('edit_logo') != null) {

            $destination = 'uploads'; 
            
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('edit_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads',$filename);
    
            $data->logo = $filename;
            
        }
       

        $data->update();

        return response()->json([
            'status'=>200,
            'message'=>'Political Party Updated Successfully',
        ]);
    }
}
