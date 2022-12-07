<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\PostResult;
use App\Models\PostResultSubmit;
use App\Models\PP;
use App\Models\PU;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CollationController extends Controller
{
    public function index()
    {
        $data['elections'] = Election::select('id','title')->get();
        return view('collation.index',$data);
    }

    public function getResult(Request $request)
    {
        $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();
        $party_ids = explode(',', $election->parties); 
        array_push($party_ids,'0');
        

        $parties = [];
        $scores = [];
        foreach ($party_ids as $ids) {
            $code = PP::select('id', 'code')->where('id', $ids)->first();
            array_push($parties, $code->code);
            $score = PostResult::select('votes')->where('election_id',$request->election_id)->where('party_id',$code->id)->sum('votes');
            array_push($scores, $score);

        }

        $data['labels'] = (json_encode($parties)); 
        $data['values'] = (json_encode($scores)); 
        $data['title'] = $election->title;
        $data['elections'] = Election::select('id','title')->get();
        $data['collected_pu'] = PostResultSubmit::select('pu_id')->where('election_id',$request->election_id)->groupBy('pu_id')->get()->count();
      
        if($election->lgas == 'all')
        {
            $data['total_pu'] = PU::select('id')->where('status',1)->count();
        }else
        {
            $total_pus = 0;
            $lga_ids = explode(',', $election->selected_lgas);
            foreach ($lga_ids as $lg_id) {
                $pus = PU::select('id')->where('lga_id',$lg_id)->count();
                $total_pus += $pus; 
            }
            $data['total_pu'] = $total_pus;
        }
        $data['election_id'] = $request->election_id;
       
        return view('collation.index',$data);
    }
}
