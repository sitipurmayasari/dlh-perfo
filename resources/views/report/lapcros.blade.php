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
               Laporan Crosscutting SKPD <br>
               PROVINSI KALSEL <br>
               Periode {{$blnindo}} {{$request->years}}
        </b></div>
        <br>
    </div>
    <div>
        <h3>Peningkatan IKAL</h3>
        <table style="width: 100%">
           <thead>
                <tr>
                    <th>Nama SKPD</th>
                    <th>Kinerja</th>
                    <th>Indikator</th>
                    <th>Target</th>
                    <th>Realisasi</th>
                    <th>Capaian</th>
                    <th>Bobot</th>
                    <th>Target Kontribusi IKA</th>
                    <th>KOntribusi IKA</th>
                </tr>
           </thead>
           <tbody>
            @foreach ($ikal as $item)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
           </tbody>
        </table>
        
</body>
</html>