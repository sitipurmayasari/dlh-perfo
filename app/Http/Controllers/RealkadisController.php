<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Realisasikadis;
use App\Realisasikadis_detail;
use App\Bidang;
use App\Indicator;
use App\Kinerja;
use App\Targetkadis;
use App\Targetkadis_detail;

class RealkadisController extends Controller
{
    public function index(Request $request)
    {
        $data = Realisasikadis::orderBy('id','desc')
                        ->Selectraw('zo_realisasikadis.*')
                        ->leftjoin('users','users.id','zo_realisasikadis.users_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('realkadis.index',compact('data'));
    }

    public function create()
    {
        $target = Targetkadis::all();
        return view('realkadis.create',compact('target'));
    }


    public function generate(Request $request)
    {
        $this->validate($request,[
            'files' => 'mimes:pdf|max:10048'
        ]);

        $filename = "laporan pengukuran kinerja kadis".$request->month.$request->years;

        $realisasi = [
            'targetkadis_id'      =>$request->targetkadis_id,
            'years'             => $request->years,
            'month'             => $request->month,
            'filename'          => $filename,
            'users_id'          => $request->users_id,
            'dates'             => $request->dates
        ];
        $data = Realisasikadis::create($realisasi);

        if($request->hasFile('files')){ // Kalau file ada
            $request->file('files')
                        ->move('images/realkadis/'.$data->id,$request
                        ->file('files')
                        ->getClientOriginalName()); 
            $data->files = $request->file('files')->getClientOriginalName(); 
            $data->save(); 
        }
        $rens = $data->id;

        return redirect('/realkadis/entrydata/'.$rens);
    }

    public function entrydata($id)
    {
        $data = Realisasikadis::where('id',$id)->first();
        
        $indi = Targetkadis_detail::where('targetkadis_id',$data->targetkadis_id)
                                    ->where('years',$data->years)
                                    ->get();
        $yearend = Targetkadis::where('id',$data->targetkadis_id)
                                    ->Orderby('id','asc')
                                    ->first();
        return view('realkadis/entrydata',compact('indi','data','yearend'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'indicator_id'  => $request->indicator_id[$i],
                    'realisasikadis_id' => $request->realisasikadis_id[$i],
                    'target'        => $request->target[$i],
                    'real'          => $request->real[$i],
                    'capaian'       => $request->capaian[$i],
                    'capaian_akhir' => $request->capaian_akhir[$i],
                    'keterangan'    => $request->keterangan[$i],
                    'target_akhir'  => $request->target_akhir[$i]
                ];
                Realisasikadis_detail::create($data);
            }
        DB::commit(); 
        return redirect('/realkadis')->with('sukses','Data Tersimpan');
    }
   

   
    public function edit($id)
    {
        $data = Realisasikadis::where('id',$id)->first();
        $detail = Realisasikadis_detail::where('realisasikadis_id',$id)
                                    ->get();
        $indi =  Targetkadis::orderBy('id','desc')
                              ->get();
        $yearend = Targetkadis::where('id',$data->targetkadis_id)
                                ->Orderby('id','asc')
                                ->first();
        return view('realkadis/edit',compact('data','detail','indi','yearend'));
    }

   
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        for ($i = 0; $i < count($request->input('indicator_id')); $i++){
            $data = [
                'indicator_id'  => $request->indicator_id[$i],
                'target'        => $request->target[$i],
                'real'          => $request->real[$i],
                'capaian'       => $request->capaian[$i],
                'capaian_akhir' => $request->capaian_akhir[$i],
                'keterangan'    => $request->keterangan[$i],
                'target_akhir'  => $request->target_akhir[$i]
            ];
            Realisasikadis_detail::where('id', $request->id[$i])
                            ->update($data);
            
        }
    DB::commit();
    return redirect('/realkadis')->with('sukses','Data Berhasil Diperbaharui');
    }
}
