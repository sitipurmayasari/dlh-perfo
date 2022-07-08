@extends('layouts.app')
@section('breadcrumb')
    <li>Setup</li>
    <li><a href="/kinerja_skpd">Kinerja SKPD</a></li>
    <li>Ubah</li>
@endsection
@section('content')

@include('layouts.validasi')

<div class="row">
    <form class="form-horizontal validate-form" role="form" 
         method="post" action="/kinerja_skpd/update/{{$data->id}}">
    {{ csrf_field() }}
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Ubah Data Kinerja</h4>
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
                        <div class="col-sm-9">
                            <input type="text"  placeholder="Nama SKPD" value="{{$data->skpd}}"
                            class="col-xs-10 col-sm-10 required " name="skpd" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Kinerja
                        </label>
                        <div class="col-sm-9">
                            <input type="text"  placeholder="kinerja_skpd" value="{{$data->names}}"
                            class="col-xs-10 col-sm-10 required " name="names" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Indikator
                        </label>
                        <div class="col-sm-9">
                            <input type="text"  placeholder="indikator kinerja" value="{{$data->indicator}}"
                            class="col-xs-10 col-sm-10 required " name="indicator" required/>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1">IKU
                        </label>
                        <div class="col-sm-9">
                            <select name="iku" class="col-xs-10 col-sm-10 select2">
                                @if ($data->iku == "Indeks Kualitas Air")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air" selected>Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @elseif ($data->iku == "Indeks Kualitas Air")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara" selected>Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @elseif ($data->iku == "Indeks Kualitas Lahan")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan" selected>Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @elseif ($data->iku == "Indeks Kualitas Air Laut")
                                    <option value="">Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air">Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut" selected>Indeks Kualitas Air Laut</option>
                                @else
                                    <option value="" selected>Pilih Indeks</option>
                                    <option value="Indeks Kualitas Air" >Indeks Kualitas Air</option>
                                    <option value="Indeks Kualitas Udara">Indeks Kualitas Udara</option>
                                    <option value="Indeks Kualitas Lahan">Indeks Kualitas Lahan</option>
                                    <option value="Indeks Kualitas Air Laut">Indeks Kualitas Air Laut</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" 
                        for="form-field-1"> Bobot
                        </label>
                        <div class="col-sm-9">
                            <input type="number" value="{{$data->bobot}}"
                            class="col-xs-3 col-sm-3 required " name="bobot" required/>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Target Tahunan</h3></div>
            <div class="panel-body">
               <div class="col-md-12">
                <table id="myTable" class="table table-bordered table-hover text-center">
                    <thead>
                        <th class="text-center col-md-1">No</th>
                        <th class="text-center col-md-2">Tahun</th>
                        <th class="text-center col-md-2">Target</th>
                        <th class="text-center">Inisiatif</th>
                        <th class="text-center col-md-1">Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($target as $item)
                            <tr id="cell-{{$no}}">
                                <td style="text-align:center;">
                                    {{$no}}
                                </td>       
                                <td>
                                    <input type="hidden" name="target_id[]" value="{{$item->id}}">
                                    <select id="tahun" name="years[]" class="col-xs-10 col-sm-10" required>
                                        @php
                                            $now=date('Y');
                                            $c = $now+4;
                                            for ($a=2021;$a<=$c;$a++){

                                                if ($a == $item->years) {
                                                    $pilih="selected";
                                                }else {
                                                    $pilih="";
                                                }
                                                
                                                echo 
                                                    "<option value='$a' $pilih>$a</option>";
                                                }
                                        @endphp
                                    </select>
                                </td>
                                <td>
                                    <input type="number" step="0.001" name="percentages[]" placeholder="0" 
                                    value="{{$item->percentages}}" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="initiative[]" class="form-control" required value="{{$item->initiative}}">
                                </td>
                                <td>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                        <span id="row-new"></span>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <button type="button" class="form-control btn-default" onclick="addBarisNew()">
                                    <i class="glyphicon glyphicon-plus"></i>TAMBAH BARIS BARU</button>
                                <input type="hidden" id="countRow" value="{{$no}}">
                            </td>
                        </tr> 
                    </tfoot>
                </table>
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
@section('footer')
   <script>
        function addBarisNew(){
            var last_baris = $("#countRow").val();
            var new_baris = parseInt(last_baris);
            $isi ='<tr id="cell-'+new_baris+'">'+
                        '<td style="text-align:center;">'+new_baris+'</td>'+
                        '<td>'+
                            '<select id="tahun" name="years[]" required  class="form-control">'+   
                                 '<option value="2021">2021</option>'+        
                                 '<option value="2022">2022</option>'+  
                            '<option value="2023">2023</option>'+  
                            '<option value="2024">2024</option>'+
                            '</select>'+
                        '</td>'+
                        '<td>'+
                            '<input type="number" step="0.001" name="percentages[]" placeholder="0" id="1c"  value="0" class="form-control">'+ 
                        '</td>'+
                        '<td>'+
                            '<input type="text" name="initiative[]" class="form-control" required>'+  
                        '</td>'+
                        '<td><button type="button" class="btn btn-danger" onclick="deleteRow('+new_baris+')"><i class="glyphicon glyphicon-trash"></i></button></td>'+
                    '</tr>';
            $("#myTable").find('tbody').append($isi);
            $("#countRow").val(new_baris);
            $('.select2').select2();
       }

    
       function deleteRow(cell) {
            $("#cell-"+cell).remove();
        }
    
   </script>
@endsection