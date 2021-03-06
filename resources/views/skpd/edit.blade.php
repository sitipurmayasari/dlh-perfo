@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/skpd">SKPD</a></li>
    <li>Ubah Data</li>
@endsection
@section('content')
@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
    method="post" action="/skpd/update/{{$data->id}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Form Ubah Nama SKPD</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <fieldset>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Nama SKPD
                        </label>
                        <div class="col-sm-8">
                            <input type="text"  placeholder="Nama SKPD" value="{{$data->name}}"
                                    class="col-xs-10 col-sm-10 required " 
                                    name="name" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Target 2021
                        </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{$data->t2021}}"
                                    class="col-xs-3 col-sm-3 required " 
                                    name="t2021" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Target 2022
                        </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{$data->t2022}}"
                                    class="col-xs-3 col-sm-3 required " 
                                    name="t2022" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Target 2023
                        </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{$data->t2023}}"
                                    class="col-xs-3 col-sm-3 required " 
                                    name="t2023" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Target 2024
                        </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{$data->t2024}}"
                                    class="col-xs-3 col-sm-3 required " 
                                    name="t2024" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Target 2025
                        </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{$data->t2025}}"
                                    class="col-xs-3 col-sm-3 required " 
                                    name="t2025" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Target 2026
                        </label>
                        <div class="col-sm-8">
                            <input type="number" value="{{$data->t2026}}"
                                    class="col-xs-3 col-sm-3 required " 
                                    name="t2026" required />
                        </div>
                    </div>
                    
                </fieldset>           
                </div>
            </div>
        </div>
    </div><!-- /.col -->
    
    <div class="col-sm-12">
        <div class="form-actions right">
            <button class="btn btn-success btn-sm " type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>Update
            </button>
        </div>
    </div>
    </form>
</div>
    
@endsection