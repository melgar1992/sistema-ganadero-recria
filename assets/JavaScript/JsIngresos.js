$(document).ready(function() {
    var base_url = $("#base_url").val();

    $(document).on("click", ".btn-check", function() {


        empleado = $(this).val();
        infoempleado = empleado.split("*");
        $("#id_empleado").val(infoempleado[0]);
        $("#empleado").val(infoempleado[1]);
        $("#modal-default").modal("hide");
    });

    $(function() {
        $('#cantidad').change(function() {
            cantidad = $(this).val();

            $('#precio_unitario').change(function() {
                precio_unitario = $(this).val();

                Total = cantidad * precio_unitario;
                $('#total').val(Total);
            });
        });
    });


})