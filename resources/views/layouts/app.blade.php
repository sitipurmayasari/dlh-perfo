<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title class="noPrint"> @yield('title') e-Performance</title>
		<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}" />

		<link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/font-awesome/4.7.0/css/font-awesome.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker3.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-timepicker.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/fonts.googleapis.com.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/ace.css')}}" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />
		<link href="{{asset('assets/sweetalert/sweetalert.css')}}" rel="stylesheet">
  		<link href="{{asset('assets/sweetalert/sweetalert.hack.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/toastr/toastr.min.css')}}">
        <style>
            @media print {
                .noPrint{ display:none;}
            }
        </style>

		@yield('header')


	</head>

	<body class="no-skin">

		@include('layouts.partials.navbar')

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<!-- scipted by dimas-->
				@include('layouts.partials.sidebar')

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<!-- Breadcrumbs-->
						<ol class="breadcrumb noPrint">
							@yield('breadcrumb')
						</ol>


					</div>

					<div class="page-content">
						@yield('content')
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer noPrint">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="green bolder">LapakLH</span>
							&copy; {{date('Y')}}
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- JS -->
        <script src="{{asset('assets/js/ace-extra.min.js')}}"></script>
        <script src="{{asset('assets/js/moment.min.js')}}"></script>

		<script src="{{asset('assets/js/jQuery-2.1.4.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>

		<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

		<script src="{{asset('assets/js/autosize.min.js')}}"></script>

		<script src="{{asset('assets/js/autoNumeric-min.js')}}"></script>

		<!-- ace scripts -->
		<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
		<script src="{{asset('assets/js/ace.min.js')}}"></script>

 		<script src="{{asset('assets/toastr/toastr.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<script src="{{asset('assets/js/select2.min.js')}}"></script>

		<script>
            $( function() {
			$( ".tanggal" ).datepicker({
                    format: 'yyyy-mm-dd',
		    	});

            $( ".tanggal-time" ).datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'
    	    	} );

	    	} );

            $('.select2').select2();

            @if(Session::has('sukses'))
                toastr.success("{{Session::get('sukses')}}", "Sukses",{timeOut: 5000})
            @endif
            @if(Session::has('gagal'))
                toastr.error("{{Session::get('gagal')}}", "Gagal",{timeOut: 5000})
            @endif
            function onlyNumber(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))

                    return false;
                return true;
		    }
		</script>
		@yield('footer')

	</body>
</html>
