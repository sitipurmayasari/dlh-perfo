@extends('layouts.app')
@section('breadcrumb')
    <li>Realisasi</li>
    <li><a href="/realsubbid">Realisasi Capaian  Seksi / Subbag</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
method="post" action="{{route('realsubbid.generate')}}" enctype="multipart/form-data"   >
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
<div class="col-md-12">
   <div class="panel panel-info">
       <div class="panel-heading"><h3 class="panel-title">Tambah Realisasi Capaian</h3></div>
       <div class="panel-body">
           <div class="col-md-12">
               <br>
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
                    for="form-field-1">  Seksi / Subbag
                    </label>
                    <div class="col-sm-8">
                        <select name="subbidang_id" class="col-xs-10 col-sm-10 select2" required id="bidang">
                            <option value="">Pilih  Seksi / Subbag</option>
                            @foreach ($sub as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Periode Tahun
                    </label>
                    <div class="col-sm-8">
                        <select name="years" class="col-xs-10 col-sm-10 select2" id="tahun" onchange="getrenstra()">
                            <option value="">Pilih Tahun</option>
                            <?php
                                $a=date('Y');
                                $pus = $a+4;
                                for ($a=date('Y');$a<=$pus;$a++)
                                {
                                    echo "<option value='$a'>$a</option>";
                                }
                                ?>
                        </select>
                    </div>
                </div>
                <div  class="form-group" id="pilihbulan">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Pilih Bulan
                    </label>
                    <div class="col-sm-8">
                        <select id="bulan" name="month" class="col-xs-10 col-sm-10" required>
                            @php
                            $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                                             "September", "Oktober", "November", "Desember");
                            for($a=1;$a<=12;$a++){
                            if($a==date("m")){ 
                                $pilih="selected";
                            }else {
                                $pilih="";
                            }
                                echo("<option value=\"$a\" $pilih>$bulan[$a]</option>"."\n");
                            }
                            @endphp
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target
                    </label>
                    <div class="col-sm-8">
                        <select name="targetsubbid_id" class="col-xs-10 col-sm-10 select2" required id="target">
                            <option value="">Pilih Target  Seksi / Subbag</option>
                          
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Nama Dokumen
                    </label>
                    <div class="col-sm-8">
                        <input type="text" 
                                    class="col-xs-10 col-sm-10 required " 
                                    name="filename" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Nama Pembuat
                    </label>
                    <div class="col-sm-8">
                        <input type="text"  class="col-xs-10 col-sm-10 required " readonly value="{{auth()->user()->name}}" />
                        <input type="hidden" name="users_id" value="{{auth()->user()->id}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Data Pendukung*
                    </label>
                    <div class="col-sm-8">
                        <input type="file" name="files" class="btn btn-default btn-sm" id="" value="Upload File ">      
                        <label><i>jenis file:pdf, max:10MB</i></label>
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

@section('footer')
<script>
     function getrenstra(){
            var bidang = $("#bidang").val();
            var tahun = $("#tahun").val();

            $.get(
                "{{route('realsubbid.getrenstra') }}",
                {
                    bidang:bidang,
                    tahun:tahun
                },
                function(response) {
                    var data = response.data;

                    var string ="<option value=''>Pilih</option>";
                        $.each(data, function(index, value) {
                            string = string + '<option value="'+ value.id +'">'+ value.filename+'(tanggal : '+value.dates+')</option>';
                        })
                    $("#target").html(string);
                }
            );
        }
</script>
@endsection