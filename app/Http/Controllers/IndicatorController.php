<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Indicator;
use App\Kinerja;

class IndicatorController extends Controller
{
    public function index(Request $request)
    {
        $data = Indicator::orderBy('id','desc')
                        ->SelectRaw('zo_indicator.*')
                        ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                        ->leftjoin('zo_bidang','zo_bidang.id','zo_kinerja.bidang_id')
                        ->where('zo_kinerja.owned','1')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('zo_indicator.names','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_kinerja.names', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_bidang.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');
        $datasub = Indicator::orderBy('id','desc')
                        ->SelectRaw('zo_indicator.*')
                        ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                        ->leftjoin('zo_subbidang','zo_subbidang.id','zo_kinerja.subbidang_id')
                        ->where('zo_kinerja.owned','2')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('zo_indicator.names','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_kinerja.names', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_subbidang.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');
        $datakadis = Indicator::orderBy('id','desc')
                        ->SelectRaw('zo_indicator.*')
                        ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                        ->where('zo_kinerja.owned','3')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('zo_indicator.names','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_kinerja.names', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('indicator.index',compact('data','datasub','datakadis'));
    }

    public function create()
    {
        $kinerja = Kinerja::all();
        return view('indicator.create',compact('kinerja'));
    }

    public function store(Request $request)
    {
        Indicator::create($request->all());
        return redirect('/indicator')->with('sukses','Data Tersimpan');
    }
   
    public function edit($id)
    {
        $kinerja = Kinerja::all();
        $data = Indicator::where('id',$id)->first();
        return view('indicator.edit',compact('data','kinerja'));
    }

   
    public function update(Request $request, $id)
    {
        $data = Indicator::find($id);
        $data->update($request->all());
        return redirect('/indicator')->with('sukses','Data Diperbaharui');
    }

   
    public function delete($id)
    {
        $data = Indicator::find($id);
        $data->delete();
        return redirect('/indicator')->with('sukses','Data Terhapus');
    }
}
