$(document).ready(function() {
    var base_url = $("#base_url").val();
    $(".btn-borrar").on("click", function(e) {
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type: "POST",
            success: function(resp) {

                window.location.href = base_url + resp;

            }


        });

    });






})