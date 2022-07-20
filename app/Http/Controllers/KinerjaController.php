<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Bidang;
use App\Subbidang;
use App\Kinerja;

class KinerjaController extends Controller
{
    public function index(Request $request)
    {
        $data = Kinerja::orderBy('id','desc')
                        ->selectraw('zo_kinerja.*')
                        ->leftjoin('zo_bidang','zo_bidang.id','zo_kinerja.bidang_id')
                        ->where('owned','1')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('names','LIKE','%'.$request->keyword.'%')
                            ->orWhere('bidang.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');
        $datasub = Kinerja::orderBy('id','desc')
                            ->selectraw('zo_kinerja.*')
                            ->leftjoin('zo_subbidang','zo_subbidang.id','zo_kinerja.subbidang_id')
                            ->where('owned','2')
                            ->when($request->keyword, function ($query) use ($request) {
                                $query->where('names','LIKE','%'.$request->keyword.'%')
                                ->orWhere('subbidang.name', 'LIKE','%'.$request->keyword.'%');
                            })
                            ->paginate('10');
        $datakadis = Kinerja::orderBy('id','desc')
                            ->where('owned','3')
                            ->when($request->keyword, function ($query) use ($request) {
                                $query->where('names','LIKE','%'.$request->keyword.'%');
                            })
                            ->paginate('10');

        return view('kinerja.index',compact('data','datasub','datakadis'));
    }

    public function create()
    {
        $bidang = Bidang::all();
        $subbid = Subbidang::all();
        return view('kinerja.create',compact('bidang', 'subbid'));
    }

    public function store(Request $request)
    {
        Kinerja::create($request->all());
        return redirect('/kinerja')->with('sukses','Data Tersimpan');
    }
   
    public function edit($id)
    {
        $bidang = Bidang::all();
        $subbid = Subbidang::all();
        $data = Kinerja::where('id',$id)->first();
        return view('kinerja.edit',compact('data','bidang', 'subbid'));
    }

   
    public function update(Request $request, $id)
    {
        $data = Kinerja::find($id);
        $data->update($request->all());
        return redirect('/kinerja')->with('sukses','Data Diperbaharui');
    }

   
    public function delete($id)
    {
        $petugas = Kinerja::find($id);
        $petugas->delete();
        return redirect('/kinerja')->with('sukses','Data Terhapus');
    }
}
