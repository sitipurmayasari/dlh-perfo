@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li> SKPD</li>
@endsection
@section('content')


<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="{{route('skpd.store')}}">
         {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> Tambah Nama SKPD</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-down"></i>
                    </a>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding" col-sm-8>
                    <fieldset>
                    <br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Nama SKPD
                        </label>

                        <div class="col-sm-8">
                            <input type="text"  placeholder="Nama SKPD" 
                                    class="col-xs-10 col-sm-10 required " 
                                    name="name" required />
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
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan
            </button>
        </div>
    </div>
    </form>
</div>
<form method="get" action="{{ url()->current() }}">
    <div class="form-group col-xs-12 col-sm-3" style="float: right">
        <div class="input-group">
            <input type="text" class="form-control gp-search" name="keyword" placeholder="Cari" value="{{request('keyword')}}"  autocomplete="off">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                </button>
            </div>
        </div>
    </div>
</form>
    <hr><br><br>
    <div class="table-responsive">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
                <th width="40px">No</th>
                <th>Nama SKPD</th>
                <th>Aksi</th>
            <thead>
            <tbody>   	
                @foreach($data as $key=>$row)
                <tr>
                    <td>{{$data->firstItem() + $key}}</td>
                    <td>{{$row->name}}</td>
                    <td>
                        <a href="/skpd/edit/{{$row->id}}" class="btn btn-warning">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </td>
                </tr>
              
                @endforeach
            <tbody>
        </table>
    </div>
{{$data->appends(Request::all())->links()}}
@endsection
