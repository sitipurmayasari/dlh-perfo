<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Realisasi;
use App\Realisasi_detail;
use App\Realisasibid;
use App\Realisasibid_detail;
use App\RealisasiSKPD;
use App\RealisasiSKPD_detail;
use App\Realisasikadis;
use App\Realisasikadis_detail;
use App\Subbidang;
use App\Bidang;
use App\Skpd;
use App\User;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $bidang = Bidang::all();
        $sub = Subbidang::all();
        $skpd = SKpd::all();
        return view('report.index',compact('bidang','sub','skpd'));
    }

    public function cetak(Request $request)
    {
        if ($request->jenis=="1") {   
            $data = Realisasibid::where('bidang_id',$request->bidang)
                                ->where('years',$request->years)
                                ->when($request->bulan, function ($query) use ($request) {
                                    $query->where('month',$request->bulan);
                                })
                                ->first();
            if ($data != null) {
                $detail = Realisasibid_detail::orderby('indicator_id','asc')
                                ->where('realisasibid_id',$data->id)
                                ->get();
            }
            $bid = Bidang::where('id', $request->bidang)->first();
            $kadis = User::where('role','4')
                        ->OrderBy('id','desc')->first();
            $kabid = User::where('role','2')->where('bidang_id',$request->bidang)
                        ->OrderBy('id','desc')->first();
            return view('report.lapbidang',compact('data','request','bid','detail','kadis','kabid'));

        }elseif($request->jenis=="2"){
            $data = Realisasi::where('subbidang_id',$request->sub)
                        ->where('years',$request->years)
                        ->when($request->bulan, function ($query) use ($request) {
                            $query->where('month',$request->bulan);
                        })
                        ->first();
            $detail = Realisasi_detail::orderby('indicator_id','asc')
                        ->where('realisasi_id',$data->id)
                        ->get();
            $bid = Subbidang::where('id', $request->sub)->first();
            $kadis = User::where('role','4')
                        ->OrderBy('id','desc')->first();
            $kasie = User::where('role','2')->where('bidang_id',$request->sub)
                        ->OrderBy('id','desc')->first();
            return view('report.lapsub',compact('data','request','bid','detail','kadis','kasie'));   

        }elseif($request->jenis=="3"){
            $data = Realisasikadis::where('years',$request->years)
                                    ->when($request->bulan, function ($query) use ($request) {
                                        $query->where('month',$request->bulan);
                                    })
                                    ->first();
            $detail = Realisasikadis_detail::orderby('indicator_id','asc')
                                        ->where('realisasikadis_id',$data->id)
                                        ->get();
            $kadis = User::where('role','4')
                        ->OrderBy('id','desc')->first();
            return view('report.lapkadis',compact('data','request','detail','kadis'));  

        }elseif($request->jenis=="4"){
            $data = RealisasiSKPD::where('skpd_id',$request->skpd)
                                    ->where('years',$request->years)
                                    ->when($request->bulan, function ($query) use ($request) {
                                        $query->where('month',$request->bulan);
                                    })
                                    ->first();
            $detail = RealisasiSKPD_detail::orderby('kinerja_skpd_id','asc')
                                        ->where('realisasiskpd_id',$data->id)
                                        ->get();
            $skpd = SKPD::where('id',$request->skpd)->first();
            return view('report.lapskpd',compact('data','request','detail','skpd'));  

        }elseif($request->jenis=="5"){
            $bidang = Realisasibid::where('years',$request->years)
                                    ->where('month',$request->bulan)
                                    ->get();
            $subbidang = Realisasi::where('years',$request->years)
                                    ->where('month',$request->bulan)
                                    ->get();

            $nobid = Bidang::whereraw("id NOT IN 
                            (SELECT bidang_id FROM zo_realisasibid where years ='$request->years'AND month = '$request->bulan')")
                            ->get();
            $nosub = Subbidang::whereraw("id NOT IN 
                            (SELECT subbidang_id FROM zo_realisasi where years= '$request->years' AND month= '$request->bulan')")
                            ->get();

            $pdf = PDF::loadview('report.laptotal',compact('request','bidang','subbidang','nobid','nosub'));  
            return $pdf->stream();   
        }elseif($request->jenis=="6"){
            $bidang = Bidang::all();

            return view('report.lapika',compact('bidang','request'));  
            // $pdf = PDF::loadview('report.laptotal',compact('request','bidang','subbidang','nobid','nosub'));  
            // return $pdf->stream();   
        }elseif($request->jenis=="7"){
            // dd($request->all());
            $ikal = RealisasiSKPD_detail::SelectRaw('zo_realisasiskpd_detail.*')
                                        ->leftJoin('zo_realisasiskpd','zo_realisasiskpd.id','zo_realisasiskpd_detail.realisasiskpd_id')
                                        ->leftjoin('zo_kinerja_skpd', 'zo_kinerja_skpd.id','zo_realisasiskpd_detail.kinerja_skpd_id')
                                        ->where('iku','Indeks Kualitas Air Laut')
                                        ->where('zo_realisasiskpd.years',$request->years)
                                        ->where('zo_realisasiskpd.month',$request->bulan)
                                        ->OrderBy('zo_realisasiskpd.skpd_id', 'asc')
                                        ->get();
            $ika = RealisasiSKPD_detail::SelectRaw('zo_realisasiskpd_detail.*')
                                        ->leftJoin('zo_realisasiskpd','zo_realisasiskpd.id','zo_realisasiskpd_detail.realisasiskpd_id')
                                        ->leftjoin('zo_kinerja_skpd', 'zo_kinerja_skpd.id','zo_realisasiskpd_detail.kinerja_skpd_id')
                                        ->where('iku','Indeks Kualitas Air')
                                        ->where('zo_realisasiskpd.years',$request->years)
                                        ->where('zo_realisasiskpd.month',$request->bulan)
                                        ->OrderBy('zo_realisasiskpd.skpd_id', 'asc')
                                        ->get();
            $iku = RealisasiSKPD_detail::SelectRaw('zo_realisasiskpd_detail.*')
                                        ->leftJoin('zo_realisasiskpd','zo_realisasiskpd.id','zo_realisasiskpd_detail.realisasiskpd_id')
                                        ->leftjoin('zo_kinerja_skpd', 'zo_kinerja_skpd.id','zo_realisasiskpd_detail.kinerja_skpd_id')
                                        ->where('iku','Indeks Kualitas Udara')
                                        ->where('zo_realisasiskpd.years',$request->years)
                                        ->where('zo_realisasiskpd.month',$request->bulan)
                                        ->OrderBy('zo_realisasiskpd.skpd_id', 'asc')
                                        ->get();
            $ikl = RealisasiSKPD_detail::SelectRaw('zo_realisasiskpd_detail.*')
                                        ->leftJoin('zo_realisasiskpd','zo_realisasiskpd.id','zo_realisasiskpd_detail.realisasiskpd_id')
                                        ->leftjoin('zo_kinerja_skpd', 'zo_kinerja_skpd.id','zo_realisasiskpd_detail.kinerja_skpd_id')
                                        ->where('iku','Indeks Kualitas Lahan')
                                        ->where('zo_realisasiskpd.years',$request->years)
                                        ->where('zo_realisasiskpd.month',$request->bulan)
                                        ->OrderBy('zo_realisasiskpd.skpd_id', 'asc')
                                        ->get();

            return view('report.lapcros',compact('ika','iku','ikl','ikal','request'));  
            // $pdf = PDF::loadview('report.laptotal',compact('request','bidang','subbidang','nobid','nosub'));  
            // return $pdf->stream();   
        } else {
            dd($request->all());
        }            
    } 


   
}
