@extends('layouts.app')
@section('breadcrumb')
    <li>Verifikasi</li>
    <li><a href="/verisubbid">Verifikasi Capaian  Seksi / Subbag</a></li>
    <li>Verifikasi</li>
@endsection
@section('content')

@include('layouts.validasi')

<style>
    thead{
        border: solid 1px; 
        border-color: #d7d7d7;    
        }
</style>
<div class="row">
    <form class="form-horizontal validate-form" role="form" 
        method="post" action="{{route('verisubbid.store')}}" enctype="multipart/form-data"   >
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Capaian</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <table>
                        <tr>
                            <td>Bidang</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; {{$data->sub->bidang->name}} </td>
                        </tr>
                        <tr>
                            <td> Seksi / Subbag</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; {{$data->sub->name}} </td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> 
                                @php
                                    $bln = $data->month;
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
                               &nbsp; {{$blnindo}} {{$data->years}}
                            </td>
                        </tr>
                        <tr>
                            <td>Target</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; {{$data->target->filename}} ({{$data->target->yearfrom}} s/d {{$data->target->yearto}}) </td>
                        </tr>
                        <tr>
                            <td>Dokumen Pendukung</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; <label><a href="{{$data->getFile()}}" target="_blank" >{{$data->files}}</a></label></td>
                        </tr>
                    </table>
                    <hr>
                    <table  id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                             <tr>
                                 <th style="text-align: center" >No</th>
                                 <th style="text-align: center">Kinerja Utama</th>
                                 <th style="text-align: center">Indikator</th>
                                 <th style="text-align: center" >Target Tahun {{$data->years}}</th>
                                 <th style="text-align: center">Realisasi</th>
                                 <th style="text-align: center">Hasil (%) </th>
                                 <th style="text-align: center" >Hasil Tahunan (%)</th>
                                 <th style="text-align: center">Keterangan</th>
                             </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                             @foreach ($detail as $key=>$row)
                                 <tr>
                                     <td style="text-align: center">{{$no}}</td>
                                     <td>
                                        {{$row->indi->kinerja->names}}
                                    </td>
                                     <td>
                                         {{$row->indi->names}}
                                     </td>
                                     <td style="text-align: center">{{$row->target}}
                                     </td>
                                     <td style="text-align: center">{{$row->real}}</td>
                                     <td style="text-align: center">{{$row->capaian}}</td>
                                     <td style="text-align: center">{{$row->capaian_akhir}}</td>
                                     <td>{{$row->keterangan}}</td>
                                 </tr>
                                 @php
                                     $no++;
                                 @endphp
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Verifikasi Capaian</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="widget-main no-padding">
                    <fieldset>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Verifikasi
                            </label>
                            <div class="col-sm-9">
                                <input type="radio" required value="N" checked
                                    name="verifikasi_kabid"/> &nbsp; Belum di Verifikasi &nbsp;
                                <input type="radio" required value="Y" 
                                    name="verifikasi_kabid"/> &nbsp; Terverifikasi &nbsp;
                                <input type="radio" required value="R"
                                    name="verifikasi_kabid"/> &nbsp; Perlu di perbaiki &nbsp;    
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Catatan
                            </label>
                            <div class="col-sm-9">
                                <input type="hidden" name="realisasi_id" value="{{$data->id}}">
                                <input type="hidden" name="kabid_id" value="{{auth()->user()->id}}">
                                <input type="hidden" id="dates" value="{{date('Y-m-d')}}" name="kabid_dates"/>
                                <input type="text" class="col-xs-10 col-sm-10 required "  
                                name="catatan_kabid" required/>
                            </div>
                    </div>
                    
                    </fieldset>        
                </div>
            </div>
        </div>
    </div><!-- /.col -->
    
    <div class="col-sm-12">
        <div class="form-actions right">
            <button class="btn btn-success btn-sm " type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan
            </button>
        </div>
    </div>
    </form>
</div>
    
@endsection