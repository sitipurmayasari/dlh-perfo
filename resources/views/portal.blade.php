@extends('layouts.app')
@section('header')
  <style>
  
    /* Timeline Container */
    .timeline {
      background: var(--primary-color);
    }

    /* Outer Layer with the timeline border */
    .outer {
      border-left: 2px solid #333;
      padding: 16px;
    }

    /* Card container */
    .card {
      position: relative;
      margin: 0 0 20px 20px;
      padding: 10px;
      background: #333;
      color: gray;
      border-radius: 8px;
    }

    /* Information about the timeline */
    .info {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    /* Title of the card */
    .title {
      color: orangered;
      position: relative;
    }

    /* Timeline dot  */
    .title::before {
      content: "";
      position: absolute;
      width: 10px;
      height: 10px;
      background: white;
      border-radius: 999px;
      left: -39px;
      border: 3px solid orangered;
    }
  </style>
@endsection
@section('breadcrumb')
    <li><i class="fa fa-tachometer"> Dashboard</i></li>
@endsection
@section('content')        
  <link href="{{asset('assets/css/material.css')}}" rel="stylesheet">
<style>
    .box{
        width:45%;
        background:green;
        display: inline-block;
        margin-left: 10;
    }

    .card-category{
      text-align: left;
    }
</style> 


<div class="row">
  @php
    $bln = date('n');
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
        };

    $thn = date('Y');
  @endphp
    <div class="col-md-{{auth()->user()->isBidSub() ? '6' : '12' }}">
      <div class="col-md-12">
        <div class="card card-chart">
          <div class="card-header card-header-success">
            
            <h4 class="card-title">Capaian Kinerja Per Bidang</h4>
  
          </div>
          <div class="card-body">
            <div class="card-content" >
              <canvas id="target-realisasi-chart"  style="position: relative; height:55vh; "></canvas>
             </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              Periode Tahun {{$thn}}
            </div>
          </div>
        </div>
      
    </div>
    
    <div class="col-md-12">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          
          <h4 class="card-title">Capaian Kinerja Per Sub Bidang</h4>

        </div>
        <div class="card-body">
          <div class="card-content" >
            <canvas id="target-realisasi-chart-sub"  style="position: relative; height:55vh; "></canvas>
           </div>
        </div>
        <div class="card-footer">
          <div class="stats">
             Periode Tahun {{$thn}}
          </div>
        </div>
      </div>
    </div>
    </div>
    
    @if (auth()->user()->isBidSub() && $real!=null)
      <div class="col-md-6">
        <div class="timeline">
          <div class="outer">
            <div class="card">
              <div class="info">
                <h3 class="title">{{$real!=null ? "Laporan Kinerja ".intToMonth($real->month)." ".$real->years : ''}}</h3>
                <p>{{$real!=null ?
                    'Dibuat Pada Tanggal '.Carbon\Carbon::parse($real->created_at)->format('d M Y').
                    " Oleh ".$real->user->name : ''}}</p>
              </div>
            </div>

            @if ($real!=null)
              <div class="card">
                <div class="info">
                  <h3 class="title">{{$verif_kabid!=null ? "Verifikasi Kabid ".$verif_kabid->kabid_dates : ''}}</h3>
                  @if ($verif_kabid!=null)
                      <p>
                        Diverifikasi Kabid Pada Tanggal {{Carbon\Carbon::parse($verif_kabid->kabid_dates)->format('d M Y').
                        " Oleh ".$verif_kabid->kabid->name}}
                        <br>
                        @if ($verif_kabid->verifikasi_kabid=="Y")
                          Status : Terverifikasi <br>
                        @elseif ($verif_kabid->verifikasi_kabid=="R")
                        Status : DiRevisi <br>
                        @else  
                        Status : Belum Diverifikasi <br>
                        @endif
                        Catatan : {{$verif_kabid->catatan_kabit}}
                      </p>
                  @endif
                
                </div>
              </div>

              @if ($verif_kabid!=null)
                <div class="card">
                  <div class="info">
                    <h3 class="title">{{$valid_rencana!=null ? "Validasi Perencanaan ".$valid_rencana->perencana_dates : ''}}</h3>
                    @if ($valid_rencana!=null)
                      <p>
                        Divalidasi Perencanaan Pada Tanggal {{Carbon\Carbon::parse($valid_rencana->perencana_dates)->format('d M Y').
                        " Oleh ".$valid_rencana->perencana->name }}
                        <br>
                        @if ($valid_rencana->validasi_perencana=="Y")
                          Status : Tervalidasi <br>
                          @elseif ($valid_rencana->validasi_perencana=="R")
                          Status : DiRevisi <br>
                        @else  
                          Status : Belum Divalidasi <br>
                        @endif
                        Catatan : {{$valid_rencana->catatan_perencana}}
                      </p>
                      
                    @else 
                      <p>  Status : Belum Divalidasi Perencanaan </p>
                    @endif
                  
                  </div>
                </div>
              @endif

              @if ($valid_rencana!=null)
                <div class="card">
                  <div class="info">
                    <h3 class="title">{{$valid_sekdes!=null ? "Validasi Sekdis ".$valid_sekdes->sekdis_date : ''}}</h3>
                    @if ($valid_sekdes!=null)
                      <p>
                        Divalidasi Sekdis Pada Tanggal {{Carbon\Carbon::parse($valid_sekdes->sekdis_date)->format('d M Y').
                        " Oleh ".$valid_sekdes->sekdis->name }}
                        <br>
                        @if ($valid_sekdes->validasi_sekdis=="Y")
                          Status : Tervalidasi <br>
                          @elseif ($valid_sekdes->validasi_sekdis=="R")
                          Status : DiRevisi <br>
                        @else  
                          Status : Belum Divalidasi <br>
                        @endif
                        Catatan : {{$valid_rencana->catatan_sekdis}}
                      </p>
                      
                    @else 
                      <p>  Status : Belum Divalidasi Sekdis </p>
                    @endif
                  
                  </div>
                </div>
              @endif   
            @endif
          
          </div>
        </div>
      </div>
    @endif
  
    
   
