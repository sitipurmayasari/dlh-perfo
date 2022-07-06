@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/indicator">Indikator</a></li>
    <li>Tambah Baru</li>
@endsection
@section('content')
@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="{{route('indicator.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title"> Input Indikator</h4>
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
                        <div class="form-group"  id="tampilbidang">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Kinerja
                            </label>
                            <div class="col-sm-9">
                                <select name="kinerja_id" class="col-xs-10 col-sm-10 select2">
                                    <option value="">Pilih Kinerja</option>
                                    @foreach ($kinerja as $item)
                                        <option value="{{$item->id}}">{{$item->names}} 
                                            ( 
                                                @if ($item->owned == 1)
                                                    {{$item->bidang->name}}
                                                @else
                                                    {{$item->subbid->name}}
                                                @endif
                                            )
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" 
                            for="form-field-1"> Indikator
                            </label>
                            <div class="col-sm-8">
                                <textarea name="names" id="" cols="85" rows="5"></textarea>
                            </div>
                        </div>
                        </fieldset>        
                   
               </div>
           </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-actions right">
            <button class="btn btn-success btn-sm " type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan
            </button>
        </div>
    </div>
    </form>
</div>

@endsection