@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/skpd">SKPD</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
method="post" action="{{route('skpd.store')}}" enctype="multipart/form-data"   >
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
                    for="form-field-1"> Nama SKPD
                    </label>
                    <div class="col-sm-8">
                        <input type="text"  placeholder="Nama SKPD"
                                class="col-xs-10 col-sm-10 required " 
                                name="name" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target 2021
                    </label>
                    <div class="col-sm-8">
                        <input type="number" value="0" min ="0" step="0.001"
                                class="col-xs-10 col-sm-10 required " 
                                name="t2021" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target 2022
                    </label>
                    <div class="col-sm-8">
                        <input type="number" value="0" min ="0" step="0.001"
                                class="col-xs-10 col-sm-10 required " 
                                name="t2022" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target 2023
                    </label>
                    <div class="col-sm-8">
                        <input type="number" value="0" min ="0" step="0.001"
                                class="col-xs-10 col-sm-10 required " 
                                name="t2023" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target 2024
                    </label>
                    <div class="col-sm-8">
                        <input type="number" value="0" min ="0" step="0.001"
                                class="col-xs-10 col-sm-10 required " 
                                name="t2024" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target 2025
                    </label>
                    <div class="col-sm-8">
                        <input type="number" value="0" min ="0" step="0.001"
                                class="col-xs-10 col-sm-10 required " 
                                name="t2025" required />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" 
                    for="form-field-1"> Target 2026
                    </label>
                    <div class="col-sm-8">
                        <input type="number" value="0" min ="0" step="0.001"
                                class="col-xs-10 col-sm-10 required " 
                                name="t2026" required />
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
                "{{route('realbid.getrenstra') }}",
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