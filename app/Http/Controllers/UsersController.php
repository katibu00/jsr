<?php

namespace App\Http\Controllers;

use App\Models\LGA;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function agentsIndex()
    {
        $data['users'] = User::all();
        $data['lgas'] = LGA::all();
        return view('users.agents.index', $data);
    }

    public function agentsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email',
            'phone1' => 'required|min:9|numeric|unique:users,phone1',
            'lga' => 'required|max:191',
            'ward' => 'required|max:191',
            'pu' => 'required|max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'errors' => $validator->messages(),
            ]);
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->status = 1;
            $user->usertype = 'agent';
            $user->phone1 = $request->phone1;
            $user->phone2 = $request->phone2;
            $user->email = $request->email;
            $user->lga_id = $request->lga;
            $user->ward_id = $request->ward;
            $user->pu_id = $request->pu;
            $user->gender = $request->gender;
            $user->marital = $request->marital;
            $user->password = Hash::make(123);
            $user->save();

            return response()->json([
                'status' => 201,
                'message' => 'User Registered Successfully',
            ]);

        }
    }

    public function getDetails(Request $request)
    {
        $user = User::with(['lga', 'ward', 'pu'])->find($request->id);

        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }
    public function verify(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        
        if($user->status == 0)
        {
            $user->status = 1;
            $user->update();

            return response()->json([
                'status' => 200,
                'message' => 'User Verified was sucessfully',
            ]);
           
        }
        if($user->status == 1)
        {
            $user->status = 0;
            $user->update();

            return response()->json([
                'status' => 200,
                'message' => 'User Unverified was sucessfully',
            ]);
        }
       
    }

    public function sort(Request $request)
    {
        if($request->lga_id == 'all' && $request->usertype == 'all')
        {
          $data['users'] = User::all();
        }
       
        if($request->lga_id != 'all' && $request->usertype == 'all')
        {
          $data['users'] = User::where('lga_id',$request->lga_id)->get();
        }

        if($request->lga_id != 'all' && $request->usertype != 'all')
        {
          $data['users'] = User::where('lga_id',$request->lga_id)->where('usertype',$request->usertype)->get();
        }
        if($request->lga_id == 'all' && $request->usertype != 'all')
        {
          $data['users'] = User::where('usertype',$request->usertype)->get();
        }
      
        if( $data['users']->count() > 0)
        {
            return view('users.agents.table', $data)->render();
        }else
        {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

}
