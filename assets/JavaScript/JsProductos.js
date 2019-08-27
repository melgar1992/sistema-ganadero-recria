$(document).ready(function() {
    var base_url = $("#base_url").val();
    $(".btn-vista").on("click", function() {

        const id = $(this).val();
        console.log(id);
        $.ajax({
            url: base_url + "Mantenimiento/Productos/vista/" + id,
            type: "POST",
            success: function(resp) {

                $("#modal-default").modal("show");

                $(".modal-body").append(resp);
                $('#modal-default').on('hidden.bs.modal', function(resp) {
                    $(this).removeData('bs.modal');
                    $(this).find('.modal-body').empty();
                })



                //alert(resp);
            }

        });


    });



})