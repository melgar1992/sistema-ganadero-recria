$(document).ready(function () {
    
    var base_url = $('#base_url').val();
    $(document).on("click", ".btn-check", function () {

        empleado = $(this).val();
        infoempleado = empleado.split("*");
        $("#id_empleado").val(infoempleado[0]);
        $("#empleado").val(infoempleado[1]);
        $("#id_contrato_empleado").val(infoempleado[6]);
        $("#modal-default").modal("hide");
    });

});