<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Bidang;
use App\Subbidang;
use App\User;

class AksesController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id','desc')
                        ->selectraw('users.*')
                        ->leftjoin('zo_bidang','zo_bidang.id','users.bidang_id')
                        ->leftjoin('zo_subbidang','zo_subbidang.id','users.subbidang_id')
                        ->when($request->keyword, function ($query) use ($request) {
                            $query->where('name','LIKE','%'.$request->keyword.'%')
                            ->orWhere('zo_bidang.name', 'LIKE','%'.$request->keyword.'%')
                            ->orWhere('zo_subbidang.name', 'LIKE','%'.$request->keyword.'%');
                        })
                        ->paginate('10');

        return view('akses.index',compact('data'));
    }

    public function create()
    {
        $bidang = Bidang::all();
        $subbid = Subbidang::all();
        return view('akses.create',compact('bidang', 'subbid'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nip' => 'required|unique:users',
            'email' => 'required|unique:users',
            'role' => 'required'
        ]);
        
        if ($request->role == "5") {
            $bidang = "1";
        }else{
            $bidang = $request->bidang_id;
        }
        
        $request->merge([
            'bidang_id' => $bidang,
            'password' =>  bcrypt("lingkungan"),
            'remember_token' => Str::random(60)
        ]);

        $user=User::create($request->all());
        return redirect('/akses')->with('sukses','Data Tersimpan');
    }
   
    public function edit($id)
    {
        $bidang = Bidang::all();
        $subbid = Subbidang::all();
        $data = User::where('id',$id)->first();
        return view('akses.edit',compact('data','bidang', 'subbid'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email' => 'required|unique:users,email,'.$id
        ]);

        if($request->password_new!=""){
            $request->merge([
                'password' =>  bcrypt($request->password_new),
                'remember_token' => Str::random(60)
            ]);                
        }

        $user = User::find($id);
        $user->update($request->all());
        return redirect('/akses')->with('sukses','Data Diperbaharui');
    }

   
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/akses')->with('sukses','Data Terhapus');
    }
}
