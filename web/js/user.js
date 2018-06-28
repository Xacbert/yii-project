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
                $("#ModalYii").modal("show");
            }
        }
    });

});
