@inject('injectQuery', 'App\InjectQuery')
<div class="tab-pane" id="tab-bidang">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group col-xs-12 col-sm-5" style="float: right">
                <form method="get" action="{{ url()->current() }}">
                <div class="input-group">
                    <input type="text" class="form-control gp-search" name="keyword" placeholder="Cari " value="{{request('keyword')}}" autocomplete="off">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>
            <div class="widget-body">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                                <th width="40px">No</th>
                                <th>Nama</th>
                                <th>Nama Bidang</th>
                                <th class="col-md-2">Aksi</th>
                            </thead>
                            <tbody>   	
                                @foreach($data as $key=>$row)
                                <tr>
                                    <td style="text-align: center">{{$data->firstItem() + $key}}</td>
                                    <td>{{$row->names}}</td>
                                    <td>
                                        @if ($row->owned == 1)
                                            {{$row->bidang->name}}
                                        @else
                                            {{$row->subbid->name}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/kinerja/edit/{{$row->id}}" class="btn btn-warning">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger delete"
                                            r-name="{{$row->names}}" 
                                            r-id="{{$row->id}}">
                                            <i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                              
                                @endforeach
                            </tbody>
                        </table>
                        {{$data->appends(Request::all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>