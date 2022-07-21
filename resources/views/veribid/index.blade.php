@inject('injectQuery', 'App\InjectQuery')
@extends('layouts.app')
@section('breadcrumb')
    <li>Verifikasi</li>
    <li>Verifikasi Capaian  Bidang</li>
@endsection
@section('content')

<form method="get" action="{{ url()->current() }}">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-5" style="float: right">
                            <div class="input-group">
                                <input type="text" class="form-control gp-search" name="keyword" placeholder="Cari " value="{{request('keyword')}}" autocomplete="off">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                                    <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <div class="table-responsive">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
                <th width="40px">No</th>
                <th class="col-md-2">Judul</th>
                <th>Periode</th>
                <th> Seksi / Subbag</th>
                <th>Pejabat</th>
                <th>Verifikasi</th>
                <th  class="col-md-1">Verifikasi</th>
            </thead>
            <tbody>   	
                @foreach($data as $key=>$row)
                <tr>
                    <td>{{$data->firstItem() + $key}}</td>
                    <td>{{$row->filename}}</td>
                    <td>
                        @php
                            $bln = $row->month;
                                if ($bln==1) { 
                                    $blnindo = "Januari";
                                } else  if ($bln==2){
                                    $blnindo = "Februari";
                                } else  if ($bln==3){
                                    $blnindo = "Maret";
                                } else  if ($bln==4){
                                    $blnindo = "April";
                                } else  if ($bln==5){
                                    $blnindo = "Mei";
                                } else  if ($bln==6){
                                    $blnindo = "Juni";
                                } else  if ($bln==7){
                                    $blnindo = "Juli";
                                } else  if ($bln==8){
                                    $blnindo = "Agustus";
                                } else  if ($bln==9){
                                    $blnindo = "September";
                                } else  if ($bln==10){
                                    $blnindo = "Oktober";
                                } else  if ($bln==11){
                                    $blnindo = "November";
                                } else {
                                    $blnindo = "Desember";
                                }
                        @endphp
    
                        {{$blnindo}} {{$row->years}}
    
                    </td>
                    <td>{{$row->bidang->name}}</td>
                    <td>{{$row->user->name}}</td>
                    <td>
                        @php
                            $periv = $injectQuery->getPeriv($row->id);
                            $use = auth()->user()->role;

                        @endphp
                        @if ($periv != null)
                            @if ($periv->validasi_perencana !='R' && $periv->validasi_sekdis=='N')
                                <p style="color: red">Terdapat Revisi Dari Perencana</p>
                            @elseif ($periv->validasi_perencana=='Y' && $periv->validasi_sekdis=='N')
                                <p style="color: green">Divalidasi oleh Perencana</p>
                            @elseif ($periv->validasi_perencana=='Y' && $periv->validasi_sekdis=='R')
                                <p style="color: red">Terdapat Revisi Dari SekDis</p>  
                            @elseif ($periv->validasi_perencana=='Y' && $periv->validasi_sekdis=='Y')
                                <p style="color: green">Divalidasi oleh SekDis</p>
                            @endif
                        @else
                            <p style="color: grey">Belum Diverifikasi</p>
                        @endif
                    </td>
                    <td> 
                       @if ($periv != null)
                            @if ($use==1 && $periv->validasi_perencana !='Y' )
                                <a href="/veribid/validasi/{{$periv->id}}" class="btn btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            @elseif ($use==5 && $periv->verifikasi_sekdis !='Y' && $periv->validasi_perencana == 'Y' )
                                <a href="/veribid/validasi/{{$periv->id}}" class="btn btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            @elseif ($use==5 && $periv->verifikasi_sekdis =='Y' && $periv->validasi_perencana == 'Y' )
                                <i class="glyphicon glyphicon-ok"></i>
                            @endif
                       @elseif($use == 1)
                        <a href="/veribid/verifikasi/{{$row->id}}" class="btn btn-warning">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                       @endif
                    </td>
                </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
{{$data->appends(Request::all())->links()}}
@endsection