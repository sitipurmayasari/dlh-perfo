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
use App\Verisubbid;

class VerisubbidController extends Controller
{
    public function index(Request $request)
    {
        $data = Realisasi::orderBy('id','desc')
                        ->Selectraw('zo_realisasi.*')
                        ->leftjoin('zo_subbidang','zo_subbidang.id','zo_realisasi.subbidang_id')
                        ->leftjoin('users','users.id','realisasi.users_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_subbidang.name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('verisubbid.index',compact('data'));
    }

   
    public function edit($id)
    {
        $kinerja = Kinerja::all();
        $data = Realisasi::where('id',$id)->first();
        $detail = Realisasi_detail::where('realisasi_id',$id)->get();
        return view('verisubbid.verifikasi',compact('data','detail'));
    }

   
    public function update(Request $request, $id)
    {
        $data = Realisasi::find($id);
        $data->touch();
        $data->update($request->all());
        return redirect('/verisubbid')->with('sukses','Data Diperbaharui');
    }

}
