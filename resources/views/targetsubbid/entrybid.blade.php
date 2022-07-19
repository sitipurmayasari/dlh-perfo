@extends('layouts.app')
@section('breadcrumb')
    <li><i class="fa fa fa-500px">Renstra</i></li>
    <li><a href="/targetsubbid">Target Seksi / Subbag</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<form class="form-horizontal validate-form" role="form" 
method="post" action="{{route('targetsubbid.store')}}" enctype="multipart/form-data"   >
{{ csrf_field() }}
<div class="col-sm-12">
    @php
        $tahun = $data->yearfrom;
      
    @endphp
    @for ($i=0; $i <= $data->yearto - $data->yearfrom;$i++)
      <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title"> Tambah Target Seksi / Subbag {{$bidang->name}} Tahun {{$tahun}}</h4>
            <div class="widget-toolbar">
                <a href="#" data-action="collapse">
                    <i class="ace-icon fa fa-chevron-down"></i>
                </a>
            </div>
        </div>
        <div class="widget-body">
            <div class="widget-main no-padding">  
                <table id="simple-table" class="table  table-bordered table-hovser">
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
                                <input type="hidden" name="years[]" value="{{$tahun}}">
                                <input type="hidden" name="targetsubbid_id[]" value="{{$data->id}}">
                                {{$row->names}}
                            </td>
                            <td><input type="number" name="percentages[]" value="0" step="0.01" class="form-control"></td>
                            <td><input type="text" name="initiative[]" class="form-control" required></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>   
            </div>  
        </div>
    </div>
    @php
        $tahun++;
    @endphp
    @endfor
    
</div>
<div class="panel-footer">
    <div class="form-actions right">
        <button class="btn btn-success btn-sm " type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>SIMPAN
        </button>
    </div>
</div>
</form>

@endsection