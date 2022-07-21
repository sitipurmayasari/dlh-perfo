@extends('layouts.app')
@section('breadcrumb')
    <li>Verifikasi</li>
    <li><a href="/veribid">Verifikasi Bidang</a></li>
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
    method="post" action="/veribid/update/{{$data->id}}">
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
                            <td> &nbsp; {{$real->bidang->name}} </td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> 
                                @php
                                    $bln = $real->month;
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
                               &nbsp; {{$blnindo}} {{$real->years}}
                            </td>
                        </tr>
                        <tr>
                            <td>Target</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; {{$real->target->filename}} ({{$real->target->yearfrom}} s/d {{$real->target->yearto}}) </td>
                        </tr>
                        <tr>
                            <td>Dokumen Pendukung</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; 
                                @if ($real->files != null)
                                    <label><a href="{{$real->getFile()}}" target="_blank" >{{$real->files}}</a></label>
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan Perencana</td>
                            <td>&nbsp; : &nbsp;</td>
                            <td> &nbsp; 
                                @if ($data->catatan_perencana != null)
                                    {{$data->catatan_perencana}}
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table  id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                             <tr>
                                 <th style="text-align: center" >No</th>
                                 <th style="text-align: center">Kinerja Utama</th>
                                 <th style="text-align: center">Indikator</th>
                                 <th style="text-align: center" >Target Tahun {{$real->years}}</th>
                                 <th style="text-align: center">Realisasi</th>
                                 <th style="text-align: center">Capaian (%) </th>
                                 <th style="text-align: center" >Capaian Tahun {{$real->years}}</th>
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
                <h4 class="widget-title">Verifikasi Capaian Oleh Sekdis</h4>
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
                                @if ($data->validasi_sekdis=='Y')
                                    <input type="radio" required value="N" 
                                    name="validasi_sekdis"/> &nbsp; Belum di Verifikasi &nbsp;
                                    <input type="radio" required value="Y" checked
                                    name="validasi_sekdis"/> &nbsp; Terverifikasi &nbsp;
                                    <input type="radio" required value="R"
                                    name="validasi_sekdis"/> &nbsp; Perlu di perbaiki &nbsp; 
                                @elseif ($data->validasi_sekdis=='R')
                                    <input type="radio" required value="N" 
                                    name="validasi_sekdis"/> &nbsp; Belum di Verifikasi &nbsp;
                                    <input type="radio" required value="Y" 
                                    name="validasi_sekdis"/> &nbsp; Terverifikasi &nbsp;
                                    <input type="radio" required value="R" checked
                                    name="validasi_sekdis"/> &nbsp; Perlu di perbaiki &nbsp; 
                                @else
                                    <input type="radio" required value="N" checked
                                    name="validasi_sekdis"/> &nbsp; Belum di Verifikasi &nbsp;
                                    <input type="radio" required value="Y" 
                                    name="validasi_sekdis"/> &nbsp; Terverifikasi &nbsp;
                                    <input type="radio" required value="R"
                                    name="validasi_sekdis"/> &nbsp; Perlu di perbaiki &nbsp;  
                                @endif  
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Catatan
                            </label>
                            <div class="col-sm-9">
                                <input type="hidden" name="realisasibid_id" value="{{$realisasibid_id->id}}">
                                <input type="hidden" name="sekdis_id" value="{{auth()->user()->id}}">
                                <input type="hidden" id="dates" value="{{date('Y-m-d')}}" name="sekdis_dates"/>
                                <input type="text" class="col-xs-10 col-sm-10 required "  value="{{$data->catatan_sekdis}}"
                                name="catatan_sekdis" required/>
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