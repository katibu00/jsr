<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\PU;
use App\Models\User;
use App\Models\Ward;

class HomeController extends Controller
{
    public function admin()
    {
        $data['lgas'] = LGA::all();
        $data['admins'] = User::where('usertype','admin')->get()->count();
        $data['agents'] = User::where('usertype','agent')->get()->count();
        $data['coordinators'] = User::where('usertype','coordinator')->get()->count();
        $data['wards'] = User::where('usertype','ward')->get()->count();
        $data['elections'] = Election::select('id','title','parties','accepting','selected_lgas','lgas')->where('accepting', 1)->get();

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
       
        $lgaId = auth()->user()->lga_id;
        $data['elections'] = Election::select('id','title')->where('accepting', '=', 1)
                     ->where(function ($query) use ($lgaId) {
                         $query->where('selected_lgas', 'LIKE', '%,'.$lgaId.',%')
                               ->orWhere('selected_lgas', 'LIKE', $lgaId.',%')
                               ->orWhere('selected_lgas', 'LIKE', '%,'.$lgaId)
                               ->orWhere('selected_lgas', '=', $lgaId);
                     })
                     ->orWhere('lgas', '=', 'all')
                     ->get();

        return view('coordinator', $data);
    }
    public function ward()
    {
       
        $data['wards'] = Ward::select('id','name')->where('id', auth()->user()->ward_id)->get();
       
        $lgaId = auth()->user()->lga_id;
        $data['elections'] = Election::select('id','title')->where('accepting', '=', 1)
                     ->where(function ($query) use ($lgaId) {
                         $query->where('selected_lgas', 'LIKE', '%,'.$lgaId.',%')
                               ->orWhere('selected_lgas', 'LIKE', $lgaId.',%')
                               ->orWhere('selected_lgas', 'LIKE', '%,'.$lgaId)
                               ->orWhere('selected_lgas', '=', $lgaId);
                     })
                     ->orWhere('lgas', '=', 'all')
                     ->get();

        return view('ward', $data);
    }
}
