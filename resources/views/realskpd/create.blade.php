@extends('layouts.app')
@section('breadcrumb')
    <li>Realisasi</li>
    <li><a href="/realskpd">Realisasi Capaian  SKPD</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
method="post" action="{{route('realskpd.generate')}}" enctype="multipart/form-data"   >
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
                    for="form-field-1"> SKPD
                    </label>
                    <div class="col-sm-8">
                        <select name="skpd_id" class="col-xs-10 col-sm-10 select2" required id="bidang">
                            <option value="">Pilih SKPD</option>
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
                        <select name="years" class="col-xs-10 col-sm-10 select2" id="tahun" >
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
                        <select id="bulan" name="month" class="col-xs-10 col-sm-10">
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
@endsection