<?php

namespace App\Http\Controllers;

use App\Models\LGA;
use App\Models\LoginLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function agentsIndex()
    {
        $data['users'] = User::latest()->get();
        $data['lgas'] = LGA::all();
        return view('users.agents.index', $data);
    }
    public function loginLogs()
    {
        $data['logs'] = LoginLogs::paginate(15);
        return view('users.login_logs', $data);
    }

    public function agentsStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'email' => 'sometimes|unique:users,email',
            'phone1' => 'required|min:9|numeric|unique:users,phone1',
            'lga' => 'required|max:191',
            'ward' => 'required|max:191',
            'pu' => 'required|max:191',
            'role' => 'required',

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
            $user->usertype = $request->role;
            $user->phone1 = $request->phone1;
            $user->phone2 = $request->phone2;
            $user->email = $request->email;
            $user->lga_id = $request->lga;
            $user->ward_id = $request->ward;
            $user->pu_id = $request->pu;
            $user->gender = $request->gender;
            $user->marital = $request->marital;
            $password = Str::random(7, 'abcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()');
            $user->password = Hash::make($password);
            $user->pvc = $password;
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
        $user = User::where('id', $request->id)->first();

        if ($user->status == 0) {
            $user->status = 1;
            $user->usertype = 'agent';
            $user->update();

            return response()->json([
                'status' => 200,
                'message' => 'User Verified was sucessfully',
            ]);

        }
        if ($user->status == 1) {
            $user->status = 0;
            $user->usertype = 'user';
            $user->update();

            return response()->json([
                'status' => 200,
                'message' => 'User Unverified was sucessfully',
            ]);
        }

    }

    public function sort(Request $request)
    {
        if ($request->lga_id == 'all' && $request->usertype == 'all') {
            $data['users'] = User::all();
        }

        if ($request->lga_id != 'all' && $request->usertype == 'all') {
            $data['users'] = User::where('lga_id', $request->lga_id)->get();
        }

        if ($request->lga_id != 'all' && $request->usertype != 'all') {
            $data['users'] = User::where('lga_id', $request->lga_id)->where('usertype', $request->usertype)->get();
        }
        if ($request->lga_id == 'all' && $request->usertype != 'all') {
            $data['users'] = User::where('usertype', $request->usertype)->get();
        }

        if ($data['users']->count() > 0) {
            return view('users.agents.table', $data)->render();
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function sms(Request $request)
    {

        $user = User::find($request->id);

        $to = $user->phone1;
        
        if ($user->email != null) {
            $message = "Here is your jigawasituationroom.org login credentials: Email: " . $user->email . " Password: " . $user->pvc;
        } else {
            $message = "Here is your jigawasituationroom.org login credentials: Phone: " . $user->phone1 . " Password: " . $user->pvc;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.smartsmssolutions.com/io/api/client/v1/sms/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('token' => 'ZwF5tQ6UEexf0QZnriE8ziFcz04B57EVBJJBpKpnWShvlac2zA', 'sender' => 'KAT', 'to' => $to, 'message' => $message, 'type' => '0', 'routing' => '3', 'ref_id' => 'unique-ref-id', 'simserver_token' => 'simserver-token', 'dlr_timeout' => 'dlr-timeout'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response);

        if ($data->code != 1000) {

            return response()->json([
                'status' => 404,
                'message' => 'Error Occurred',
            ]);

        } else {

            return response()->json([
                'status' => 200,
                'message' => 'Message Sent Successfully',
            ]);
        }
    }
    public function delete(Request $request)
    {
        $data = User::find($request->id);
        if ($data->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'User Deleted Successfully',
            ]);
        };
    }

}
