<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\LGA;
use App\Models\PostResult;
use App\Models\PostResultSubmit;
use App\Models\PP;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class CollationController extends Controller
{
    public function index()
    {
        $data['elections'] = Election::select('id','title')->get();
        $data['lgass'] = LGA::select('id','name')->get();
        return view('collation.index',$data);
    }
    public function reportIndex()
    {
        $data['elections'] = Election::select('id','title')->get();
        $data['lgass'] = LGA::select('id','name')->get();
        return view('report.index',$data);
    }

    public function getResult(Request $request)
    {


        if($request->type == 'party')
        {
            $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();
            $party_ids = explode(',', $election->parties); 
            array_push($party_ids,'0');
            
    
            $parties = [];
            $scores = [];
            $colors = [];
            $borders = [];
            foreach ($party_ids as $ids) {
                $code = PP::select('id', 'code','color','border')->where('id', $ids)->first();
                array_push($parties, $code->code);
                $score = PostResult::select('votes')->where('election_id',$request->election_id)->where('party_id',$code->id)->sum('votes');
                array_push($scores, $score);
                array_push($colors, $code->color);
                array_push($borders, $code->border);
    
            }
    
            $data['labels'] = (json_encode($parties)); 
            $data['values'] = (json_encode($scores)); 
            $data['colors'] = (json_encode($colors)); 
            $data['borders'] = (json_encode($borders)); 
            $data['title'] = $election->title;
            $data['elections'] = Election::select('id','title')->get();
            $data['collected_pu'] = PostResultSubmit::select('ward_id')->where('election_id',$request->election_id)->groupBy('ward_id')->get()->count();
          
            if($election->lgas == 'all')
            {
                $data['total_pu'] = 0;
                $lga_ids = LGA::select('id')->get();
                foreach ($lga_ids as $lg_id) {
                    $wards = Ward::select('id')->where('lga_id',$lg_id->id)->get()->count();
                    $data['total_pu'] += $wards; 
                }
            }else
            {
                $total_pus = 0;
                $lga_ids = explode(',', $election->selected_lgas);
                foreach ($lga_ids as $lg_id) {
                    $pus = Ward::select('id')->where('lga_id',$lg_id)->count();
                    $total_pus += $pus; 
                }
                $data['total_pu'] = $total_pus;
            }
            $data['election_id'] = $request->election_id;
            $data['type'] = $request->type;

            $data['registered'] = PostResultSubmit::where('election_id',$request->election_id)->sum('registered');
            $data['accredited'] = PostResultSubmit::where('election_id',$request->election_id)->sum('accredited');
            $data['valid'] = PostResultSubmit::where('election_id',$request->election_id)->sum('valid');
            $data['rejected'] = PostResultSubmit::where('election_id',$request->election_id)->sum('rejected');
        }
        if($request->type == 'party_lg')
        {
            $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();
            $party_ids = explode(',', $election->parties); 
            array_push($party_ids,'0');
            
    
            $parties = [];
            $scores = [];
            $colors = [];
            $borders = [];
            foreach ($party_ids as $ids) {
                $code = PP::select('id', 'code','color','border')->where('id', $ids)->first();
                array_push($parties, $code->code);
                $score = PostResult::select('votes')->where('election_id',$request->election_id)->where('lga_id',$request->lga_id)->where('party_id',$code->id)->sum('votes');
                array_push($scores, $score);
                array_push($colors, $code->color);
                array_push($borders, $code->border);
    
            }
    
            $data['labels'] = (json_encode($parties)); 
            $data['values'] = (json_encode($scores)); 
            $data['colors'] = (json_encode($colors)); 
            $data['borders'] = (json_encode($borders)); 
            $data['title'] = $election->title;
            $data['elections'] = Election::select('id','title')->get();
            $data['collected_pu'] = PostResultSubmit::select('ward_id')->where('election_id',$request->election_id)->where('lga_id',$request->lga_id)->groupBy('ward_id')->get()->count();
            $data['total_pu'] = Ward::select('id')->where('status',1)->where('lga_id',$request->lga_id)->count();
          
            $data['election_id'] = $request->election_id;
            $data['send_lga_id'] = $request->lga_id;
            $data['type'] = $request->type;
            $data['lga_name'] = LGA::find($request->lga_id);

            $data['registered'] = PostResultSubmit::where('election_id',$request->election_id)->where('lga_id',$request->lga_id)->sum('registered');
            $data['accredited'] = PostResultSubmit::where('election_id',$request->election_id)->where('lga_id',$request->lga_id)->sum('accredited');
            $data['valid'] = PostResultSubmit::where('election_id',$request->election_id)->where('lga_id',$request->lga_id)->sum('valid');
            $data['rejected'] = PostResultSubmit::where('election_id',$request->election_id)->where('lga_id',$request->lga_id)->sum('rejected');
        }

       

        if($request->type == 'ward_lg')
        {
            $data['elections'] = Election::select('id','title')->get();
            $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();

            $lgas = Ward::where('lga_id', $request->lga_id)->pluck('name')->toArray();
            $data['lga'] = (json_encode($lgas)); 
            $data['parties'] = PP::select('id','code')->get(); 
            $data['ward_ids'] = Ward::select('id')->where('lga_id', $request->lga_id)->get(); 

            $data['election_id'] = $request->election_id;
            $data['type'] = $request->type;
            $data['collected_pu'] = PostResultSubmit::select('ward_id')->where('lga_id', $request->lga_id)->where('election_id',$request->election_id)->groupBy('ward_id')->get()->count();

            $data['total_pu'] = $data['ward_ids']->count();

            $data['election_id'] = $request->election_id;
            $data['type'] = $request->type;
            $data['send_lga_id'] = $request->lga_id;
        }

        if($request->type == 'lga')
        {
            $data['elections'] = Election::select('id','title')->get();
            $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();

            $lgas = LGA::pluck('name')->toArray();
            $data['lga'] = (json_encode($lgas)); 
            $data['parties'] = PP::select('id','code')->get(); 
            $data['lgas'] = LGA::select('id')->get(); 

            $data['election_id'] = $request->election_id;
            $data['type'] = $request->type;
            $data['collected_pu'] = PostResultSubmit::select('ward_id')->where('election_id',$request->election_id)->groupBy('ward_id')->get()->count();

            if($election->lgas == 'all')
            {
                $data['total_pu'] = 0;
                $lga_ids = LGA::select('id')->get();
                foreach ($lga_ids as $lg_id) {
                    $wards = Ward::select('id')->where('lga_id',$lg_id->id)->get()->count();
                    $data['total_pu'] += $wards; 
                }
            }else
            {
                $total_pus = 0;
                $lga_ids = explode(',', $election->selected_lgas);
                foreach ($lga_ids as $lg_id) {
                    $pus = Ward::select('id')->where('lga_id',$lg_id)->count();
                    $total_pus += $pus; 
                }
                $data['total_pu'] = $total_pus;
            }
            $data['election_id'] = $request->election_id;
            $data['type'] = $request->type;
        }

        if($request->type == 'pu')
        {
            $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();
            $party_ids = explode(',', $election->parties); 
            array_push($party_ids,'0');
           
            $data['parties_ids'] = $party_ids;
    
            $data['elections'] = Election::select('id','title')->get();
            // $data['collected_pu'] = PostResultSubmit::select('pu_id')->where('election_id',$request->election_id)->groupBy('pu_id')->get()->count();
          
            if($election->lgas == 'all')
            {
                $data['total_pu'] = 0;
                $lga_ids = LGA::select('id')->get();
                foreach ($lga_ids as $lg_id) {
                    $wards = Ward::select('id')->where('lga_id',$lg_id->id)->get()->count();
                    $data['total_pu'] += $wards; 
                }
            }else
            {
                $total_pus = 0;
                $lga_ids = explode(',', $election->selected_lgas);
                foreach ($lga_ids as $lg_id) {
                    $pus = Ward::select('id')->where('lga_id',$lg_id)->count();
                    $total_pus += $pus; 
                }
                $data['total_pu'] = $total_pus;
            }
            $data['election_id'] = $request->election_id;
            $data['type'] = $request->type;
            $data['submissions'] = PostResultSubmit::where('election_id',$request->election_id)->orderBy('id','desc')->limit(50)->get();
            $data['collected_pu'] = $data['submissions']->count();          
        }
        if($request->type == 'party_lg')
        {
            $data['wards_collated'] = PostResultSubmit::select('id','wards_count')->where('lga_id',$request->lga_id)->whereNotNull('wards_count')->sum('wards_count');
        }else
        {
            $data['wards_collated'] = PostResultSubmit::select('id','wards_count')->whereNotNull('wards_count')->sum('wards_count');
        }


        $data['lgass'] = LGA::select('id','name')->get();
        return view('collation.index',$data);
    }

    public function reportGenerate(Request $request)
    {
            // dd($request->all());

        $election = Election::select('parties','title','lgas','selected_lgas')->where('id', $request->election_id)->first();
        if($election->lgas == 'all')
        {
            $data['lgas']= DB::table('l_g_a_s')->pluck('name','id');
        }else
        {
            $lgaIds = $election->selected_lgas;
            $lgaIdsArray = explode(',', $lgaIds); 
            $data['lgas'] = DB::table('l_g_a_s')
                        ->whereIn('id', $lgaIdsArray)
                        ->pluck('name','id');
        }

        $partyIds = $election->parties;
        $partyIdsArray = explode(',', $partyIds); 
        $data['parties'] = DB::table('p_p_s')
                    ->whereIn('id', $partyIdsArray)
                    ->pluck('code','id');
        $data['election_id'] = $request->election_id;
        // dd($data['lgas']);


        $pdf = Pdf::loadView('pdf.report', $data)->setPaper('a4', 'landscape');
        return $pdf->download('report.pdf');

    }
}
