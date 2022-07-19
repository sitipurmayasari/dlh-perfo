@extends('layouts.app')
@inject('injectQuery', 'App\InjectQuery')
@section('breadcrumb')
    <li>Realisasi</li>
    <li><a href="/realbid">Realisasi Capaian  Bidang</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
method="post" action="{{route('realbid.store')}}" enctype="multipart/form-data"   >
{{ csrf_field() }}
<div class="row">
<div class="col-md-12">
    @php
        $bln = $data->month;
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
    
   <div class="panel panel-info">
       <div class="panel-heading"><h3 class="panel-title">Tambah Realisasi Periode {{$blnindo}} {{$data->years}}</h3></div>
       <div class="panel-body">
           <table  id="simple-table" class="table  table-bordered table-hover">
               <thead>
                    <tr>
                        <th style="text-align: center" >No</th>
                        <th style="text-align: center" class="col-md-3">Indikator</th>
                        <th style="text-align: center;" class="col-md-1">Target Akhir Renstra ({{$yearend->yearto}})</th>
                        <th style="text-align: center" class="col-md-1">Target Tahun {{$data->years}}</th>
                        <th style="text-align: center" class="col-md-2">Realisasi</th>
                        <th style="text-align: center" class="col-md-1">Capaian Tahun{{$data->years}}</th>
                        <th style="text-align: center" > capaian tahun {{$data->years}} terhadap target akhir renstra</th>
                        <th style="text-align: center" class="col-md-4">Analisis Capaian Kinerja</th>
                    </tr>
               </thead>
               <tbody>
                   @php
                       $no = 1;
                   @endphp
                    @foreach ($indi as $key=>$row)
                        <tr>
                            <td style="text-align: center">{{$no}}</td>
                            <td>
                                <input type="hidden" name="realisasibid_id[]" value="{{$data->id}}">
                                <input type="hidden" name="indicator_id[]" value="{{$row->indicator_id}}">
                                {{$row->indi->names}}
                            </td>
                            <td>
                                @php
                                    $isi = $injectQuery->getRenstra($row->id,$yearend->yearto,$row->indicator_id);
                                @endphp
                                <input type="number" name="target_akhir[]"  readonly  class="form-control" id="akhir-{{$no}}"
                                    value="{{$row->percentages}}">
                            </td>
                            <td>
                                <input type="number" readonly name="target[]" value="{{$row->percentages}}"
                                    id="target-{{$no}}" class="form-control">
                            </td>
                            <td><input type="number" name="real[]" value="0" step="0.01" class="form-control" id="real-{{$no}}" ></td>
                            <td><input type="number" name="capaian[]" value="0" step="0.01" class="form-control" id="hasil-{{$no}}" onkeyup="hitung({{$no}})"></td>
                            <td><input type="number" name="capaian_akhir[]" value="0" step="0.01" class="form-control" id="hasiltahun-{{$no}}"></td>
                            <td><textarea name="keterangan[]" id="" rows="5" class="form-control" required></textarea></td>
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
</div>
<div class="panel-footer">
    <div class="form-actions right">
        <button class="btn btn-success btn-sm " type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>SIMPAN
        </button>
    </div>
</div>
</form>

@endsection
@section('footer')
    <script>
        function hitung(i) {
            // var a = $("#target-"+i).val();
            // var b =  $("#real-"+i).val();
            // var d = (b / a) * 100;

            var hasil = parseFloat(d).toFixed(2);
            var x = $("#akhir-"+i).val();
            var y = $("#hasil-"+i).val();
            var z = (y / x );

            var hasiltahun = parseFloat(z).toFixed(2);
            $("#hasiltahun-"+i).val(hasiltahun);
        }
    </script>
@endsection