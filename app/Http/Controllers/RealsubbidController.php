<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Realisasi;
use App\Realisasi_detail;
use App\Subbidang;
use App\Indicator;
use App\Kinerja;
use App\Targetsubbid;
use App\Targetsubbid_detail;

class RealsubbidController extends Controller
{
    public function index(Request $request)
    {
        $data = Realisasi::orderBy('id','desc')
                        ->Selectraw('zo_realisasi.*')
                        ->leftjoin('zo_subbidang','zo_subbidang.id','zo_realisasi.subbidang_id')
                        ->leftjoin('users','users.id','zo_realisasi.users_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_subbidang.name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('realsubbid.index',compact('data'));
    }

    public function create()
    {
        $sub = Subbidang::all();
        return view('realsubbid.create',compact('sub'));
    }

    public function getrenstra(Request $request)
    {
        $data = Targetsubbid::where('subbidang_id',$request->bidang)
                            ->orderBy('id','desc')
                            ->get();
        return response()->json([ 
          'success' => true,
          'data' => $data
        ],200);
    }

    public function generate(Request $request)
    {
        $this->validate($request,[
            'subbidang_id' => 'required',
            'files' => 'mimes:pdf|max:10048'
        ]);

        $filename = "laporan pengukuran kinerja".$request->month.$request->years;

        $realisasi = [
            'targetsubbid_id'   =>$request->targetsubbid_id,
            'years'             => $request->years,
            'month'             => $request->month,
            'filename'          => $filename,
            'users_id'          => $request->users_id,
            'subbidang_id'      => $request->subbidang_id,
            'dates'             => $request->dates
        ];
        $data = Realisasi::create($realisasi);

        if($request->hasFile('files')){ // Kalau file ada
            $request->file('files')
                        ->move('images/realsubbid/'.$data->id,$request
                        ->file('files')
                        ->getClientOriginalName()); 
            $data->files = $request->file('files')->getClientOriginalName(); 
            $data->save(); 
        }
        $rens = $data->id;

        return redirect('/realsubbid/entrydata/'.$rens);
    }

    public function entrydata($id)
    {
        $data = Realisasi::where('id',$id)->first();
        
        $indi = Targetsubbid_detail::where('targetsubbid_id',$data->targetsubbid_id)
                                    ->where('years',$data->years)
                                    ->get();
        $yearend = Targetsubbid::where('id',$data->targetsubbid_id)
                                    ->Orderby('id','asc')
                                    ->first();
        return view('realsubbid/entrydata',compact('indi','data','yearend'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'indicator_id'  => $request->indicator_id[$i],
                    'realisasi_id'  => $request->realisasi_id[$i],
                    'target'        => $request->target[$i],
                    'real'          => $request->real[$i],
                    'capaian'       => $request->capaian[$i],
                    'capaian_akhir' => $request->capaian_akhir[$i],
                    'keterangan'    => $request->keterangan[$i]
                ];
                Realisasi_detail::create($data);
            }
        DB::commit(); 
        return redirect('/realsubbid')->with('sukses','Data Tersimpan');
    }
   

    public function editmeta($id)
    {
        $data = Realisasi::where('id',$id)->first();
        $target = Targetsubbid::where('subbidang_id',$data->subbidang_id)
                                ->orderBy('id','desc')
                                ->get();
        $sub = Subbidang::all();
       
        return view('realsubbid/editmeta',compact('data','sub','target'));
    }


    public function updatemeta(Request $request, $id)
    {
        $this->validate($request,[
            'files' => 'mimes:pdf|max:10048'
        ]);

        $data = Realisasi::find($id);
        $data->update($request->all());
        if($request->hasFile('files2')){ // Kalau file ada
            $request->file('files2')
                        ->move('images/realsubbid/'.$data->id,$request
                        ->file('files2')
                        ->getClientOriginalName());
            $data->files = $request->file('files2')->getClientOriginalName(); 
            $data->save();
        }
        return redirect('/realsubbid')->with('sukses','Data Diperbaharui');
    }


    public function edit($id)
    {
        $data = Realisasi::where('id',$id)->first();
        $detail = Realisasi_detail::where('realisasi_id',$id)
                                    ->get();
        $indi =  Targetsubbid::where('subbidang_id',$data->subbidang_id)
                                ->orderBy('id','desc')
                                ->get();
        return view('realsubbid/edit',compact('data','detail'));
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
                'keterangan'    => $request->keterangan[$i]
            ];
            Realisasi_detail::where('id', $request->id[$i])
                            ->update($data);
            
        }
    DB::commit();
    return redirect('/realsubbid')->with('sukses','Data Berhasil Diperbaharui');
    }
}
