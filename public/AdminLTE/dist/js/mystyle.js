$(document).on('click', '.li-dropdown', function () {
    var check = $(this).find('.content-dropdown').hasClass('active');
    if (check) {
        $(this).find('.content-dropdown').removeClass('active');
    }
    else
    {
        $(this).find('.content-dropdown').addClass('active');
    }
});

$(function () {
    var url = this.location.href;
    var arr_url = url.split(".");
    var last_url = arr_url[arr_url.length-1];
    var arr_last_url = last_url.split('/');
    var check_url = arr_last_url[2];
    $('.nav-link').each(function (index) {
        var url_href = $(this).attr('href');
        var arr_url_href = url_href.split("/");
        // var check_url_href = arr_url_href[arr_url_href.length-1];
        for (let i = 0; i < arr_url_href.length; i++) {
            if (check_url == arr_url_href[i]) {
                $(this).addClass('active');
                $(this).parent().parent().parent().addClass('menu-open');
                $(this).parent().parent().parent().find('.content-dropdown').addClass('active');
            }
        }
    });
});