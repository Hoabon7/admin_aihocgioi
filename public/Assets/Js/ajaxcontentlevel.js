// $.noConflict();
jQuery(document).ready(function($){
    $('.edit').click(function(){
        var id_content=$(this).attr('id');
        //alert(id_content);    
        $.ajax({
            "url": '/editlevelchaptercontent/' + id_content,
            "type": "GET",
            "dataType": "JSON",
            success:function(data){
                 $('#id_level').val(data[0]['id_level']);//lấy dữ liệu từ csdl đổ vào trong phần input của
                 $('#id_book').val(data[0]['id_book']);
                 $('#name_level').val(data[0]['name_level']);
                 $('#id_chapter').val(data[0]['id_chapter']);
                 $('#type_name').val(data[0]['type_name']);
                 $('#name_chapter').val(data[0]['name_chapter']);
                 $('#id_lesson').val(data[0]['id_lesson']);
                 $('#name_lesson').val(data[0]['name_lesson']);
                 $('#id_content').val(data[0]['id']);
                 $('#title_content').val(data[0]['title']);
                 //$('#content_book').val(data[0]['content']);
                //console.log(data);
            }
        });
    });
    $('.show').click(function(){
        var id_content=$(this).attr('id');
       // alert(id_content);    
        $.ajax({
            "url": '/getcontent/' + id_content,
            "type": "GET",
            "dataType": "JSON",
            success:function(data){
                //console.log(data[0]['id']);
                
                 $('#content_book').val(data[0]['content']);
                 $('#id_content_detail').val(data[0]['id']);
            }
        });
    });
    $('#form_edit_book').on('submit', function(event) {
        // alert('hoa');
        event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
        var url_edit = "/updatelevelchapterlessonandcontent";
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
                //console.log(data[0]['id_content'])
                 var row = $(".table-stats button[id='" + data[0]['id_content'] + "']").parents("tr")[0];
                 console.log(row)
                $(row).after(addRow(data[0]['id_level'], data[0]['id_book'],
                    data[0]['id_chapter'],data[0]['type_name'],data[0]['name_chapter'],data[0]['id_lesson'],
                    data[0]['name_lesson'],data[0]['id_content'],data[0]['title_content']));
                 $(row).remove();
            },  
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            }

        });
    });
    $('#form_edit_content').on('submit', function(event) {
        event.preventDefault(); //xóa bỏ các kiểu gửi mặc định
        var url_edit = "/updatecontentineachlevel";
        $.ajax({
            url: url_edit,
            //headers: {'X-CSRF-TOKEN': token},
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                //console.log(data);
               
                 $('.modal-footer>button').click();
                 $('.close').attr("enabled", true);
                
                
            },  
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            }

        });
    });

    function addRow(id_level, id_book, id_chapter,type_name,name_chapter,id_lesson,name_lesson,id_content,title) {
        var ret = "<tr>" +
            "<td>" + id_level + "</td>" +
            "<td>" + id_book + "</td>" +
            "<td>" + id_chapter + "</td>" +
            "<td>" + type_name + "</td>" +
            "<td>" + name_chapter + "</td>" +
            "<td>" + id_lesson + "</td>" +
            "<td>" + name_lesson + "</td>" +
            "<td>" + id_content + "</td>" +
            "<td>" + title + "</td>" +
            "<td>" +
            "<button type='button' class='edit btn btn-primary btn-sm' id='" + id_content +
            "' data-toggle='modal' data-target='#mediumApprove'>" +
            "Sửa" +
            "</button>" +
            "<button type='button' class='delete btn btn-danger btn-sm' id='" + id_content +
            "' data-toggle='modal' data-target='#upApproved'>" +
            "Xóa" +
            "</button>" +
            "<button type='button' class='show btn btn-info btn-sm' id='" + id_content +
            "' data-toggle='modal' data-target='#showContent'>" +
            "Nội dung" +
            "</button>" +
            "</td>" +
            "</tr>"
        return ret;
    }
})



