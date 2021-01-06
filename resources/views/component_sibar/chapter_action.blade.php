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
                                <h5 class="modal-title" id="mediumModalLabel">Sửa Thông Tin Chương</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form_edit_chapter" name="form_edit_chapter" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"></label><input type="hidden" class="form-control"
                                                type="text" name="chapter_id" id="chapter_id" size="2"></div>
                                        <div class="col-12 col-md-9"><label for="">Mã Sách:</label><input
                                                class="form-control" type="text" name="chapter_id_book"
                                                id="chapter_id_book"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Chương:</label><input
                                                class="form-control" type="text" name="chapter_name" id="chapter_name">
                                        </div>
                                        <div class="col-12 col-md-9"><input class="btn btn-primary" id="chapter_edit_submit"
                                                class="form-control" type="submit" value="update"></div>
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
                                <p>bạn có muốn xóa không</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh Sách Các Chương</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">Mã Chương</th>
                                            <th>Mã Sách</th>
                                            <th>Tên Chương</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_chapter as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->id_book }}</td>
                                                <td>{{ $value->name_chapter }}</td>
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
                            <!--paginate-->
                            <div class="card-header">
                                <div class="row form-group">
                                    <div class="col-12 col-md-8"><strong class="card-title">Đang xem
                                            {{ $data_chapter->currentPage() }} trong tổng số
                                            {{ $data_chapter->lastPage() }}</strong></div>
                                    <div class="col-12 col-md-4">
                                        <?php $lastPage = $data_chapter->currentPage() + 3; ?>
                                        @if ($lastPage > $data_chapter->lastPage())
                                            @if ($data_chapter->currentPage() - 2 < 0)
                                                @for ($i = $data_chapter->currentPage(); $i <= $data_chapter->lastPage(); $i++)
                                                    @if ($i == $data_chapter->currentPage())
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @else
                                                <a href="http://127.0.0.1:8000/chapter_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_chapter->currentPage() - 1; $i <= $data_chapter->lastPage(); $i++)
                                                    @if ($i == $data_chapter->currentPage())
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @endif
                                        @else
                                            @if ($data_chapter->currentPage() == 1)
                                                @for ($i = $data_chapter->currentPage(); $i < $lastPage; $i++)
                                                    @if ($i == $data_chapter->currentPage())
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                                <a
                                                    href="http://127.0.0.1:8000/chapter_action.html?page={{ $data_chapter->lastPage() }}"><span
                                                        class="btn btn-info btn-sm">>></span></a>
                                            @else
                                                <a href="http://127.0.0.1:8000/chapter_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<< /span></a>
                                                @for ($i = $data_chapter->currentPage() - 1; $i < $lastPage; $i++)
                                                    @if ($i == $data_chapter->currentPage())
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="http://127.0.0.1:8000/chapter_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif

                                                @endfor
                                                <a
                                                    href="http://127.0.0.1:8000/chapter_action.html?page={{ $data_chapter->lastPage() }}"><span
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
            var id_chapter = $(this).attr('id');
            $.ajax({
                "url": '{!!  url('editchapter/') !!}/' + id_chapter,
                "type": "GET",
                "dataType": "JSON",
                success: function(data) {
                    $('#chapter_id').val(data[0][
                        'id'
                    ]); //lấy dữ liệu từ csdl đổ vào trong phần input của
                    $('#chapter_id_book').val(data[0]['id_book']);
                    $('#chapter_name').val(data[0]['name_chapter']);
                    //console.log(data);
                }
            });
        });
        //$(document).on('click')
        $('#form_edit_chapter').on('submit', function(event) {
            //alert('hoa');
            event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
            var url_edit = "{{ route('updatechapter') }}";
            //console.log($(this).serialize());
            $.ajax({
                url: url_edit,
                //headers: {'X-CSRF-TOKEN': token},
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    //console.log(data);
                    //console.log(data);
                    $('.modal-footer>button').click();
                    $('.close').attr("enabled", true);
                    //console.log(data[0]['chapter_id'])
                    var row = $(".table-stats button[id='" + data[0]['chapter_id'] + "']")
                        .parents("tr")[0];
                    console.log(row)
                    $(row).after(addRow(data[0]['chapter_id'], data[0]['chapter_id_book'],
                        data[0]['chapter_name']));
                    $(row).remove();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);
                }

            });
        });

        function addRow(chapter_id, chapter_id_book, chapter_name) {
            var ret = "<tr>" +
                "<td>" + chapter_id + "</td>" +
                "<td>" + chapter_id_book + "</td>" +
                "<td>" + chapter_name + "</td>" +
                "<td>" +
                "<button type='button' class='edit btn btn-primary btn-sm' id='" + chapter_id +
                "' data-toggle='modal' data-target='#mediumApprove'>" +
                "Sửa" +
                "</button>" +
                "<button type='button' class='delete btn btn-danger btn-sm' id='" + chapter_id +
                "' data-toggle='modal' data-target='#upApproved'>" +
                "Xóa" +
                "</button>" +
                "</td>" +
                "</tr>"
            return ret;
        }

    })

</script>
