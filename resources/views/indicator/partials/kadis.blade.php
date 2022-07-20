@inject('injectQuery', 'App\InjectQuery')
<div class="tab-pane" id="tab-kadis">
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
                                <th>Kinerja</th>
                                <th>Indikator</th>
                                <th class="col-md-2">Aksi</th>
                            </thead>
                            <tbody>   	
                                @foreach($datakadis as $key=>$row)
                                <tr>
                                    <td style="text-align: center">{{$datakadis->firstItem() + $key}}</td>                               
                                    <td>{{$row->kinerja->names}}</td>
                                    <td>{{$row->names}}</td>
                                    <td>
                                        <a href="/indicator/edit/{{$row->id}}" class="btn btn-warning">
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
                        {{$datakadis->appends(Request::all())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>