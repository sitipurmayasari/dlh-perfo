<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Indicator;
use App\Kinerja;
use App\Targetbid;
use App\Bidang;
use App\Targetbid_detail;

class TargetbidController extends Controller
{
    public function index(Request $request)
    {
        $data = Targetbid::orderBy('id','desc')
                        ->paginate('10');

        return view('targetbid.index',compact('data'));
    }

    public function create()
    {
        $bidang = Bidang::all();

        return view('targetbid.create',compact('bidang'));
    }

    public function generate(Request $request)
    {
        $this->validate($request,[
            'yearfrom' => 'required',
            'bidang_id' => 'required',
            'sk_number' => 'required',
            'filename' => 'required'
        ]);

        $data = Targetbid::create($request->all());
        $rens = $data->id;

        return redirect('/targetbid/entrybid/'.$rens);
    }

    public function entrybid($id)
    {
        $data   = Targetbid::where('id',$id)->first();
        $bidang = Bidang::where('id',$data->bidang_id)->first();
        $indi   = Indicator::selectraw('zo_indicator.*')
                        ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                        ->where('bidang_id',$bidang->id)->get();

        return view('targetbid.entrybid',compact('indi','data','bidang'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'indicator_id'  => $request->indicator_id[$i],
                    'years'         => $request->years[$i],
                    'targetbid_id' => $request->targetbid_id[$i],
                    'initiative'    => $request->initiative[$i],
                    'percentages'   => $request->percentages[$i]
                ];
                Targetbid_detail::create($data);
            }
        DB::commit(); 

        return redirect('/targetbid')->with('sukses','Data Tersimpan');
    }

    public function editmeta($id)
    {
        $bidang = Bidang::all();
        $data = Targetbid::where('id',$id)->first();

        return view('targetbid/editmeta',compact('data','bidang'));
    }

    public function updatemeta(Request $request, $id)
    {
        $data = Targetbid::find($id);
        $data->touch();
        $data->update($request->all());

        return redirect('/targetbid')->with('sukses','Data Diperbaharui');
    }

    public function edit($id)
    {
        $data       = Targetbid::where('id',$id)->first();
        $renstra    = Targetbid_detail::SelectRaw('DISTINCT years')
                                        ->where('targetbid_id',$id)->get();
        $bidang     = Bidang::where('id',$data->bidang_id)->first();
        $indi       = Indicator::selectraw('zo_indicator.*')
                                ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                                ->where('bidang_id',$bidang->id)->get();

        return view('targetbid/edit',compact('indi','data','renstra','bidang'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        for ($i = 0; $i < count($request->input('indicator_id')); $i++){
            $data = [
                'indicator_id' => $request->indicator_id[$i],
                'initiative' => $request->initiative[$i],
                'percentages' => $request->percentages[$i]
            ];
            Targetbid_detail::where('id', $request->id[$i])
                                ->update($data);
        }
        DB::commit();

        return redirect('/targetbid')->with('sukses','Data Berhasil Diperbaharui');
    }

}
