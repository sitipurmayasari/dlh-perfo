<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Realisasibid;
use App\Realisasibid_detail;
use App\Bidang;
use App\Indicator;
use App\Kinerja;
use App\Targetbid;
use App\Targetbid_detail;

class RealbidController extends Controller
{
    public function index(Request $request)
    {
        $data = Realisasibid::orderBy('id','desc')
                        ->Selectraw('zo_realisasibid.*')
                        ->leftjoin('zo_bidang','zo_bidang.id','zo_realisasibid.bidang_id')
                        ->leftjoin('users','users.id','zo_realisasibid.users_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_bidang.name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('realbid.index',compact('data'));
    }

    public function create()
    {
        $sub = Bidang::all();
        return view('realbid.create',compact('sub'));
    }

    public function getrenstra(Request $request)
    {
        $data = Targetbid::where('bidang_id',$request->bidang)
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
            'bidang_id' => 'required',
            'files' => 'mimes:pdf|max:10048'
        ]);

        $filename = "laporan pengukuran kinerja".$request->month.$request->years;

        $realisasi = [
            'targetbid_id'      =>$request->targetbid_id,
            'years'             => $request->years,
            'month'             => $request->month,
            'filename'          => $filename,
            'users_id'          => $request->users_id,
            'bidang_id'         => $request->bidang_id,
            'dates'             => $request->dates
        ];
        $data = Realisasibid::create($realisasi);

        if($request->hasFile('files')){ // Kalau file ada
            $request->file('files')
                        ->move('images/realbid/'.$data->id,$request
                        ->file('files')
                        ->getClientOriginalName()); 
            $data->files = $request->file('files')->getClientOriginalName(); 
            $data->save(); 
        }
        $rens = $data->id;

        return redirect('/realbid/entrydata/'.$rens);
    }

    public function entrydata($id)
    {
        $data = Realisasibid::where('id',$id)->first();
        
        $indi = Targetbid_detail::where('targetbid_id',$data->targetbid_id)
                                    ->where('years',$data->years)
                                    ->get();
        $yearend = Targetbid::where('id',$data->targetbid_id)
                                    ->Orderby('id','asc')
                                    ->first();
        return view('realbid/entrydata',compact('indi','data','yearend'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'indicator_id'  => $request->indicator_id[$i],
                    'realisasibid_id' => $request->realisasibid_id[$i],
                    'target'        => $request->target[$i],
                    'real'          => $request->real[$i],
                    'capaian'       => $request->capaian[$i],
                    'capaian_akhir' => $request->capaian_akhir[$i],
                    'keterangan'    => $request->keterangan[$i],
                    'target_akhir'  => $request->target_akhir[$i]
                ];
                Realisasibid_detail::create($data);
            }
        DB::commit(); 
        return redirect('/realbid')->with('sukses','Data Tersimpan');
    }
   

    public function editmeta($id)
    {
        $data = Realisasibid::where('id',$id)->first();
        $target = Targetbid::where('bidang_id',$data->bidang_id)
                                ->orderBy('id','desc')
                                ->get();
        $sub = Bidang::all();
       
        return view('realbid/editmeta',compact('data','sub','target'));
    }


    public function updatemeta(Request $request, $id)
    {
        $this->validate($request,[
            'files' => 'mimes:pdf|max:10048'
        ]);

        $data = Realisasibid::find($id);
        $data->update($request->all());
        if($request->hasFile('files2')){ // Kalau file ada
            $request->file('files2')
                        ->move('images/realbid/'.$data->id,$request
                        ->file('files2')
                        ->getClientOriginalName());
            $data->files = $request->file('files2')->getClientOriginalName(); 
            $data->save();
        }
        return redirect('/realbid')->with('sukses','Data Diperbaharui');
    }


    public function edit($id)
    {
        $data = Realisasibid::where('id',$id)->first();
        $detail = Realisasibid_detail::where('realisasibid_id',$id)
                                    ->get();
        $indi =  Targetbid::where('bidang_id',$data->bidang_id)
                                ->orderBy('id','desc')
                                ->get();
        return view('realbid/edit',compact('data','detail','indi'));
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
            Realisasibid_detail::where('id', $request->id[$i])
                            ->update($data);
            
        }
    DB::commit();
    return redirect('/realbid')->with('sukses','Data Berhasil Diperbaharui');
    }
}
