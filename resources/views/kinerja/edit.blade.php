@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/kinerja">Kinerja</a></li>
    <li>Ubah</li>
@endsection
@section('content')

@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="/kinerja/update/{{$data->id}}">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Ubah Data Kinerja</h4>
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
                                <input type="text"  placeholder="kinerja" value="{{$data->names}}"
                                class="col-xs-10 col-sm-10 required "  name="names" required/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Digunakan Oleh
                        </label>
                        <div class="col-sm-9">
                            @if ($data->owned==1)
                                <input type="radio" name="owned" value="1" checked id="bidang">
                                <label class="control-label no-padding-right" for="form-field-1"> Bidang</label> 
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="2" id="subbid">
                                <label class="control-label no-padding-right" for="form-field-1"> Seksi / Subbag</label>
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="3" id="kadis">
                                <label class="control-label no-padding-right" for="form-field-1">Kadis</label>
                            @elseif ($data->owned==3)
                                <input type="radio" name="owned" value="1" id="bidang">
                                <label class="control-label no-padding-right" for="form-field-1"> Bidang</label> 
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="2" id="subbid">
                                <label class="control-label no-padding-right" for="form-field-1"> Seksi / Subbag</label>
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="3" checked id="kadis">
                                <label class="control-label no-padding-right" for="form-field-1">Kadis</label>    
                            @else
                                <input type="radio" name="owned" value="1" id="bidang">
                                <label class="control-label no-padding-right" for="form-field-1"> Bidang</label> 
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="2" checked id="subbid">
                                <label class="control-label no-padding-right" for="form-field-1"> Seksi / Subbag</label>
                                &nbsp;&nbsp;
                                <input type="radio" name="owned" value="3" id="kadis">
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
                                    @if ($item->id = $data->bidang_id)
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
                    <div class="form-group" >
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1">IKU
                        </label>
                        <div class="col-sm-9">
                            <select name="iku" class="col-xs-10 col-sm-10 select2">
                                @if ($data->iku == "Indeks Kualitas Air")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air" selected>Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @elseif ($data->iku == "Indeks Kualitas Air")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara" selected>Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @elseif ($data->iku == "Indeks Kualitas Lahan")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan" selected>Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @elseif ($data->iku == "Indeks Kualitas Air Laut")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut" selected>Indeks Kualitas Air Laut</option>
                                @else
                                    <option value="" selected>Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air" >Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @endif
                            </select>
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
    $(document).ready(function(){
       if (document.getElementById('subbid').checked) {
            $("#tampilbidang").hide();
       } else {
            $("#tampilsubbid").hide();
       }

        $("#bidang").click(function(){
            $("#tampilsubbid").hide();
            $("#tampilbidang").show();
        });
        $("#subbid").click(function(){
            $("#tampilbidang").hide();
            $("#tampilsubbid").show();
        });
    });
</script>
@endsection