<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Realisasi;
use App\InjetQuery;
use App\Realisasibid;
use App\Verisubbid;
use App\Veribid;

class PortalController extends Controller
{
   
    public function index()
    {
        $bid =auth()->user()->bidang_id;
        $bln = Carbon::now()->month;
        $thn = Carbon::now()->year;
          

        if (auth()->user()->subbidang_id != null) {
            $sub =auth()->user()->subbidang_id; 
           $realsub = Realisasi::where('subbidang_id',$sub)
                            ->whereMonth('month',$bln)  
                            ->whereYear('years',$thn)->first();  
        }

        $real = null;
        $verif_kabid = null;
        $valid_rencana = null;
        $valid_sekdes = null;
        if (auth()->user()->isBidSub()) {
            if (auth()->user()->bidang_id!=null) {
                $real = Realisasibid::where('years',$thn)
                            ->where('month',$bln)
                            ->where('bidang_id',auth()->user()->bidang_id)
                            ->first();
                            
                if ($real) {
                    $verif_kabid = Veribid::where('realisasi_id',$real->id)->first();
                    $valid_rencana = Veribid::where('realisasi_id',$real->id)
                                                ->whereNotnull('perencana_id')
                                                ->first();
                    $valid_sekdes = Veribid::where('realisasi_id',$real->id)
                                                ->whereNotnull('sekdis_id')
                                                ->first();

                }
            }else{
                $real =  Realisasi::where('years',$thn)
                            ->where('month',$bln)
                            ->where('subbidang_id',auth()->user()->subbidang_id)
                            ->first();

                if ($real) {
                    $verif_kabid = Verisubbid::where('realisasi_id',$real->id)->first();
                    $valid_rencana = Verisubbid::where('realisasi_id',$real->id)
                                                ->whereNotnull('perencana_id')
                                                ->first();
                    $valid_sekdes = Verisubbid::where('realisasi_id',$real->id)
                                                ->whereNotnull('sekdis_id')
                                                ->first();

                }
            }
        }

        return view('portal',compact('realsub','sub','real','verif_kabid','valid_rencana','valid_sekdes'));

    }

    public function getChartRealisasiTargetMonth(Request $request)
    {
        $label = Realisasibid::orderBy('month','asc')
                                ->select('month')
                                        ->groupBy('month')
                                        ->where('years', date('Y'))
                                        ->get();

        $dataset = array();
        $realisasiDataKategori = Realisasibid::select(DB::raw('bidang_id'))
                                    ->groupBy('bidang_id')
                                    ->where('years', date('Y'))
                                    ->get();

        foreach ($realisasiDataKategori as $rdk) {
            $data=array();
            foreach ($label as $month) {
                $realisasi = Realisasibid::orderBy('month','asc')
                                ->select(DB::raw('avg(det.capaian) AS data'),
                                        DB::raw('bidang_id'),
                                        DB::raw('month')
                                        )->leftJoin('zo_realisasibid_detail as det', function($join) {
                                            $join->on('det.realisasibid_id', '=', 'zo_realisasibid.id');
                                        })
                                        ->groupBy('bidang_id','month')
                                        ->where('bidang_id',$rdk->bidang_id)
                                        ->where('years', date('Y'))
                                        ->where('month',$month->month)
                                        ->get();

                if ($realisasi->count()>0) {
                    foreach ($realisasi as $d) {
                        $data[] = $d->data;
                    }
                }else{
                    $data[] = 0;
                }
              
               
            }
            $dataset[] = array(
                'label' => $rdk->bidang->name,
                'data' => $data,
                'backgroundColor' => 'transparent',
                'borderColor'=> $this->rand_color(),
                'borderWidth' => 3,
                'pointStyle' => 'circle',
                'pointRadius'=> 5,
                'pointBorderColor' => 'transparent',
                'pointBackgroundColor' => $this->rand_color(),
            );
        }

        $outLabel = array();
        foreach ($label as $lab) {
            $outLabel[] = intToMonth($lab->month);
        }
       

        $output = array(
            'title' => "Target Realisasi",
            'type' => "line",
            'labels' => $outLabel,
            'datasets' => $dataset
        );

        return response()->json(array(
            "data" => $output
        ));

    }

    public function getChartRealisasiTargetMonthSub(Request $request)
    {
        $label = Realisasi::orderBy('month','asc')
                                ->select('month')
                                        ->groupBy('month')
                                        ->where('years', date('Y'))
                                        ->get();

        $dataset = array();
        $realisasiDataKategori = Realisasi::select(DB::raw('subbidang_id'))
                                    ->groupBy('subbidang_id')
                                    ->where('years', date('Y'))
                                    ->get();

        foreach ($realisasiDataKategori as $rdk) {
            $data=array();
            foreach ($label as $month) {
                $realisasi = Realisasi::orderBy('month','asc')
                                ->select(DB::raw('avg(det.capaian) AS data'),
                                        DB::raw('subbidang_id'),
                                        DB::raw('month')
                                        )->leftJoin('zo_realisasi_detail as det', function($join) {
                                            $join->on('det.realisasi_id', '=', 'zo_realisasi.id');
                                        })
                                        ->groupBy('subbidang_id','month')
                                        ->where('subbidang_id',$rdk->subbidang_id)
                                        ->where('years', date('Y'))
                                        ->where('month',$month->month)
                                        ->get();

                if ($realisasi->count()>0) {
                    foreach ($realisasi as $d) {
                        $data[] = $d->data;
                    }
                }else{
                    $data[] = 0;
                }
              
               
            }
            $dataset[] = array(
                'label' => $rdk->sub->name,
                'data' => $data,
                'backgroundColor' => 'transparent',
                'borderColor'=> $this->rand_color(),
                'borderWidth' => 3,
                'pointStyle' => 'circle',
                'pointRadius'=> 5,
                'pointBorderColor' => 'transparent',
                'pointBackgroundColor' => $this->rand_color(),
            );
        }

        $outLabel = array();
        foreach ($label as $lab) {
            $outLabel[] = intToMonth($lab->month);
        }
       

        $output = array(
            'title' => "Target Realisasi Sub Bidang",
            'type' => "line",
            'labels' => $outLabel,
            'datasets' => $dataset
        );

        return response()->json(array(
            "data" => $output
        ));

    }

    function rand_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    
}
