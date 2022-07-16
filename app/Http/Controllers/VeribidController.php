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
use App\Veribid;

class VeribidController extends Controller
{
    public function index(Request $request)
    {
        $role = auth()->user()->role;
        $bidang = auth()->user()->bidang_id;
        if ($role==2) {
            $data = Realisasibid::orderBy('id','desc')
                        ->Selectraw('zo_realisasibid.*')
                        ->leftjoin('zo_bidang','zo_bidang.id','zo_realisasibid.bidang_id')
                        ->leftjoin('users','users.id','zo_realisasibid.users_id')
                        ->where('zo_bidang.bidang_id',$bidang)
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('filename','LIKE','%'.$request->keyword.'%')
                                ->orWhere('zo_bidang.name', 'LIKE','%'.$request->keyword.'%')
                                ->orWhere('users.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');
        } else {
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
        }
        

        return view('veribid.index',compact('data'));
    }

   
    public function create($id)
    {
        $kinerja = Kinerja::all();
        $data = Realisasibid::where('id',$id)->first();
        $detail = Realisasi_detail::where('realisasi_id',$id)->get();
        return view('veribid.verifikasi',compact('data','detail'));
    }

    public function edit($id)
    {
        $kinerja = Kinerja::all();
        $data = Realisasibid::where('id',$id)->first();
        $detail = Realisasi_detail::where('realisasi_id',$id)->get();
        $valid = Veribid::where('realisasi_id',$id)->first();

        if (auth()->user()->role == 1) {
            return view('veribid.validasi',compact('data','detail','valid'));
        } elseif (auth()->user()->role == 2) {
            return view('veribid.validasibid',compact('data','detail','valid')); 
        } elseif (auth()->user()->role == 3) {
            return view('veribid.validasikadis',compact('data','detail','valid'));    
        } else {
            return view('veribid.validasisekdis',compact('data','detail','valid'));
        }
    }


    public function store(Request $request)
    {
        Veribid::create($request->all());
        return redirect('/veribid')->with('sukses','Data Diperbaharui');
    }

    public function update(Request $request, $id)
    {
        $data = Veribid::find($id);
        $data->touch();
        $data->update($request->all());
        return redirect('/veribid')->with('sukses','Data Diperbaharui');
    }

}
