jQuery(document).ready(function($) {
        $(document).on('click', '.edit', function() {
            var id_level = $(this).attr('id');
            $.ajax({
                "url": '/editlevel/' + id_level,
                "type": "GET",
                "dataType": "JSON",
                success: function(data) {
                    $('#level_id_ref').val(data[0]['id_ref']); //lấy dữ liệu từ csdl đổ vào trong phần input của
                    $('#level_id').val(data[0]['id']);
                    $('#level_name').val(data[0]['name_level']);
                }
            });
        });
        $('#form_edit_level').on('submit', function(event) {
            //alert('hoa');
            event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
            var url_edit = "/updatelevel";
            //console.log($(this).serialize());
            $.ajax({
                url: url_edit,
                //headers: {'X-CSRF-TOKEN': token},
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",

                success: function(data) {
                    
                   // console.log(data);
                    $('.modal-footer>button').click();
                    $('.close').attr("enabled", true);

                    //console.log(data[0]['level_id'])
                    var row = $(".table-stats button[id='" + data[0]['level_id'] + "']")
                        .parents("tr")[0];
                    //console.log(row)
                    $(row).after(addRow(data[0]['level_id_ref'], data[0]['level_id'], data[
                        0]['level_name']));
                    $(row).remove();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // console.log(textStatus);
                    // console.log(errorThrown);
                    // console.log(jqXHR);
                    alert('loi');
                }

            });
        });
        $(".deletelevel").click(function(){
            return confirm("Bạn có muốn xóa không?");
        })
        $('#form_add_level').on('submit', function(event) {
            event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
            var url_add = "/addlevel";
            $.ajax({
                url: url_add,
                //headers: {'X-CSRF-TOKEN': token},
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    //console.log(data);
                    $('.modal-footer>button').click();
                    $('.close').attr("enabled", true);
                    $("#add_level_id_ref").val('');
                    $("#add_level_name").val('');
                    $("#add_level_id").val('');

                },
                error: function(jqXHR, textStatus, errorThrown) {

                    // console.log(textStatus);
                    // console.log(errorThrown);
                    // console.log(jqXHR);
                    alert('loi');
                }
            });
        });

        function addRow(level_id_ref, level_id, level_name) {
            var ret = "<tr>" +
                "<td>" + level_id_ref + "</td>" +
                "<td>" + level_id + "</td>" +
                "<td>" + level_name + "</td>" +
                "<td>" +
                "<button type='button' class='edit btn btn-primary btn-sm' id='" + level_id +
                "' data-toggle='modal' data-target='#mediumApprove'>" +
                "Sửa" +
                "</button>" +
                "<button type='button' class='delete btn btn-danger btn-sm' id='" + level_id +
                "' data-toggle='modal' data-target='#upApproved'>" +
                "Xóa" +
                "</button>" +
                "</td>" +
                "</tr>"
            return ret;
        }


    });

