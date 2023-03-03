<?php

namespace App\Http\Controllers;

use App\Models\LoginLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'login' => 'required|max:191',
            'password' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {

            $login = request()->input('login');

            $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone1';
            request()->merge([$fieldType => $login]);

            if (!auth()->attempt($request->only($fieldType, 'password'), $request->remember)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid Credentials',
                ]);
            }
            if (Auth::user()->status == 0) {
                return response()->json([
                    'status' => 401,
                    'message' => 'You are not active User. Please contact Admin.',
                ]);
            } 

            $log = new LoginLogs();
            $log->user_id = auth()->user()->id;
            $log->save();

            if (Auth::user()->usertype == 'user') {
                return response()->json([
                    'status' => 200,
                    'user' => 'user',
                ]);
            } else if (Auth::user()->usertype == 'agent') {
                return response()->json([
                    'status' => 200,
                    'user' => 'agent',
                ]);
            } else if (Auth::user()->usertype == 'admin') {
                return response()->json([
                    'status' => 200,
                    'user' => 'admin',
                ]);
            
            } else if (Auth::user()->usertype == 'coordinator') {
                return response()->json([
                    'status' => 200,
                    'user' => 'coordinator',
                ]);
            }else if (Auth::user()->usertype == 'ward') {
                return response()->json([
                    'status' => 200,
                    'user' => 'ward',
                ]);
            }else {
                return back()->with('status', 'You are not authorized to access this content');
            }

        }

    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'email|unique:users,email',
            'phone' => 'required|min:9|numeric|unique:users,phone1',
            'password' => 'required|min:8',
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
            $user->phone1 = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => 201,
                'message' => 'User Registered Successfully',
            ]);

        }

    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
