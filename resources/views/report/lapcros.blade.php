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
        header("Content-Disposition: attachment; filename=Laporan-Crosscutting-Periode-$blnindo-$request->years.xls");
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
        }
        td{
            vertical-align: top;
        }

        .ika{
            background-color:#C4BCA6;
        }
        .iku{
            background-color: #E6C2BF;
        }
        .ikl{
            background-color: #25D366;
        }
        .ikal{
            background-color: #12A9D4;
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
        <h3>Peningkatan IKA (Index Kualitas Air)</h3>
        <table style="width: 100%">
           <thead>
                <tr>
                    <th class="ika">Nama SKPD</th>
                    <th class="ika">Kinerja</th>
                    <th class="ika">Indikator</th>
                    <th class="ika">Target</th>
                    <th class="ika">Realisasi</th>
                    <th class="ika">Capaian</th>
                    <th class="ika">Bobot</th>
                    <th class="ika">Target Kontribusi IKA</th>
                    <th class="ika">Kontribusi IKA</th>
                </tr> 
           </thead>
           <tbody>
            @foreach ($ika as $item)
                <tr>
                    @php
                        $t  = $item->target;
                        $b = $item->indi->bobot;
                        $c = $item->capaian;
                        $tki = $t*$b;
                        $ki = ($c*$tki)/100;

                    @endphp
                    <td>{{$item->realisasi->skpd->name}}</td>
                    <td>{{$item->indi->names}}</td>
                    <td>{{$item->indi->indicator}}</td>
                    <td style="text-align: center">{{$item->target}}</td>
                    <td style="text-align: center">{{$item->real}}</td>
                    <td style="text-align: center">{{$item->capaian}}</td>
                    <td style="text-align: center">{{$item->indi->bobot}}</td>
                    <td style="text-align: center">{{$tki}}</td>
                    <td style="text-align: center">{{$ki}}</td>
                </tr>
            @endforeach
           </tbody>
        </table>
    </div> 
    <br>
    <div>
        <h3>Peningkatan IKU (Index Kualitas Udara)</h3>
        <table style="width: 100%">
           <thead>
                <tr>
                    <th class="iku">Nama SKPD</th>
                    <th class="iku">Kinerja</th>
                    <th class="iku">Indikator</th>
                    <th class="iku">Target</th>
                    <th class="iku">Realisasi</th>
                    <th class="iku">Capaian</th>
                    <th class="iku">Bobot</th>
                    <th class="iku">Target Kontribusi IKU</th>
                    <th class="iku">Kontribusi IKU</th>
                </tr>
           </thead>
           <tbody>
            @foreach ($ikal as $item)
                <tr>
                    @php
                        $t  = $item->target;
                        $b = $item->indi->bobot;
                        $c = $item->capaian;
                        $tki = $t*$b;
                        $ki = ($c*$tki)/100;

                    @endphp
                    <td>{{$item->realisasi->skpd->name}}</td>
                    <td>{{$item->indi->names}}</td>
                    <td>{{$item->indi->indicator}}</td>
                    <td style="text-align: center">{{$item->target}}</td>
                    <td style="text-align: center">{{$item->real}}</td>
                    <td style="text-align: center">{{$item->capaian}}</td>
                    <td style="text-align: center">{{$item->indi->bobot}}</td>
                    <td style="text-align: center">{{$tki}}</td>
                    <td style="text-align: center">{{$ki}}</td>
                </tr>
            @endforeach
           </tbody>
        </table>
    </div> 
    <br>
    <div>
        <h3>Peningkatan IKL (Index Kualitas Lahan)</h3>
        <table style="width: 100%">
           <thead>
                <tr>
                    <th class="ikl">Nama SKPD</th>
                    <th class="ikl">Kinerja</th>
                    <th class="ikl">Indikator</th>
                    <th class="ikl">Target</th>
                    <th class="ikl">Realisasi</th>
                    <th class="ikl">Capaian</th>
                    <th class="ikl">Bobot</th>
                    <th class="ikl">Target Kontribusi IKL</th>
                    <th class="ikl">Kontribusi IKL</th>
                </tr>
           </thead>
           <tbody>
            @foreach ($ikal as $item)
                <tr>
                    @php
                        $t  = $item->target;
                        $b = $item->indi->bobot;
                        $c = $item->capaian;
                        $tki = $t*$b;
                        $ki = ($c*$tki)/100;

                    @endphp
                    <td>{{$item->realisasi->skpd->name}}</td>
                    <td>{{$item->indi->names}}</td>
                    <td>{{$item->indi->indicator}}</td>
                    <td style="text-align: center">{{$item->target}}</td>
                    <td style="text-align: center">{{$item->real}}</td>
                    <td style="text-align: center">{{$item->capaian}}</td>
                    <td style="text-align: center">{{$item->indi->bobot}}</td>
                    <td style="text-align: center">{{$tki}}</td>
                    <td style="text-align: center">{{$ki}}</td>
                </tr>
            @endforeach
           </tbody>
        </table>
    </div> 
    <br>
    <div>
        <h3>Peningkatan IKAL (Index Kualitas Air Laut)</h3>
        <table style="width: 100%">
           <thead>
                <tr>
                    <th class="ikal">Nama SKPD</th>
                    <th class="ikal">Kinerja</th>
                    <th class="ikal">Indikator</th>
                    <th class="ikal">Target</th>
                    <th class="ikal">Realisasi</th>
                    <th class="ikal">Capaian</th>
                    <th class="ikal">Bobot</th>
                    <th class="ikal">Target Kontribusi IKAL</th>
                    <th class="ikal">Kontribusi IKAL</th>
                </tr>
           </thead>
           <tbody>
            @foreach ($ikal as $item)
                <tr>
                    @php
                        $t  = $item->target;
                        $b = $item->indi->bobot;
                        $c = $item->capaian;
                        $tki = $t*$b;
                        $ki = ($c*$tki)/100;

                    @endphp
                    <td>{{$item->realisasi->skpd->name}}</td>
                    <td>{{$item->indi->names}}</td>
                    <td>{{$item->indi->indicator}}</td>
                    <td style="text-align: center">{{$item->target}}</td>
                    <td style="text-align: center">{{$item->real}}</td>
                    <td style="text-align: center">{{$item->capaian}}</td>
                    <td style="text-align: center">{{$item->indi->bobot}}</td>
                    <td style="text-align: center">{{$tki}}</td>
                    <td style="text-align: center">{{$ki}}</td>
                </tr>
            @endforeach
           </tbody>
        </table>
    </div>   
</body>
</html>