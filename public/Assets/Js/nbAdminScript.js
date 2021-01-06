$(document).ready(function () {
    $('.nbTable.tableMenu .tr').on('click', function (e) {
        console.log(e.target.className);
        if (e.target.className === "col-1 colTab stt") {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(this).addClass('open');
            }
        }
        if (e.target.className === "actionLink linkEdit") {
            e.preventDefault();
            $('.menuHeadAction').addClass('openForm');
        }
    });

    $('#addNewMenu').on('click', function (e) {
        e.preventDefault();
        $(this).parents('.menuHeadAction').addClass('openForm');
    });
    $('#closeFormAddEdit').on('click', function (e) {
        e.preventDefault();
        $('.menuHeadAction').removeClass('openForm');
    });
});