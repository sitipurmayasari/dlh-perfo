@extends('layouts.app')
@section('breadcrumb')
    <li><i class="fa fa-tachometer"> Dashboard</i></li>
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/font-awesome/4.7.0/css/font-awesome.min.css')}}" />


		<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker3.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-timepicker.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-colorpicker.min.css')}}" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
		
		
		<link rel="stylesheet" href="{{asset('assets/css/fonts.googleapis.com.css')}}" />

		<link rel="stylesheet" href="{{asset('assets/css/ace.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
        
<link href="{{asset('assets/css/material.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


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
    {{-- <div class="col-md-5">
      <div class="card card-stats">
       @if ($realsub != null)
        @if ($realsub->verifikasi == 'E' )
          <div class="card-header card-header-warning card-header-icon">
        @elseif($realsub->verifikasi == 'Y')
          <div class="card-header card-header-success card-header-icon">
        @else
          <div class="card-header card-header-default card-header-icon">
        @endif
      @else
        <div class="card-header card-header-danger card-header-icon">
      @endif
          <div class="card-icon">
            <i class="material-icons">access_time
            </i>
          </div>
          @if ($realsub != null)
            @if ($realsub->verifikasi == 'E' )
              <p class="card-category">
                ! Pengajuan Realisasi Anda Perlu di Perbaiki <br>
                catatan : <br>
                {{$realsub->catatan}}
              </p>
            @elseif($realsub->verifikasi == 'Y')
              <p class="card-category">{{$realsub->catatan}}</p>
            @else
              <p class="card-category">Harap Menunggu, Pengajuan Realisasi Capaian Belum Terverifikasi</p>
            @endif
          @else
            <p class="card-category">Anda belum mengajukan Realisasi capaian pada periode ini</p>
          @endif
          <h1 class="card-title">
          </h1>
        </div>
        <div class="card-footer">
         <label for="">Periode {{$blnindo}} {{$thn}}</label>
        </div>
      </div>
    </div> --}}
    <div class="col-md-7">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          
          <h4 class="card-title">Sistem Infomasi Capaian Kinerja Lingkungan Hidup</h4>

        </div>
        <div class="card-body">
          <div class="card-content" >
            <canvas id="target-realisasi-chart"  style="position: relative; height:55vh; "></canvas>
           </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> Periode Tahun{{$thn}}
          </div>
        </div>
      </div>
    </div>
</div>


   
@endsection
@section('footer')
<!-- JS -->
<script src="{{asset('assets/js/ace-extra.min.js')}}"></script>
<script src="{{asset('assets/js/jQuery-2.1.4.min.js')}}"></script>

<script src="{{asset('assets/js/easy-number-separator.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('assets/js/spinbox.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/js/autosize.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.inputlimiter.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-tag.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.number.min.js')}}"></script>
<script src="{{asset('assets/js/autoNumeric-min.js')}}"></script>
<script src="{{asset('assets/js/chartist.min.js')}}"></script>
<script src="{{asset('assets/js/Chart.js')}}"></script>

<!-- ace scripts -->
<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
<script src="{{asset('assets/js/ace.min.js')}}"></script>

<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
 <script src="{{asset('assets/toastr/toastr.min.js')}}"></script>
 <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.select.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="http://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
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

    });

</script>
@endsection