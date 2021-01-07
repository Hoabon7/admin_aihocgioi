@extends('master')

@section('content')
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <button type="button" class="addlevel btn btn-primary btn-md" data-toggle="modal" data-target="#addlevel" >Thêm</button>
            

            <div class="modal fade" id="addlevel" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Thêm level vào danh sách</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form_add_level" name="form_add_level" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"><label for="">Số thứ tự:</label><input
                                                id="add_level_id_ref" name="add_level_id_ref" class="form-control"
                                                type="text" size="2"></div>
                                        <div class="col-12 col-md-9"><label for="">Mã Cấp:</label><input type="text"
                                                id="add_level_id" name="add_level_id" class="form-control" type="text">
                                        </div>
                                        <div class="col-12 col-md-9"><label for="">Tên Cấp:</label><input
                                                id="add_level_name" name="add_level_name" class="form-control" type="text">
                                        </div>
                                        <div class="col-12 col-md-9"><input class="btn btn-primary" class="form-control"
                                                id="add_level_edit_submit" name="add_level_submit" type="submit"
                                                value="Thêm"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="animated fadeIn">
                <div class="modal fade" id="mediumApprove" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Sửa Thông Tin Cấp</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form_edit_level" name="form_edit_level" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"><label for="">Số thứ tự:</label><input
                                                id="level_id_ref" name="level_id_ref" class="form-control" type="text"
                                                size="2"></div>
                                        <div class="col-12 col-md-9"><input type="hidden" id="level_id" name="level_id"
                                                class="form-control" type="text"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Cấp:</label><input id="level_name"
                                                name="level_name" class="form-control" type="text"></div>
                                        <div class="col-12 col-md-9"><input class="btn btn-primary" class="form-control"
                                                id="level_edit_submit" name="level_submit" type="submit" value="update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal fade" id="upApproved" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Xóa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>có muốn xóa k</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="button" id="level_delete_submit" name="level_delete_submit"
                                    class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh Sách Cấp Học</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Mã Cấp</th>
                                            <th>Tên Cấp</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_level as $value)
                                            <tr>
                                                <td class="serial">{{ $value->id_ref }}</td>
                                                <td id="id_level">{{ $value->id }} </td>
                                                <td>{{ $value->name_level }}</td>
                                                <td>
                                                    <button type="button" class="edit btn btn-primary btn-sm "
                                                        id="{{ $value->id }}" data-toggle="modal"
                                                        data-target="#mediumApprove">Sửa</button>
                                                    {{-- <button type="button" 
                                                         data-toggle="modal"
                                                        data-target="#upApproved"></button> --}}
                                                    <a class="deletelevel btn btn-danger btn-sm" id="{{ $value->id }}"  
                                                        href="{{ route('deletelevel',$value->id) }}"  
                                                        >Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->

                            <!--paginate-->
                            <div class="card-header">
                                <div class="row form-group">
                                    <div class="col-12 col-md-8"><strong class="card-title">Đang xem
                                            {{ $data_level->currentPage() }} trong tổng số
                                            {{ $data_level->lastPage() }}</strong></div>
                                    <div class="col-12 col-md-4">

                                        <?php $lastPage = $data_level->currentPage() + 3; ?>
                                        @if ($lastPage > $data_level->lastPage())

                                            @if ($data_level->currentPage() - 2 < 0)
                                                @for ($i = $data_level->currentPage(); $i <= $data_level->lastPage(); $i++)
                                                    @if ($i == $data_level->currentPage())
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @else
                                                <a href="{{$url_root}}/level_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        << </span></a>
                                                @for ($i = $data_level->currentPage() - 1; $i <= $data_level->lastPage(); $i++)
                                                    @if ($i == $data_level->currentPage())
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @endif

                                        @else
                                            @if ($data_level->currentPage() == 1)
                                                @for ($i = $data_level->currentPage(); $i < $lastPage; $i++)
                                                    @if ($i == $data_level->currentPage())
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                                <a
                                                    href="{{$url_root}}/level_action.html?page={{ $data_level->lastPage() }}"><span
                                                        class="btn btn-info btn-sm">>></span></a>
                                            @else
                                                <a href="{{$url_root}}/level_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_level->currentPage() - 1; $i < $lastPage; $i++)
                                                    @if ($i == $data_level->currentPage())
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/level_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif

                                                @endfor
                                                <a
                                                    href="{{$url_root}}/level_action.html?page={{ $data_level->lastPage() }}"><span
                                                        class="btn btn-info btn-sm">>></span></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('Assets/Js/qlds.js')}}"></script>
