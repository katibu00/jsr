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
        $data['agents'] = User::paginate(3);
        $data['lgas'] = LGA::all();
        return view('users.agents.index',$data);
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
            $user->usertype = 'user';
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
       $user = User::find($request->id);

       return response()->json([
        'status' => 200,
        'user' => $user,
    ]);
    }
}