</div>


   
@endsection
@section('footer')
<!-- JS -->
<script src="{{asset('assets/js/Chart.js')}}"></script>


<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('dashboard.getChartRealisasiTargetMonth') }}",
            type: "GET",
            dataType: 'json',
            success: function(rtnData) {
                $.each(rtnData, function(dataType, data) {
                    // alert(data.datasets);
                    console.log(data.labels);

                    var ctx = document.getElementById("target-realisasi-chart").getContext("2d");
                    var config = {
                        type: 'line',
                        defaultFontFamily: 'Montserrat',
                        data: {
                            datasets: data.datasets,
                            labels: data.labels,
                            hidden: true,
                        },
                        options:  {
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                titleFontSize: 12,
                                titleFontColor: '#000',
                                bodyFontColor: '#000',
                                backgroundColor: '#fff',
                                titleFontFamily: 'Montserrat',
                                bodyFontFamily: 'Montserrat',
                                cornerRadius: 3,
                                intersect: false,
                            },
                            legend: {
                                labels: {
                                    usePointStyle: true,
                                    fontFamily: 'Montserrat',
                                },
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    scaleLabel: {
                                        display: false,
                                        labelString: 'Month'
                                    }
                                    }],
                                yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Value'
                                    },
                                    }]
                            },
                            title: {
                                display: false,
                                text: 'Normal Legend'
                            }
                        }
                    };
                    var chartInstance = new Chart(ctx, config);
                    // chartInstance.data.datasets.forEach(function(ds) {
                    //     ds.hidden = !ds.hidden;
                    // });
                    chartInstance.update();


                });
            },
            error: function(rtnData) {
                alert('error' + rtnData);
            }
        });

        //
        $.ajax({
            url: "{{ route('dashboard.getChartRealisasiTargetMonthSub') }}",
            type: "GET",
            dataType: 'json',
            success: function(rtnData) {
                $.each(rtnData, function(dataType, data) {
                    // alert(data.datasets);
                    console.log(data.labels);

                    var ctx = document.getElementById("target-realisasi-chart-sub").getContext("2d");
                    var config = {
                        type: 'line',
                        defaultFontFamily: 'Montserrat',
                        data: {
                            datasets: data.datasets,
                            labels: data.labels,
                            hidden: true,
                        },
                        options:  {
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                titleFontSize: 12,
                                titleFontColor: '#000',
                                bodyFontColor: '#000',
                                backgroundColor: '#fff',
                                titleFontFamily: 'Montserrat',
                                bodyFontFamily: 'Montserrat',
                                cornerRadius: 3,
                                intersect: false,
                            },
                            legend: {
                                labels: {
                                    usePointStyle: true,
                                    fontFamily: 'Montserrat',
                                },
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    scaleLabel: {
                                        display: false,
                                        labelString: 'Month'
                                    }
                                    }],
                                yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Value'
                                    },
                                    }]
                            },
                            title: {
                                display: false,
                                text: 'Normal Legend'
                            }
                        }
                    };
                    var chartInstance = new Chart(ctx, config);
                    // chartInstance.data.datasets.forEach(function(ds) {
                    //     ds.hidden = !ds.hidden;
                    // });
                    chartInstance.update();


                });
            },
            error: function(rtnData) {
                alert('error' + rtnData);
            }
        });

    });

</script>
@endsection