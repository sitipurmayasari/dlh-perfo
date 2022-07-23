@php
 $bln = $request->month;
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Realisasi  Periode {{$blnindo}} {{$request->years}}</title>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan-Realisasi-$skpd->name-Periode-$blnindo-$request->years.xls");
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
                LAPORAN PENGUKURAN KINERJA BULAN {{$blnindo}}<br>
                KEPALA DINAS<br>
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
                    <th colspan="3">Target & Capaian {{$data->years}}</th>
                    <th rowspan="2">Keterangan</th>
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
                        {{$item->indi->names}}
                    </td>
                    <td>{{$item->indi->indicator}}</td>
                    <td style="text-align: center">{{$item->target}}</td>
                    <td style="text-align: center">{{$item->real}}</td>
                    <td style="text-align: center">{{$item->capaian}}</td>
                    <td>{{$item->keterangan}}</td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <br><br>
        
</body>
</html>