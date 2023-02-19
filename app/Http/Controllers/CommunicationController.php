<?php

namespace App\Http\Controllers;

use App\Models\LGA;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index()
    {
        $data['lgas'] = LGA::all();
        return view('communication.index',$data);
    }
    
    public function balance()
    {
      

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://app.smartsmssolutions.com/io/api/client/v1/balance/?token=ZwF5tQ6UEexf0QZnriE8ziFcz04B57EVBJJBpKpnWShvlac2zA',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
     
        return view('communication.balance',['balance'=>$response]);
    }

    public function send(Request $request)
    {
        if($request->ward_id == 'all')
        {
            $users = User::where('lga_id', $request->lga_id)->pluck('phone1')->toArray(); 
        }
        else
        {
            $users = User::where('lga_id', $request->lga_id)->where('ward_id',$request->ward_id)->pluck('phone1')->toArray();
        }
        // dd($request->all()); 
        $count = count($users);
        if($count == 0){
            Toastr::error('No users found in the selected LG/Ward.');
            return redirect()->route('communication.index');
        }
        // return $count;


        
        $to = implode(',',$users);
       
        $message = $request->message;

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
        CURLOPT_POSTFIELDS => array('token' => 'ZwF5tQ6UEexf0QZnriE8ziFcz04B57EVBJJBpKpnWShvlac2zA','sender' => 'KAT','to' => $to,'message' => $message,'type' => '0','routing' => '3','ref_id' => 'unique-ref-id','simserver_token' => 'simserver-token','dlr_timeout' => 'dlr-timeout'),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
     
       
        $data = json_decode($response);
       
        if ($data->code != 1000) {

            Toastr::error('Error Occured.', 'error');
            return redirect()->route('communication.index');

        } else 
        {
            Toastr::success('Message Sent to '.$count.' Users');
            return redirect()->route('communication.index');
        }

    }
}
