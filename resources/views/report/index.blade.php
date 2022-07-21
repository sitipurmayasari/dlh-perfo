@extends('layouts.app')
@section('breadcrumb')
    <li><a href="/invent/laporan">Laporan</a></li>
    <li>Laporan Inventaris</li>

@endsection
@section('content')

<div class="row">
    <form method="post" action="{{Route('report.cetak')}}">

    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> Laporan Inventaris</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body">
                <div class="col-sm-6">
                    <div class="widget-main no-padding">
                        <fieldset>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> Jenis Laporan
                            </label>
                            <div class="col-sm-8">
                                <select name="jenis" id="jenis" class="col-xs-10 col-sm-10" onchange="myFunction()">
                                    <option value="1">Laporan Realisasi Bidang</option>
                                    <option value="2">Laporan Realisasi Sub Bidang</option>
                                    <option value="3">Laporan Realisasi Kadis</option>
                                    <option value="4">Laporan Realisasi SKPD</option>
                                    <option value="5">Laporan Pengumpulan Data</option>
                                    <option value="6">Laporan Index Kinerja Utama</option>
                                    <option value="7">Laporan Hasil Crosscutting</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" id="bidang">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> Bidang
                            </label>
                            <div class="col-sm-8">
                                <select name="bidang" class="col-xs-10 col-sm-10">
                                    <option value="">Pilih Bidang</option>
                                    @foreach ($bidang as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="sub">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> Sub Bidang
                            </label>
                            <div class="col-sm-8">
                                <select name="sub" class="col-xs-10 col-sm-10 select2">
                                    <option value="">Pilih Sub Bidang</option>
                                    @foreach ($sub as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="skpd">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> SKPD
                            </label>
                            <div class="col-sm-8">
                                <select name="skpd" class="col-xs-10 col-sm-10">
                                    <option value="">Pilih SKPD</option>
                                    @foreach ($skpd as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="ika">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> Indeks Kinerja
                            </label>
                            <div class="col-sm-8">
                                <select name="iku" class="col-xs-10 col-sm-10">
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" id="pilihtahun">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> Tahun
                            </label>
                            <div class="col-sm-8">
                                <select name="years" class="col-xs-10 col-sm-10">
                                    <?php
                                        $a=2022;
                                        $pus = $a+3;
                                        for ($a=date('Y');$a<=$pus;$a++)
                                        {
                                            echo "<option value='$a'>$a</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div  class="form-group" id="pilihbulan">
                            <label class="col-sm-3 control-label no-padding-right" 
                            for="form-field-1"> Pilih Bulan
                            </label>
                            <div class="col-sm-8">
                                <select id="bulan" name="bulan" class="col-xs-10 col-sm-10" required>
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
                        </fieldset>        
                    </div>
               </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-actions right" id="tjawab">
            <div class="form-group col-xs-12 col-sm-3" style="float: left">
                <input type="submit" value="CETAK" class="btn btn-primary">
            </div>
        </div>

    </div>
    </form>
</div>

@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $("#sub").hide();
        $("#skpd").hide();
        $("#ika").hide();
             
        $("#jenis").on("change", function(){
            var v = $(this).val();
            if(v=="1"){
                $("#sub").hide();
                $("#skpd").hide();
                $("#bidang").show();
                $("#ika").hide();
            }else if(v=="2"){
                $("#sub").show();
                $("#skpd").hide();
                $("#bidang").hide();
                $("#ika").hide();
            }else if(v=="3"){
                $("#sub").hide();
                $("#skpd").hide();
                $("#bidang").hide();
                $("#ika").hide();
            }else if(v=="4"){
                $("#sub").hide();
                $("#skpd").show();
                $("#bidang").hide();
                $("#ika").hide();
            }else if(v=="6"){
                $("#sub").hide();
                $("#skpd").hide();
                $("#bidang").hide();
                $("#ika").show();
            }else{
                $("#sub").hide();
                $("#skpd").hide();
                $("#bidang").hide();
                $("#ika").hide();
               
            } 
        });

    });
</script>
@endsection