@php
 $bln = $data->month;
 if ($bln==1) { 
     $blnindo = "JANUARI";
 } else  if ($bln==2){
     $blnindo = "FEBRUARI";
 } else  if ($bln==3){
     $blnindo = "MARET";
 } else  if ($bln==4){
     $blnindo = "APRIL";
 } else  if ($bln==5){
     $blnindo = "MEI";
 } else  if ($bln==6){
     $blnindo = "JUNI";
 } else  if ($bln==7){
     $blnindo = "JULI";
 } else  if ($bln==8){
     $blnindo = "AGUSTUS";
 } else  if ($bln==9){
     $blnindo = "SEPTEMBER";
 } else  if ($bln==10){
     $blnindo = "OKTOBER";
 } else  if ($bln==11){
     $blnindo = "NOVEMBER";
 } else {
     $blnindo = "DESEMBER";
 }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Realisasi Seksi {{$bid->name}} Periode {{$blnindo}} {{$data->years}}</title>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan-Realisasi-Bidang-$bid->name-Periode-$blnindo-$data->years.xls");
    ?>
    <style>
        @page {
                size: landscape;
                font-family: 'Times New Roman';
                font-size: 11px;      
        }
        
        .atas{
            border: none;
        }

        table, th, td, tr{
            border: 1px solid black;
            border-collapse: collapse;
        }
    
        th{
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }
        td{
            vertical-align: top;
        }
    
       
        
    </style>
</head>
<body>
    <div class="col-sm-12 isi" style="text-align: center">
        <div style="align:center; font-size: 18px; text-transform: uppercase;"><b>
                LAPORAN PENGUKURAN KINERJA SAMPAI DENGAN BULAN {{$blnindo}} TAHUN {{$data->years}}<br>
                KEPALA SEKSI {{$bid->name}}<br>
                DINAS LINGKUNGAN HIDUP PROVINSI KALSEL
        </b></div>
        <br>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kinerja Utama</th>
                    <th rowspan="2">Indikator</th>
                    <th rowspan="2">Capaian Thn {{$data->years-1}}</th>
                    <th colspan="3">Target & Capaian {{$data->years}}</th>
                    <th rowspan="2">Target Akhir Renstra</th>
                    <th rowspan="2">Capaian tahun {{$data->years}} terhadap<br>target akhir renstra</th>
                </tr>
                <tr>
                    <th>Target</th>
                    <th>Realisasi</th>
                    <th>Capaian (%)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($detail as $item)
                <tr>
                    <td style="text-align: center">
                        {{$no}}
                    </td>
                    <td>
                        {{$item->indi->kinerja->names}}
                    </td>
                    <td>{{$item->indi->names}}</td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center">{{$item->target}}</td>
                    <td style="text-align: center">{{$item->real}}</td>
                    <td style="text-align: center">{{$item->capaian}}</td>
                    <td style="text-align: center">{{$item->target_akhir}}</td>
                    <td style="text-align: center">{{$item->capaian_akhir}}</td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <br><br>
    <div>
        <table class="atas">
            <tr class="atas">
                <td class="atas"></td>
                <td class="atas">Mengetahui</td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas">Banjarbaru,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$blnindo}} {{$data->years}}</td>
            </tr>
            <tr class="atas">
                <td class="atas"></td>
                <td class="atas">KEPALA DINAS LINGKUNGAN HIDUP</td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas" style="text-transform: uppercase;">KEPALA SEKSI {{$bid->name}}</td>
            </tr>
            <tr class="atas">
                <td class="atas"></td>
                <td class="atas">PROV. KALSEL</td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
            </tr>
            <tr class="atas">
                <td class="atas"></td>
                <td style="height: 100px;" class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
            </tr>
            <tr class="atas">
                <td class="atas"></td>
                <td class="atas">NAma</td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas">Nama</td>
            </tr>
            <tr class="atas">
                <td class="atas"></td>
                <td class="atas">Pembina Utama Muda</td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas">Penata</td>
            </tr>
            <tr class="atas">
                <td class="atas"></td>
                <td class="atas">NIP.</td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas"></td>
                <td class="atas">NIP.</td>
            </tr>
        </table>
    </div>
        
</body>
</html>