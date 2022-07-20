@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/kinerja">Kinerja</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="{{route('kinerja.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> Input Kinerja</h4>
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
                            for="form-field-1"> Judul Kineja
                            </label>
                            <div class="col-sm-9">
                                <input type="text"  placeholder="kinerja" 
                                class="col-xs-10 col-sm-10 required " name="names" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Digunakan Oleh
                            </label>
                            <div class="col-sm-9">
                                <input type="radio" name="owned" value="1" checked id="bidang">
                                <label class="control-label no-padding-right" for="form-field-1"> Bidang</label> 
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="2" id="subbid">
                                <label class="control-label no-padding-right" for="form-field-1">Seksi / Subbag</label>
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="3" id="kadis">
                                <label class="control-label no-padding-right" for="form-field-1">Kadis</label>
                            </div>
                        </div>
                        <div class="form-group"  id="tampilbidang">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Bidang
                            </label>
                            <div class="col-sm-9">
                                <select name="bidang_id" class="col-xs-10 col-sm-10 select2">
                                    <option value="">Pilih Bidang</option>
                                    @foreach ($bidang as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group"  id="tampilsubbid">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Seksi / Subbag
                            </label>
                            <div class="col-sm-9">
                                <select name="subbidang_id" class="col-xs-10 col-sm-10 select2">
                                    <option value="">Pilih Seksi / Subbag</option>
                                    @foreach ($subbid as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1">IKU
                            </label>
                            <div class="col-sm-9">
                                <select name="iku" class="col-xs-10 col-sm-10 select2">
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                </select>
                            </div>
                        </div>
                        </fieldset>        
                   
               </div>
           </div>
        </div>
    </div>
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
@section('footer')
<script>
    $(document).ready(function(){
        $("#tampilsubbid").hide();

        $("#bidang").click(function(){
            $("#tampilsubbid").hide();
            $("#tampilbidang").show();
        });
        $("#subbid").click(function(){
            $("#tampilbidang").hide();
            $("#tampilsubbid").show();
        });
        $("#kadis").click(function(){
            $("#tampilbidang").hide();
            $("#tampilsubbid").hide();
        });
    });
</script>
@endsection