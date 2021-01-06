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
                                <h5 class="modal-title" id="mediumModalLabel">Sửa Thông Tin Bài</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form_edit_lesson" name="form_edit_lesson" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"><input class="form-control" type="hidden" type="text"
                                                name="lesson_id" id="lesson_id" size="2"></div>
                                        <div class="col-12 col-md-9"><label for="">Mã Chương:</label><input
                                                class="form-control" type="text" name="lesson_id_chapter"
                                                id="lesson_id_chapter"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Bài:</label><input
                                                class="form-control" type="text" name="lesson_name" id="lesson_name"></div>
                                        <div class="col-12 col-md-9"><input class="btn btn-primary" class="form-control"
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
                                <p>bạn có muốn xóa k</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-danger">Thực hiện</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh Sách Loại Sách</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">Mã Bài Học</th>
                                            <th>Mã Chương</th>
                                            <th>Tên Bài Học</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_lesson as $value)
                                            <tr>
                                                <td class="serial">{{ $value->id }}</td>
                                                <td>{{ $value->id_chapter }}</td>
                                                <td>{{ $value->name_lesson }}</td>
                                                <td>
                                                    <button class="edit btn btn-primary btn-sm" data-toggle="modal"
                                                        id="{{ $value->id }}" data-target="#mediumApprove">Sửa</button>
                                                    <button class="delete btn btn-danger btn-sm" data-toggle="modal"
                                                        id="{{ $value->id }}" data-target="#upApproved">Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                            <div class="card-header">
                                <div class="row form-group">
                                    <div class="col-12 col-md-8"><strong class="card-title">Đang xem
                                            {{ $data_lesson->currentPage() }} trong tổng số
                                            {{ $data_lesson->lastPage() }}</strong></div>
                                    <div class="col-12 col-md-4">
                                        <?php $lastPage = $data_lesson->currentPage() + 3; ?>
                                        @if ($lastPage > $data_lesson->lastPage())
                                            @if ($data_lesson->currentPage() - 2 < 0)
                                                @for ($i = $data_lesson->currentPage(); $i <= $data_lesson->lastPage(); $i++)
                                                    @if ($i == $data_lesson->currentPage())
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @else
                                                <a href="{{$url_root}}/lesson_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_lesson->currentPage() - 1; $i <= $data_lesson->lastPage(); $i++)
                                                    @if ($i == $data_lesson->currentPage())
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @endif
                                        @else
                                            @if ($data_lesson->currentPage() == 1)
                                                @for ($i = $data_lesson->currentPage(); $i < $lastPage; $i++)
                                                    @if ($i == $data_lesson->currentPage())
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                                <a
                                                    href="{{$url_root}}/lesson_action.html?page={{ $data_lesson->lastPage() }}"><span
                                                        class="btn btn-info btn-sm">>></span></a>
                                            @else
                                                <a href="{{$url_root}}/lesson_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_lesson->currentPage() - 1; $i < $lastPage; $i++)
                                                    @if ($i == $data_lesson->currentPage())
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/lesson_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif

                                                @endfor
                                                <a
                                                    href="{{$url_root}}/lesson_action.html?page={{ $data_lesson->lastPage() }}"><span
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

<script>
    $(document).ready(function() {
        $(document).on('click', '.edit', function() {
            var id_lesson = $(this).attr('id');
            $.ajax({
                "url": '{!!  url('editlesson/') !!}/' + id_lesson,
                "type": "GET",
                "dataType": "JSON",
                success: function(data) {
                    $('#lesson_id').val(data[0][
                        'id'
                    ]); //lấy dữ liệu từ csdl đổ vào trong phần input của
                    $('#lesson_id_chapter').val(data[0]['id_chapter']);
                    $('#lesson_name').val(data[0]['name_lesson']);
                    //console.log(data);
                }
            });
        });
        //$(document).on('click')
        $('#form_edit_lesson').on('submit', function(event) {
            //alert('hoa');
            event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
            var url_edit = "{{ route('updatelesson') }}";
            //console.log($(this).serialize());
            $.ajax({
                url: url_edit,
                //headers: {'X-CSRF-TOKEN': token},
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",

                success: function(data) {
                    console.log(data);
                    //console.log(data);
                    $('.modal-footer>button').click();
                    $('.close').attr("enabled", true);

                    //console.log(data[0]['chapter_id'])
                    var row = $(".table-stats button[id='" + data[0]['lesson_id'] + "']")
                        .parents("tr")[0];
                    console.log(row)
                    $(row).after(addRow(data[0]['lesson_id'], data[0]['lesson_id_chapter'],
                        data[0]['lesson_name']));
                    $(row).remove();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('loi');
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);
                }

            });
        });

        function addRow(lesson_id, lesson_id_chapter, lesson_name) {
            var ret = "<tr>" +
                "<td>" + lesson_id + "</td>" +
                "<td>" + lesson_id_chapter + "</td>" +
                "<td>" + lesson_name + "</td>" +
                "<td>" +
                "<button type='button' class='edit btn btn-primary btn-sm' id='" + lesson_id +
                "' data-toggle='modal' data-target='#mediumApprove'>" +
                "Sửa" +
                "</button>" +
                "<button type='button' class='delete btn btn-danger btn-sm' id='" + lesson_id +
                "' data-toggle='modal' data-target='#upApproved'>" +
                "Xóa" +
                "</button>" +
                "</td>" +
                "</tr>"
            return ret;
        }

    })

</script>
