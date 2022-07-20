@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li>Indikator</li>
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="row">
                        <div class="form-group col-xs-12 col-sm-3" style="float: left">
                           <a href="{{Route('indicator.create')}}"  class="btn btn-primary">Tambah Data</a>   
                        </div>
                        <div class="form-group col-xs-12 col-sm-5" style="float: right">
                            <div class="input-group">
                                <input type="text" class="form-control gp-search" name="keyword" placeholder="Cari " value="{{request('keyword')}}" autocomplete="off">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                                    <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-sub" data-toggle="tab">Esselon IV</a></li>
        <li><a href="#tab-bidang" data-toggle="tab">Esselon III</a></li>
        <li><a href="#tab-kadis" data-toggle="tab">Esselon II</a></li>

    </ul>
    <div class="tab-content">
        @include('indicator.partials.bidang')
        @include('indicator.partials.subbidang')
        @include('indicator.partials.kadis')

    </div>
@endsection

@section('footer')
<script>
    $().ready( function () {
        $(".delete").click(function() {
                var id = $(this).attr('r-id');
                var name = $(this).attr('r-name');
                Swal.fire({
                title: 'Ingin Menghapus?',
                text: "Yakin ingin menghapus data  : "+name+" ini ?" ,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus !'
            }).then((result) => {
                console.log(result);
                if (result.value) {
                    window.location = "/indicator/delete/"+id;
                }
            });
        });
    } );
</script>
@endsection
