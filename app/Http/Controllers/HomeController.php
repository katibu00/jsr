<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\PostResultSubmit;
use App\Models\PU;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        $data['lgas'] = LGA::all();
        $data['admins'] = User::where('usertype','admin')->count();
        $data['agents'] = User::where('usertype','agent')->count();
        $data['elections'] = Election::select('id','title','parties','accepting')->where('accepting', 1)->get();

        return view('admin',$data);
    }
    public function agent()
    {
       
        $data['pus'] = PU::select('id','name')->where('lga_id', auth()->user()->lga_id)->where('ward_id', auth()->user()->ward_id)->where('status',1)->get();
        $data['elections'] = Election::select('id','title')->where('accepting', 1)->get();
        return view('agent', $data);
    }
    public function coordinator()
    {
       
        $data['wards'] = Ward::select('id','name')->where('lga_id', auth()->user()->lga_id)->where('status',1)->get();
        // $data['elections'] = Election::select('id','title')->where('lga_id')->where('accepting', 1)->get();

        $data['elections'] = Election::where(function ($query) {
            $query->where('selected_lgas', 'LIKE', '%,'.auth()->user()->lga_id.',%');
        })->orWhere('lgas', '=', 'all')->get();

       
        return view('coordinator', $data);
    }
}
