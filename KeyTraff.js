jQuery(document).ready(function ($) {
    $('.btn').on('click', function (e) {
        $.ajax({
            method: "GET",
            url: e.target.href,
        }).done(function (data) {
            $('#table-block').html(data);
        });
        return false;
    });
});