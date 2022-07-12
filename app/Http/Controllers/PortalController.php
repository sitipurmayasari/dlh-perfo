<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Realisasi;
use App\InjetQuery;
use App\Realisasibid;


class PortalController extends Controller
{
   
    public function index()
    {
        $sub =auth()->user()->subbidang_id;
        $bid =auth()->user()->bidang_id;
        $bln = Carbon::now()->month;
        $thn = Carbon::now()->year;
        

        if ($sub != null) {
           $realsub = Realisasi::where('subbidang_id',$sub)
                            ->whereMonth('month',$bln)  
                            ->whereYear('years',$thn)->first();  
        }
    
        return view('portal',compact('realsub','sub'));

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
            $outLabel[] = $this->intToMonth($lab->month);
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

    function rand_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    function intToMonth($num)
    {
    switch ($num) {
        case 1:
                return "Januari";
                break;
        case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        
        default:
            return "";
            break;
    }
    }
}
