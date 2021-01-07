@extends('master')

@section('content')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="animated fadeIn">
                <div class="modal fade" id="mediumApprove" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Sửa Thông Tin Sách</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form_edit_book" name="form_edit_book" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"><input type="hidden" class="form-control"
                                                type="text" name="id_level" id="id_level" size="2"></div>
                                        <div class="col-12 col-md-9"><input
                                                class="form-control" type="hidden" name="id_book" id="id_book"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Lớp</label><input
                                                class="form-control" type="text" name="name_level" id="name_level"></div>
                                        <div class="col-12 col-md-9"><label for="">Mã chương:</label><input
                                                class="form-control" type="text" name="id_chapter" id="id_chapter"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên kiểu sách</label><input
                                            class="form-control" type="text" name="type_name" id="type_name"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Chương</label><input
                                            class="form-control" type="text" name="name_chapter" id="name_chapter"></div>
                                        <div class="col-12 col-md-9"><label for="">Mã bài</label><input
                                            class="form-control" type="text" name="id_lesson" id="id_lesson"></div>
                                        <div class="col-12 col-md-9"><label for="">tên bài</label><input
                                            class="form-control" type="text" name="name_lesson" id="name_lesson"></div>
                                        <div class="col-12 col-md-9"><label for="">Mã nội dung</label><input
                                            class="form-control" type="text" name="id_content" id="id_content"></div>
                                        <div class="col-12 col-md-9"><label for="">Tiêu đề nội dung</label><input
                                            class="form-control" type="text" name="title_content" id="title_content"></div>

                                        <div class="col-12 col-md-9"><input
                                                class="form-control" type="hidden" name="book_id_level" id="book_id_level"></div>
                                        <div class="col-12 col-md-9"><input class="btn btn-primary" id="book_edit_submit" class="form-control"
                                                type="submit" value="update"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="upApproved" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                    style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Từ chối duyệt</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>bạn có muốn xóa không?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="showContent" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Chi Tiết Nội Dung</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_edit_content" name="form_edit_content" method="post" class="form-horizontal">
                                @csrf
                                
                                <div class="row form-group">
                                    <div class="col-12 col-md-9"><input
                                        class="form-control" type="text" name="id_content_detail" id="id_content_detail"></div>
                                    <div class="col-12 col-md-9"><label for="">Mã nội dung</label><textarea type="hidden" class="form-control"
                                            type="text" name="content_book" id="content_book" size="2"></textarea></div>
                                    <div class="col-12 col-md-9"><input class="btn btn-primary"  class="form-control"
                                            type="submit" value="cập nhật"></div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
                {{-- {{var_dump($data['id_book_level1'])}} --}}
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tìm kiếm</strong>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('filecontent')}}" method="get" class="form-horizontal">
                                    {{-- @csrf --}}
                                    <div class="row form-group">
                                        <div class="col-12 col-md-3">
                                            <select name="selectBook" id="selectBook" class="form-control-sm form-control">
                                                    <option value="{{$data['id_book']}}">
                                                     {{$data['id_book']}} 
                                                    </option>
                                                    @foreach ($data['list_book'] as $value )
                                                    <option value="{{$value[0]->id}}">
                                                        <?php 
                                                        $idBook=$value[0]->id;
                                                        $STRING =$idBook[0].$idBook[1].$idBook[2]; 
 
                                                        ?> 
                                                        @if ($STRING == 'sbt')
                                                            {{"Sách bài tập ".$value[0]->name_book}}
                                                            
                                                        @else
                                                            {{"Sách giáo khoa ".$value[0]->name_book}}
                                                        @endif
                                                        </option>
                                                @endforeach

                                                
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <select name="selectChapter" id="selectChapter" class="form-control-sm form-control">
                                                <option value="">Chapter</option>
                                                @foreach ($data['chapter'] as $value )
                                                    <option value="{{$value[0]->id}}">
                                                        
                                                       {{$value[0]->name_chapter}}
                                                        </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="id_level" id="id_level" value="{{$data['id_level']}}">
                                        {{-- <div class="col-12 col-md-3"><input type="tex" id="name-input" name="name-input" placeholder="Nhập nội dung ghi chú" class="form-control"></div> --}}
                                        <div class="col-12 col-md-2"><input class="btn btn-primary btn-sm"
                                            type="submit" value="Tìm kiếm"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">Mã Lớp</th>
                                            <th>Mã Sách</th>
                                            <th>Mã Chương</th>
                                            <th>Tên Kiểu Sách</th>
                                            <th>Tên Chương</th>
                                            <th>Mã Bài</th>
                                            <th>Tên Bài</th>
                                            <th>Mã Nôi Dung</th>
                                            <th>Tiêu Đề</th>
                                            {{-- <th>Nội Dung</th> --}}
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $data_level1=$data['data_level1']; ?>
                                        @foreach ($data_level1 as $value)
                                            <tr>
                                                <td class="serial">{{ $value->id_level }}</td>
                                                <td>{{ $value->id_book }}</td>
                                                <td>{{ $value->id_chapter }}</td>
                                                <td>{{ $value->type_name }}</td>
                                                <td>{{ $value->name_chapter }}</td>
                                                <td>{{ $value->id_lesson }}</td>
                                                <td>{{ $value->name_lesson }}</td>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->title }}</td>
                                                {{-- <td>{{ $value->content }}</td> --}}
                                                <td>
                                                    <button class="edit btn btn-primary btn-sm" data-toggle="modal" id="{{$value->id}}"
                                                        data-target="#mediumApprove">Sửa</button>
                                                    <button class="delete btn btn-danger btn-sm" data-toggle="modal"  id="{{$value->id}}"
                                                        data-target="#upApproved">Xóa</button>
                                                    <button class="show btn btn-info btn-sm" data-toggle="modal"  id="{{$value->id}}"
                                                        data-target="#showContent">Nội dung</button>
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
                                            {{ $data_level1->currentPage() }} trong tổng số
                                            {{ $data_level1->lastPage() }}</strong></div>
                                    <div class="col-12 col-md-4">

                                        <?php $lastPage = $data_level1->currentPage() + 3; ?>
                                            @if ($lastPage > $data_level1->lastPage())
                                                @if ($data_level1->currentPage() - 2 < 0)
                                                    @for ($i = $data_level1->currentPage(); $i <= $data_level1->lastPage(); $i++)
                                                        @if ($i == $data_level1->currentPage())
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                        @else
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                        @endif
                                                    @endfor
                                                @else
                                                    <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page=1"><span
                                                            class="btn btn-info btn-sm">
                                                            <<</span></a>
                                                    @for ($i = $data_level1->currentPage() - 1; $i <= $data_level1->lastPage(); $i++)
                                                        @if ($i == $data_level1->currentPage())
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                        @else
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                        @endif
                                                    @endfor
                                                @endif
                                            @else
                                                @if ($data_level1->currentPage() == 1)
                                                    @for ($i = $data_level1->currentPage(); $i < $lastPage; $i++)
                                                        @if ($i == $data_level1->currentPage())
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                        @else
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                        @endif
                                                    @endfor
                                                    <a
                                                        href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $data_level1->lastPage() }}"><span
                                                            class="btn btn-info btn-sm">>></span></a>
                                                @else
                                                    <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page=1"><span
                                                            class="btn btn-info btn-sm">
                                                            <<</span></a>
                                                    @for ($i = $data_level1->currentPage() - 1; $i < $lastPage; $i++)
                                                        @if ($i == $data_level1->currentPage())
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                        @else
                                                            <a href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $i }}"><span
                                                                    class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                        @endif

                                                    @endfor
                                                    <a
                                                        href="{{$url_root}}/filecontent?selectBook={{$data['id_book']}}&selectChapter={{$data['id_chapter']}}&id_level={{$data['id_level']}}&page={{ $data_level1->lastPage() }}"><span
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
<script src="{{asset('Assets/Js/ajaxcontentlevel.js')}}"></script>


