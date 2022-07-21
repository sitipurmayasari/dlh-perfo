@php
 $bln = $request->bulan;
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
    <title>Laporan Pengumpulan Data Capaian Periode {{$blnindo}} {{$request->years}}</title>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan-Realisasi-Bidang-$bid->name-Periode-$blnindo-$data->years.xls");
    ?>
    <style>
        @page {
                size: A4;
                font-family: 'Times New Roman';
                font-size: 12px;      
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
            color : white;
            background-color: #25D366;
        }
        td{
            vertical-align: top;
        }
    
       
        
    </style>
</head>
<body>
    <div class="col-sm-12 isi" style="text-align: center">
        <div style="align:center; font-size: 16px; text-transform: uppercase;"><b>
               Laporan Indeks Kualitas Air <br>
               DINAS LINGKUNGAN HIDUP PROVINSI KALSEL <br>
               Periode {{$blnindo}} {{$request->years}}
        </b></div>
        <br>
    </div>
    <div>
        <table style="width: 100%">
           <thead>
                <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Bidang / Sub / SKPD</th>
                    <th>Kinerja</th>
                    <th>Indikator</th>
                    <th>Target Tahun {{$request->years}}</th>
                    <th>Capaian</th>
                    <th>Analisis Capaian Kinerja</th>
                </tr>
           </thead>
           <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($bidang as $bid)
                    <tr>
                        <td style="text-align: center">{{$no}}</td>
                        <td>Bidang {{$bid->realisasi->bidang->name}}</td>
                        <td>{{$bid->indi->kinerja->names}}</td>
                        <td>{{$bid->indi->names}}</td>
                        <td style="text-align: center">{{$bid->target}}</td>
                        <td style="text-align: center">{{$bid->capaian}}</td>
                        <td>{{$bid->keterangan}}</td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
                @foreach ($subid as $subs)
                    <tr>
                        <td style="text-align: center">{{$no}}</td>
                        <td>Bidang {{$subs->realisasi->sub->name}}</td>
                        <td>{{$subs->indi->kinerja->names}}</td>
                        <td>{{$subs->indi->names}}</td>
                        <td style="text-align: center">{{$subs->target}}</td>
                        <td style="text-align: center">{{$subs->capaian}}</td>
                        <td>{{$subs->keterangan}}</td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
           </tbody>
        </table>
        
</body>
</html>