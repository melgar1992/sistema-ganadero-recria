$(document).ready(function () {
    var base_url = $("#base_url").val();

    $('#sueldo').on('change', function () {
        sueldo = $(this).val();

        if (sueldo != '') {

            afp_empleado = sueldo * 0.1271;
            $('#afp_empleado').val(afp_empleado.toFixed(2));

            afp_empleador = sueldo * 0.0671;
            $('#afp_empleador').val(afp_empleador.toFixed(2));

            caja_nacional = sueldo * 0.1;
            $('#caja_nacional').val(caja_nacional.toFixed(2));

            sueldo_liquido = sueldo - afp_empleado;
            $('#sueldo_liquido').val(sueldo_liquido.toFixed(2));

            sueldo_total = Number(sueldo) + Number(afp_empleador) + Number(caja_nacional);
            $('#sueldo_total').val(sueldo_total.toFixed(2));


        }
        else {
            $('#afp_empleado').val(null);
            $('#afp_empleador').val(null);
            $('#caja_nacional').val(null);
            $('#sueldo_liquido').val(null);
            $('#sueldo_total').val(null);

        }
    })

})

