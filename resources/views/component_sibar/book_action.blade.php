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
                                                type="text" name="book_id" id="book_id" size="2"></div>
                                        <div class="col-12 col-md-9"><label for="">Loại Sách: 1 là sách giáo khoa,0 là sách bài tập</label><input
                                                class="form-control" type="text" name="book_type" id="book_type"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Loại Sách:</label><input
                                                class="form-control" type="text" name="book_name_type" id="book_name_type"></div>
                                        <div class="col-12 col-md-9"><label for="">Tên Sách:</label><input
                                                class="form-control" type="text" name="book_name" id="book_name"></div>
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
                                            <th class="serial">Mã Sách</th>
                                            <th>Loại Sách</th>
                                            <th>Tên Loại Sách</th>
                                            <th>Tên Sách</th>
                                            <th>Tên Level</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_book as $value)
                                            <tr>
                                                <td class="serial">{{ $value->id }}</td>
                                                <td>{{ $value->type_book }}</td>
                                                <td>{{ $value->type_name }}</td>
                                                <td>{{ $value->name_book }}</td>
                                                <td>{{ $value->id_level }}</td>
                                                <td>
                                                    <button class="edit btn btn-primary btn-sm" data-toggle="modal" id="{{$value->id}}"
                                                        data-target="#mediumApprove">Sửa</button>
                                                    <button class="delete btn btn-danger btn-sm" data-toggle="modal"  id="{{$value->id}}"
                                                        data-target="#upApproved">Xóa</button>
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
                                            {{ $data_book->currentPage() }} trong tổng số
                                            {{ $data_book->lastPage() }}</strong></div>
                                    <div class="col-12 col-md-4">

                                        <?php $lastPage = $data_book->currentPage() + 3; ?>
                                        @if ($lastPage > $data_book->lastPage())
                                            @if ($data_book->currentPage() - 2 < 0)
                                                @for ($i = $data_book->currentPage(); $i <= $data_book->lastPage(); $i++)
                                                    @if ($i == $data_book->currentPage())
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @else
                                                <a href="{{$url_root}}/book_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<</span></a>
                                                @for ($i = $data_book->currentPage() - 1; $i <= $data_book->lastPage(); $i++)
                                                    @if ($i == $data_book->currentPage())
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                            @endif
                                        @else
                                            @if ($data_book->currentPage() == 1)
                                                @for ($i = $data_book->currentPage(); $i < $lastPage; $i++)
                                                    @if ($i == $data_book->currentPage())
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif
                                                @endfor
                                                <a
                                                    href="{{$url_root}}/book_action.html?page={{ $data_book->lastPage() }}"><span
                                                        class="btn btn-info btn-sm">>></span></a>
                                            @else
                                                <a href="{{$url_root}}/book_action.html?page=1"><span
                                                        class="btn btn-info btn-sm">
                                                        <<</span></a>
                                                @for ($i = $data_book->currentPage() - 1; $i < $lastPage; $i++)
                                                    @if ($i == $data_book->currentPage())
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-primary btn-sm">{{ $i }}</span></a>
                                                    @else
                                                        <a href="{{$url_root}}/book_action.html?page={{ $i }}"><span
                                                                class="btn btn-info btn-sm">{{ $i }}</span></a>
                                                    @endif

                                                @endfor
                                                <a
                                                    href="{{$url_root}}/book_action.html?page={{ $data_book->lastPage() }}"><span
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
        $(document).on('click','.edit',function(){
            var id_book=$(this).attr('id');
			$.ajax({
				"url": '{!! url("editbook/") !!}/' + id_book,
                "type": "GET",
                "dataType": "JSON",
				success:function(data){
					 $('#book_id').val(data[0]['id']);//lấy dữ liệu từ csdl đổ vào trong phần input của
					 $('#book_type').val(data[0]['type_book']);
                     $('#book_name_type').val(data[0]['type_name']);
                     $('#book_name').val(data[0]['name_book']);
                     $('#book_id_level').val(data[0]['id_level']);
                    //console.log(data);
				}
			});
        });
        $('#form_edit_book').on('submit',function(event){
            //alert('hoa');
            event.preventDefault();//xóa bỏ các kiểu gửi mặc định
            var url_edit= "{{ route('updatebook') }}";
            //console.log($(this).serialize());
			$.ajax({
               url: url_edit,
               //headers: {'X-CSRF-TOKEN': token},
			   method:"POST",
			   data:$(this).serialize(),
               dataType:"json",
           
			   success:function(data)
			   {
                   //console.log(data);
                   console.log(data);
                    $('.modal-footer>button').click();     
                    $('.close').attr("enabled", true);

                    //console.log(data[0]['level_id'])
                    var row =$(".table-stats button[id='"+ data[0]['book_id'] + "']").parents("tr")[0];
                    console.log(row)
                    $(row).after(addRow(data[0]['book_id'],data[0]['book_type'],data[0]['book_name_type'],data[0]['book_name'],data[0]['book_id_level']));
                    $(row).remove();

                },
                error: function (jqXHR, textStatus, errorThrown) { 
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(jqXHR);
                }
                
			  });   
        });
        function addRow(book_id,book_type,book_name_type,book_name,book_id_level) {
            var ret = "<tr>" +
                "<td>" +  book_id + "</td>" +
                "<td>" + book_type + "</td>" +
                "<td>" + book_name_type + "</td>" +
                "<td>" + book_name + "</td>" +
                "<td>" + book_id_level + "</td>" +
                "<td>"+
                "<button type='button' class='edit btn btn-primary btn-sm' id='"+book_id+"' data-toggle='modal' data-target='#mediumApprove'>"+
                "Sửa"+
                "</button>"+
                "<button type='button' class='delete btn btn-danger btn-sm' id='"+book_id+"' data-toggle='modal' data-target='#upApproved'>"+
                "Xóa"+
                "</button>"+
                "</td>"+
                "</tr>"
            return ret;
        }
        
    })
</script>


