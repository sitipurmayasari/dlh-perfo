@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/akses">Hak Akses</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="{{route('akses.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> Input Hak Akses</h4>
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
                            for="form-field-1"> Nama
                            </label>
                            <div class="col-sm-9">
                                <input type="text"  placeholder="nama pegawai" 
                                class="col-xs-10 col-sm-10 required " name="name" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> NIP
                            </label>
                            <div class="col-sm-9">
                                <input type="text"  placeholder="nip pegawai" 
                                class="col-xs-10 col-sm-10 required " name="nip" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Role Akses
                            </label>
                            <div class="col-sm-9">
                                <input type="radio" name="role" value="1" checked id="bidang">
                                <label class="control-label no-padding-right" for="form-field-1"> Perencana</label> 
                                &nbsp;&nbsp;
                                <input type="radio" name="role" value="2" checked id="bidang">
                                <label class="control-label no-padding-right" for="form-field-1"> Kabid</label> 
                                &nbsp;&nbsp;
                                <input type="radio" name="role" value="3" id="subbid">
                                <label class="control-label no-padding-right" for="form-field-1">Kasie / Kasubag</label>
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
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Email
                            </label>
                            <div class="col-sm-9">
                                <input type="email"  placeholder="example@email.com" 
                                        class="col-xs-10 col-sm-10 required " 
                                        name="email" required/>
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
    // $(document).ready(function(){
    //     $("#tampilsubbid").hide();

    //     $("#bidang").click(function(){
    //         $("#tampilsubbid").hide();
    //         $("#tampilbidang").show();
    //     });
    //     $("#subbid").click(function(){
    //         $("#tampilbidang").hide();
    //         $("#tampilsubbid").show();
    //     });
    // });
</script>
@endsection