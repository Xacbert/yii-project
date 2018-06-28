$(document).on("submit", '#UserCreateFrm', function(event) {
    event.preventDefault();

    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {

            if (data.success){
                alert("OK");
            }else{
                alert("KO");
            }
        }
    });

});

$(document).on("submit", '#UserLoginFrm', function(event) {
    event.preventDefault();

    var UrlView = $(this).attr("data-url-view");

    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {

            if (data.success){
                window.open(UrlView,"_self");
            }else{
                $("#ModalYii").modal("show");
            }
        }
    });

});
