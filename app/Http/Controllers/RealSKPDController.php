<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\RealisasiSKPD;
use App\RealisasiSKPD_detail;
use App\Kinerja_SKPD;
use App\Target_skpd;
use App\Skpd;


class RealSKPDController extends Controller
{
    public function index(Request $request)
    {
        $data = RealisasiSKPD::orderBy('id','desc')
                        ->Selectraw('zo_realisasiskpd.*')
                        ->leftjoin('zo_skpd','zo_skpd.id','zo_realisasiskpd.skpd_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_skpd.name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('realskpd.index',compact('data'));
    }

    public function create()
    {
        $sub = Skpd::all();
        return view('realskpd.create',compact('sub'));
    }

    public function generate(Request $request)
    {
        $this->validate($request,[
            'skpd_id' => 'required',
        ]);

        $filename = "laporan pengukuran kinerja SKPD".$request->month.$request->years;

        $realisasi = [
            'years'             => $request->years,
            'month'             => $request->month,
            'filename'          => $filename,
            'skpd_id'           => $request->skpd_id,
            'dates'             => $request->dates
        ];
        $data = RealisasiSKPD::create($realisasi);
        $rens = $data->id;

        return redirect('/realskpd/entrydata/'.$rens);
    }

    public function entrydata($id)
    {
        $data = Realisasiskpd::where('id',$id)->first();
        
        $indi = Kinerja_SKPD::where('skpd_id',$data->skpd_id)
                                    ->get();
        return view('realskpd/entrydata',compact('indi','data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'kinerja_skpd_id'  => $request->indicator_id[$i],
                    'realisasiskpd_id' => $request->realisasiskpd_id[$i],
                    'target'        => $request->target[$i],
                    'real'          => $request->real[$i],
                    'capaian'       => $request->capaian[$i],
                    'keterangan'    => $request->keterangan[$i]
                ];
                RealisasiSKPD_detail::create($data);
            }
        DB::commit(); 
        return redirect('/realskpd')->with('sukses','Data Tersimpan');
    }
   

    public function editmeta($id)
    {
        $data = RealisasiSKPD::where('id',$id)->first();
        $sub = Skpd::all();
       
        return view('realskpd/editmeta',compact('data','sub'));
    }


    public function updatemeta(Request $request, $id)
    {

        $data = RealisasiSKPD::find($id);
        $data->update($request->all());
        return redirect('/realskpd')->with('sukses','Data Diperbaharui');
    }


    public function edit($id)
    {
        $data = RealisasiSKPD::where('id',$id)->first();
        $detail = RealisasiSKPD_detail::where('realisasiskpd_id',$id)
                                    ->get();
        $indi = Kinerja_SKPD::where('skpd_id',$data->skpd_id)
                                    ->get();
        return view('realskpd/edit',compact('data','detail','indi'));
    }

   
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        for ($i = 0; $i < count($request->input('kinerja_skpd_id')); $i++){
            $data = [
                'kinerja_skpd_id'  => $request->kinerja_skpd_id[$i],
                'target'        => $request->target[$i],
                'real'          => $request->real[$i],
                'capaian'       => $request->capaian[$i],
                'keterangan'    => $request->keterangan[$i]
            ];
            RealisasiSKPD_detail::where('id', $request->id[$i])
                            ->update($data);
            
        }
    DB::commit();
    return redirect('/realskpd')->with('sukses','Data Berhasil Diperbaharui');
    }
}
