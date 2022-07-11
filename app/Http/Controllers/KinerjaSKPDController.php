<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Bidang;
use App\Subbidang;
use App\Kinerja;
use App\Kinerja_SKPD;
use App\Target_skpd;
use App\Skpd;

class KinerjaSKPDController extends Controller
{
    public function index(Request $request)
    {
        $data = Kinerja_SKPD::orderBy('id','desc')
                        ->SelectRaw('zo_kinerja_skpd.*')
                        ->leftjoin('zo_skpd','zo_skpd.id','zo_kinerja_skpd.skpd_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('names','LIKE','%'.$request->keyword.'%')
                            ->orWhere('skpd', 'LIKE','%'.$request->keyword.'%')
                            ->orWhere('iku', 'LIKE','%'.$request->keyword.'%')
                            ->orWhere('indicator', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('kinerja_skpd.index',compact('data'));
    }

    public function create()
    {
        $skpd = Skpd::all();
        return view('kinerja_skpd.create', compact('skpd'));
    }

    public function store(Request $request)
    {
        
        DB::beginTransaction();
        $kinerja =Kinerja_SKPD::create($request->all());
        $kinerja_skpd_id = $kinerja->id;
        for ($i = 0; $i < count($request->input('years')); $i++){
            $data = [
                'kinerja_skpd_id'   => $kinerja_skpd_id,
                'years'             => $request->years[$i],
                'percentages'       => $request->percentages[$i] ,
                'initiative'        => $request->initiative[$i]
            ];
            Target_skpd::create($data);
        }
        DB::commit(); 

        return redirect('/kinerja_skpd')->with('sukses','Data Tersimpan');
    }
   
    public function edit($id)
    {
        $skpd = Skpd::all();
        $data = Kinerja_SKPD::where('id',$id)->first();
        $target = Target_skpd::where('kinerja_skpd_id',$id)->get();
        return view('kinerja_skpd.edit',compact('data','target','skpd'));
    }

   
    public function update(Request $request, $id)
    {

        $kinerja = Kinerja_SKPD::find($id);
        $kinerja->update($request->all());
        
        DB::beginTransaction();
        Target_skpd::where('kinerja_skpd_id', $kinerja->id)->delete();

        for ($i = 0; $i < count($request->input('years')); $i++){
            $data = [
                'id'                =>$request->target_id,
                'kinerja_skpd_id'   => $id,
                'years'             => $request->years[$i],
                'percentages'       => $request->percentages[$i] ,
                'initiative'        => $request->initiative[$i]
            ];
            Target_skpd::create($data);
        }
        DB::commit(); 

        return redirect('/kinerja_skpd')->with('sukses','Data Diperbaharui');
    }

   
    public function delete($id)
    {
        $data = Kinerja_SKPD::find($id);
        $data->delete();
        return redirect('/kinerja_skpd')->with('sukses','Data Terhapus');
    }
}
