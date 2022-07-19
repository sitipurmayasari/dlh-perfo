@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/akses">Hak Akses</a></li>
    <li>Ubah</li>
@endsection
@section('content')

@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="/akses/update/{{$data->id}}">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Ubah hak Akses</h4>
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
                            <input type="text"  placeholder="nama pegawai" value="{{$data->name}}"
                            class="col-xs-10 col-sm-10 required " name="name" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> NIP
                        </label>
                        <div class="col-sm-9">
                            <input type="text"  placeholder="nip pegawai" value="{{$data->nip}}"
                            class="col-xs-10 col-sm-10 required " name="nip" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Role Akses
                        </label>
                        <div class="col-sm-9">
                           @if ($data->role=="2")
                           <input type="radio" name="role" value="1"  id="bidang">
                            <label class="control-label no-padding-right" for="form-field-1"> Perencana</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="2" id="bidang" checked>
                            <label class="control-label no-padding-right" for="form-field-1"> Kabid</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="3" id="subbid">
                            <label class="control-label no-padding-right" for="form-field-1">Kasie / Kasubag</label>
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="4" id="kadis">
                            <label class="control-label no-padding-right" for="form-field-1">Kadis</label>
                               
                           @elseif($data->role=="3")
                           <input type="radio" name="role" value="1"  id="bidang">
                            <label class="control-label no-padding-right" for="form-field-1"> Perencana</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="2" id="bidang" >
                            <label class="control-label no-padding-right" for="form-field-1"> Kabid</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="3" id="subbid" checked>
                            <label class="control-label no-padding-right" for="form-field-1">Kasie / Kasubag</label>
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="4" id="kadis">
                            <label class="control-label no-padding-right" for="form-field-1">Kadis</label>

                            @elseif($data->role=="4")
                           <input type="radio" name="role" value="1"  id="bidang">
                            <label class="control-label no-padding-right" for="form-field-1"> Perencana</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="2" id="bidang" >
                            <label class="control-label no-padding-right" for="form-field-1"> Kabid</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="3" id="subbid">
                            <label class="control-label no-padding-right" for="form-field-1">Kasie / Kasubag</label>
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="4" id="kadis" checked>
                            <label class="control-label no-padding-right" for="form-field-1">Kadis</label>

                           @else
                            <input type="radio" name="role" value="1" checked id="bidang" >
                            <label class="control-label no-padding-right" for="form-field-1"> Perencana</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="2" id="bidang">
                            <label class="control-label no-padding-right" for="form-field-1"> Kabid</label> 
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="3" id="subbid">
                            <label class="control-label no-padding-right" for="form-field-1">Kasie / Kasubag</label>
                            &nbsp;&nbsp;
                            <input type="radio" name="role" value="4" id="kadis">
                            <label class="control-label no-padding-right" for="form-field-1">Kadis</label>
                           @endif
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
                                    @if ($item->id == $data->bidang_id)
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endif
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
                                @if ($item->id == $data->subbidang_id)
                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Pangkat
                        </label>
                        <div class="col-sm-9">
                            <input type="text"  placeholder="penata" value="{{$data->pangkat}}"
                                    class="col-xs-10 col-sm-10 required " 
                                    name="pangkat" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Email
                        </label>
                        <div class="col-sm-9">
                            <input type="email"  placeholder="example@email.com"  value="{{$data->email}}"
                                    class="col-xs-10 col-sm-10 required " 
                                    name="email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> password
                        </label>
                        <div class="col-sm-9">
                            <input type="password"  value=""
                                        placeholder="Kosongkan password jika tidak ingin merubah"
                                        class="col-xs-10 col-sm-10 required "
                                        name="password_new" id="myInpute"/> &nbsp; 
                                <i class="fa fa-eye" onclick="eye()"></i>
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
                <i class="ace-icon fa fa-check bigger-110"></i>Update
            </button>
        </div>
    </div>
    </form>
</div>
    
@endsection
@section('footer')
<script>
   function eye() {
    var x = document.getElementById("myInpute");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endsection