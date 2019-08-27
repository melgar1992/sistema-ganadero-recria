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
    $(".btn-vista-cliente").on("click", function() {

        const id = $(this).val();
        console.log(id);
        $.ajax({
            url: base_url + "Mantenimiento/Clientes/vista/" + id,
            type: "POST",
            success: function(resp) {


                $("#modal-default").modal("show");

                $(".modal-body").append(resp);
                $('#modal-default').on('hidden.bs.modal', function(resp) {
                    $(this).removeData('bs.modal');
                    $(this).find('.modal-body').empty();

                })
            }


        });

    });

});