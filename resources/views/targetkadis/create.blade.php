@extends('layouts.app')
@section('breadcrumb')
    <li><i class="fa fa fa-500px">Renstra</i></li>
    <li><a href="/targetkadis">Target Bidang</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
method="post" action="{{route('targetkadis.generate')}}" enctype="multipart/form-data"   >
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
<div class="col-md-12">
   <div class="panel panel-info">
       <div class="panel-heading"><h3 class="panel-title">Tambah Target Bidang</h3></div>
       <div class="panel-body">
           <div class="col-md-12">
               <br>
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" 
                for="form-field-1">Nama 
                </label>
                <div class="col-sm-8">
                    <input type="text" class="col-xs-10 col-sm-10" value="{{auth()->user()->name}}"
                        readonly/>
                    <input type="hidden" value="{{auth()->user()->id}}" name="users_id"/>
                </div>
            </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1">Tanggal
                    </label>
                    <div class="col-sm-8">
                        <input type="date" id="dates" value="{{date('Y-m-d')}}"
                                class="col-xs-3 col-sm-3 " 
                                name="dates"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Periode Tahun
                    </label>
                    <div class="col-sm-8">
                        <input type="number"  style="width: 10%" placeholder="2021"
                        name="yearfrom" required />
                        <label class="control-label" > s/d </label>
                        <input type="number"  style="width: 10%" placeholder="2025"
                        name="yearto" />
                    </div>
                </div>
               <div class="form-group">
                   <label class="col-sm-2 control-label no-padding-right" 
                   for="form-field-1"> Nama File
                   </label>
                   <div class="col-sm-8">
                       <input type="text" name="filename" class="col-xs-10 col-sm-10"  required placeholder="REVISI-01"/>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<div class="panel-footer">
    <div class="form-actions right">
        <button class="btn btn-success btn-sm " type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>Generate
        </button>
    </div>
</div>
</form>

@endsection