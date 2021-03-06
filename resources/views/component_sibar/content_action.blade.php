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
                                <h5 class="modal-title" id="mediumModalLabel">Sửa Thông Tin Nội Dung</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form_edit_content" name="form_edit_content" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"><label for="">Mã Nội Dung:</label><input
                                                class="form-control" type="text" name="content_id" id="content_id" size="2">
                                        </div>
                                        <div class="col-12 col-md-9"><label for="">Mã Bài:</label><input
                                                class="form-control" type="text" name="content_id_lesson"
                                                id="content_id_lesson"></div>
                                        <div class="col-12 col-md-9"><label for="">Tiêu Đề:</label><input
                                                class="form-control" type="text" name="content_title" id="content_title">
                                        </div>
                                        <div class="col-12 col-md-9"><label for="">Nội Dung:</label><textarea
                                                class="form-control" type="text" name="content_content"
                                                id="content_content"></textarea></div>
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
                                <p>bạn có muốn xóa k?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-primary">Thực hiện</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh Sách Các Nội</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">Mã Nội Dung</th>
                                            <th>Mã Bài</th>
                                            <th>Tiêu Đề</th>
                                            <th>Nội Dung</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_content as $value)
                                            <tr>
                                                <td class="serial">{{ $value->id }}</td>
                                                <td>{{ $value->id_lesson }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->content }}</td>
                                                <td>
                                                    <button class="edit btn btn-primary btn-sm " data-toggle="modal"
                                                        id="{{ $value->id }}" data-target="#mediumApprove">Sửa</button>
                                                    <button class="delete btn btn-danger btn-sm" data-toggle="modal"
                                                        id="{{ $value->id }}" data-target="#upApproved">Xóa<a
                                                            href=""></a></button>
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
                                            {{ $data_content->currentPage() }} trong tổng số
                                            {{ $data_content->lastPage() }}</strong></div>
                                    <div class="col-12 col-md-4">
                                        <?php $lastPage = $data_content->currentPage() + 3; ?>
                                        @if ($lastPage > $data_content->lastPage())
                                            @if ($data_content->currentPage() - 2 < 0)
                                                @for ($i = $data_content->currentPage(); $i <= $data_content->lastPage(); $i++)
                                                    @if ($i == $data_content->currentPage())
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @else
                                                <a href="{{$url_root}}/content_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_content->currentPage() - 1; $i <= $data_content->lastPage(); $i++)
                                                    @if ($i == $data_content->currentPage())
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @endif
                                        @else
                                            @if ($data_content->currentPage() == 1)
                                                @for ($i = $data_content->currentPage(); $i < $lastPage; $i++)
                                                    @if ($i == $data_content->currentPage())
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                                <a
                                                    href="{{$url_root}}/content_action.html?page={{ $data_content->lastPage() }}"><span
                                                        class="btn btn-info btn-sm">>></span></a>
                                            @else
                                                <a href="{{$url_root}}/content_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_content->currentPage() - 1; $i < $lastPage; $i++)
                                                    @if ($i == $data_content->currentPage())
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/content_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif

                                                @endfor
                                                <a
                                                    href="{{$url_root}}/content_action.html?page={{ $data_content->lastPage() }}"><span
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
            var id_content = $(this).attr('id');
            $.ajax({
                "url": '{!!  url('editcontent/') !!}/' + id_content,
                "type": "GET",
                "dataType": "JSON",
                success: function(data) {
                    $('#content_id').val(data[0][
                        'id'
                    ]); //lấy dữ liệu từ csdl đổ vào trong phần input của
                    $('#content_id_lesson').val(data[0]['id_lesson']);
                    $('#content_title').val(data[0]['title']);
                    $('#content_content').val(data[0]['content']);

                    //console.log(data);
                }
            });
        });
        $('#form_edit_content').on('submit', function(event) {
            //alert('hoa');
            event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
            var url_edit = "{{ route('updatecontent') }}";
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
                    var row = $(".table-stats button[id='" + data[0]['content_id'] + "']")
                        .parents("tr")[0];
                    console.log(row)
                    $(row).after(addRow(data[0]['content_id'], data[0]['content_id_lesson'],
                        data[0]['content_title'], data[0]['content_content']));
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

        function addRow(content_id, content_id_lesson, content_title, content_content) {
            var ret = "<tr>" +
                "<td>" + content_id + "</td>" +
                "<td>" + content_id_lesson + "</td>" +
                "<td>" + content_title + "</td>" +
                "<td>" + content_content + "</td>" +
                "<td>" +
                "<button type='button' class='edit btn btn-primary btn-sm' id='" + content_id +
                "' data-toggle='modal' data-target='#mediumApprove'>" +
                "Sửa" +
                "</button>" +
                "<button type='button' class='delete btn btn-danger btn-sm' id='" + content_id +
                "' data-toggle='modal' data-target='#upApproved'>" +
                "Xóa" +
                "</button>" +
                "</td>" +
                "</tr>"
            return ret;
        }

    })

</script>
