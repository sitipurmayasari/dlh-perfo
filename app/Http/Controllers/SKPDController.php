<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Skpd;

class SKPDController extends Controller
{
    public function index(Request $request)
    {
        $data = Skpd::orderBy('id','desc')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('name','LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('skpd.index',compact('data'));
    }

    public function create()
    {
        return view('skpd.create');
    }

    public function store(Request $request)
    {
        Skpd::create($request->all());
        return redirect('/skpd')->with('sukses','Data Tersimpan');
    }
   
    public function edit($id)
    {
        $data = Skpd::where('id',$id)->first();
        return view('skpd.edit',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $data = Skpd::find($id);
        $data->update($request->all());
        return redirect('/skpd')->with('sukses','Data Diperbaharui');
    }

   
    public function delete($id)
    {
        $petugas = Skpd::find($id);
        $petugas->delete();
        return redirect('/skpd')->with('sukses','Data Terhapus');
    }
}
