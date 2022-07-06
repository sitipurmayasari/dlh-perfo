<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Indicator;
use App\Kinerja;
use App\Subbidang;
use App\Targetsubbid;
use App\Targetsubbid_detail;



class TargetsubbidController extends Controller
{
    public function index(Request $request)
    {
        $data = Targetsubbid::orderBy('id','desc')
                        ->paginate('10');

        return view('targetsubbid.index',compact('data'));
    }

    public function create()
    {
        $sub = Subbidang::all();

        return view('targetsubbid.create',compact('sub'));
    }

    public function generate(Request $request)
    {
        $this->validate($request,[
            'yearfrom' => 'required',
            'subbidang_id' => 'required',
            'sk_number' => 'required',
            'filename' => 'required'
        ]);

        $data = Targetsubbid::create($request->all());
        $rens = $data->id;

        return redirect('/targetsubbid/entrybid/'.$rens);
    }

    public function entrybid($id)
    {
        $data   = Targetsubbid::where('id',$id)->first();
        $bidang = Subbidang::where('id',$data->subbidang_id)->first();
        $indi   = Indicator::selectraw('zo_indicator.*')
                        ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                        ->where('subbidang_id',$bidang->id)->get();

        return view('targetsubbid.entrybid',compact('indi','data','bidang'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'indicator_id'  => $request->indicator_id[$i],
                    'years'         => $request->years[$i],
                    'targetsubbid_id' => $request->targetsubbid_id[$i],
                    'initiative'    => $request->initiative[$i],
                    'percentages'   => $request->percentages[$i]
                ];
                Targetsubbid_detail::create($data);
            }
        DB::commit(); 

        return redirect('/targetsubbid')->with('sukses','Data Tersimpan');
    }

    public function editmeta($id)
    {
        $bidang = Subbidang::all();
        $data = Targetsubbid::where('id',$id)->first();

        return view('targetsubbid/editmeta',compact('data','bidang'));
    }

    public function updatemeta(Request $request, $id)
    {
        $data = Targetsubbid::find($id);
        $data->touch();
        $data->update($request->all());

        return redirect('/targetsubbid')->with('sukses','Data Diperbaharui');
    }

    public function edit($id)
    {
        $data       = Targetsubbid::where('id',$id)->first();
        $renstra    = Targetsubbid_detail::SelectRaw('DISTINCT years')
                                        ->where('targetsubbid_id',$id)->get();
        $bidang     = SubBidang::where('id',$data->subbidang_id)->first();
        $indi       = Indicator::selectraw('zo_indicator.*')
                                ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                                ->where('subbidang_id',$bidang->id)->get();

        return view('targetsubbid/edit',compact('indi','data','renstra','bidang'));
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
            Targetsubbid_detail::where('id', $request->id[$i])
                                ->update($data);
        }
        DB::commit();

        return redirect('/targetsubbid')->with('sukses','Data Berhasil Diperbaharui');
    }

}
