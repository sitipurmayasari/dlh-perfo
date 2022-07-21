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
        $role = auth()->user()->role;
        $bidang = auth()->user()->bidang_id;
        if ($role==2) {
            $data = Realisasi::orderBy('id','desc')
                        ->Selectraw('zo_realisasi.*')
                        ->leftjoin('zo_subbidang','zo_subbidang.id','zo_realisasi.subbidang_id')
                        ->leftjoin('users','users.id','zo_realisasi.users_id')
                        ->where('zo_subbidang.bidang_id',$bidang)
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_subbidang.name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');
        } else {
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
        }
        

        return view('verisubbid.index',compact('data'));
    }

   
    public function create($id)
    {
        $kinerja = Kinerja::all();
        $data = Realisasi::where('id',$id)->first();
        $detail = Realisasi_detail::where('realisasi_id',$id)->get();
        return view('verisubbid.verifikasi',compact('data','detail'));
    }

    public function edit($id)
    {
        $data = Verisubbid::where('id',$id)->first();
        $real = Realisasi::where('id',$data->realisasi_id)->first();
        $detail = Realisasi_detail::where('realisasi_id',$id)->get();

        if (auth()->user()->role == 1) {
            return view('verisubbid.validasi',compact('data','detail','real'));
        } elseif (auth()->user()->role == 2) {
            return view('verisubbid.validasibid',compact('data','detail','real')); 
        } else {
            return view('verisubbid.validasisekdis',compact('data','detail','real'));
        }
    }


    public function store(Request $request)
    {
        Verisubbid::create($request->all());
        return redirect('/verisubbid')->with('sukses','Data Diperbaharui');
    }

    public function update(Request $request, $id)
    {
        $data = Verisubbid::find($id);
        $data->touch();
        $data->update($request->all());
        return redirect('/verisubbid')->with('sukses','Data Diperbaharui');
    }

}
