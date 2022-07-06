<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Realisasi;



class PortalController extends Controller
{
    public function index()
    {
        $sub =auth()->user()->subbidang_id;
        $bid =auth()->user()->bidang_id;
        $bln = Carbon::now()->month;
        $thn = Carbon::now()->year;
        

        if ($sub != null) {
           $realsub = Realisasi::where('subbidang_id',$sub)
                            ->whereMonth('month',$bln)  
                            ->whereYear('years',$thn)->first();  
        }
    
        return view('portal',compact('realsub','sub'));

    }
}
