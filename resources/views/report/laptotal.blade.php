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
        }
        td{
            vertical-align: top;
        }
    
       
        
    </style>
</head>
<body>
    <div class="col-sm-12 isi" style="text-align: center">
        <div style="align:center; font-size: 14px; text-transform: uppercase;"><b>
               Laporan Pengumpulan Data Capaian Periode {{$blnindo}} {{$request->years}}
        </b></div>
        <br>
    </div>
    <div>
        <table style="width: 100%">
           <thead>
            <th style="width: 5%">No</th>
            <th>Nama BIdang / Sub / SKPD</th>
            <th style="width: 15%">Tanggal Pengumpulan</th>
           </thead>
           <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($bidang as $bid)
                <tr>
                    <td style="text-align: center">{{$no}}</td>
                    <td>Bidang {{$bid->bidang->name}}</td>
                    <td>{{$bid->dates}}</td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
            @foreach ($subbidang as $sub)
                <tr>
                    <td style="text-align: center">{{$no}}</td>
                    <td>Seksi {{$sub->sub->name}}</td>
                    <td>{{$sub->dates}}</td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
            @foreach ($skpd as $lain)
                <tr>
                    <td style="text-align: center">{{$no}}</td>
                    <td>SKPD {{$lain->skpd->name}}</td>
                    <td>{{$lain->dates}}</td>
                </tr>
                @php
                    $no++;
                @endphp
            @endforeach
           </tbody>
        </table>
            
        
</body>
</html>