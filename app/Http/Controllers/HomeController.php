<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        $data['lgas'] = LGA::all();
        $data['admins'] = User::where('usertype','admin')->count();
        $data['agents'] = User::where('usertype','agent')->count();
        return view('admin',$data);
    }
    public function agent()
    {
        if(auth()->user()->usertype == 'admin')
        {
            $data['lgas'] = LGA::all();
        }else
        {
            $data['lgas'] = LGA::where('id',auth()->user()->lga_id)->get();
        }
        $data['elections'] = Election::where('accepting', 1)->get();
        return view('post_result.index', $data);
    }
}
