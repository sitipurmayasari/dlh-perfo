<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Realisasi;
use App\Realisasi_detail;
use App\Realisasibid;
use App\Realisasibid_detail;
use App\Realisasiskpd;
use App\Realisasiskpd_detail;
use App\Subbidang;
use App\Bidang;
use App\Skpd;
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
            $detail = Realisasibid_detail::orderby('indicator_id','asc')
                                ->where('realisasibid_id',$data->id)
                                ->get();
            $bid = Bidang::where('id', $request->bidang)->first();
            return view('report.lapbidang',compact('data','request','bid','detail'));

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
            return view('report.lapsub',compact('data','request','bid','detail'));   
        }elseif($request->jenis=="3"){
            dd($request->all());
            // $data = Realisasi::where('subbidang_id',$request->sub)
            //             ->where('years',$request->years)
            //             ->when($request->bulan, function ($query) use ($request) {
            //                 $query->where('month',$request->bulan);
            //             })
            //             ->first();
            // $detail = Realisasi_detail::orderby('indicator_id','asc')
            //             ->where('realisasi_id',$data->id)
            //             ->get();
            // $bid = Subbidang::where('id', $request->sub)->first();
            // return view('report.lapskpd',compact('data','request','bid','detail'));   
        }elseif($request->jenis=="4"){
            $bidang = Realisasibid::where('years',$request->years)
                                    ->where('month',$request->bulan)
                                    ->get();
            $subbidang = Realisasi::where('years',$request->years)
                                    ->where('month',$request->bulan)
                                    ->get();
            $skpd = Realisasiskpd::where('years',$request->years)
                                    ->where('month',$request->bulan)
                                    ->get();

            $pdf = PDF::loadview('report.laptotal',compact('request','bidang','subbidang','skpd'));  
            return $pdf->stream();   
        } else {
            dd($request->all());
        }            
    } 


   
}