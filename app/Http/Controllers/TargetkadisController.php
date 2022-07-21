<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Indicator;
use App\Kinerja;
use App\Targetkadis;
use App\Bidang;
use App\Targetkadis_detail;

class TargetkadisController extends Controller
{
    public function index(Request $request)
    {
        $data = Targetkadis::orderBy('id','desc')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('zo_targetkadis.filename', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('targetkadis.index',compact('data'));
    }

    public function create()
    {
        return view('targetkadis.create');
    }

    public function generate(Request $request)
    {
        $this->validate($request,[
            'yearfrom' => 'required',
            'filename' => 'required'
        ]);

        $data = Targetkadis::create($request->all());
        $rens = $data->id;

        return redirect('/targetkadis/entrybid/'.$rens);
    }

    public function entrybid($id)
    {
        $data   = Targetkadis::where('id',$id)->first();
        $indi   = Indicator::selectraw('zo_indicator.*')
                        ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                        ->where('zo_kinerja.owned','3')->get();

        return view('targetkadis.entrybid',compact('indi','data'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
            for ($i = 0; $i < count($request->input('indicator_id')); $i++){
                $data = [
                    'indicator_id'  => $request->indicator_id[$i],
                    'years'         => $request->years[$i],
                    'targetkadis_id' => $request->targetkadis_id[$i],
                    'initiative'    => $request->initiative[$i],
                    'percentages'   => $request->percentages[$i]
                ];
                Targetkadis_detail::create($data);
            }
        DB::commit(); 

        return redirect('/targetkadis')->with('sukses','Data Tersimpan');
    }

    public function edit($id)
    {
        $data       = Targetkadis::where('id',$id)->first();
        $renstra    = Targetkadis_detail::SelectRaw('DISTINCT years')
                                        ->where('targetkadis_id',$id)->get();
        $indi       = Indicator::selectraw('zo_indicator.*')
                                ->leftjoin('zo_kinerja','zo_kinerja.id','zo_indicator.kinerja_id')
                                ->where('zo_kinerja.owned','3')->get();

        return view('targetkadis/edit',compact('indi','data','renstra'));
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
            Targetkadis_detail::where('id', $request->id[$i])
                                ->update($data);
        }
        DB::commit();

        return redirect('/targetkadis')->with('sukses','Data Berhasil Diperbaharui');
    }

    public function delete(Request $request, $id)
    {
        Targetkadis_detail::where('targetkadis_id',$id)->delete();
        Targetkadis::where('id',$id)->delete();
        return redirect('/targetkadis')->with('sukses','Data Berhasil dihapus');
        
    }

}
