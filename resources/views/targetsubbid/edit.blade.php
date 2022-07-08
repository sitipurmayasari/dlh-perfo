@extends('layouts.app')
@inject('injectQuery', 'App\InjectQuery')
@section('breadcrumb')
    <li><i class="fa fa fa-500px">Renstra</i></li>
    <li><a href="/targetsubbid">Target Seksi / Subbag</a></li>
    <li>Ubah Data</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
    method="post" action="/targetsubbid/update/{{$data->id}}">
{{ csrf_field() }}
<div class="col-sm-12">
    @foreach ($renstra as $item)
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> Ubah Target Seksi / Subbag {{$bidang->name}}  Tahun {{$item->years}}</h4>
            <div class="widget-toolbar">
                <a href="#" data-action="collapse">
                    <i class="ace-icon fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">  
                <table id="simple-table" class="table  table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center; width:40%;">Indikator</th>
                            <th style="text-align: center; width:10%;">Target</th>
                            <th style="text-align: center">Initiative</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($indi as $key=>$row)
                        <tr>
                            <td style="text-align: center">{{$no++}}</td>
                            <td>
                                <input type="hidden" name="indicator_id[]" value="{{$row->id}}">
                                <input type="hidden" name="years[]" value="{{$item->years}}">
                                <input type="hidden" name="targetsubbid_id[]" value="{{$data->id}}">
                                {{$row->names}}
                            </td>
                            <td>
                                @php
                                    $isi = $injectQuery->getRenstra2($data->id,$item->years,$row->id);
                                @endphp
                                <input type="hidden" name="id[]" value="{{$isi->id}}">
                                <input type="number" name="percentages[]" value="{{$isi->percentages}}" step="0.01">
                                <td><input type="text" name="initiative[]" class="form-control" value="{{$isi->initiative}}"></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>   
            </div>  
        </div>
    </div>
    @endforeach
</div>
<br><br>
<div class="panel-footer">
    <div class="form-actions right">
        <button class="btn btn-success btn-sm " type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>UPDATE
        </button>
    </div>
</div>
</form>

@endsection