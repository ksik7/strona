$(document).ready(function () {
    $("#link").click(function () {
        $.ajax({

            url: "http://zend.localhost/test/product/index/page/1",
            type: "POST",
            data: "format=json",
            async: false,
            success: function(response) {

            }
        });
    });
});