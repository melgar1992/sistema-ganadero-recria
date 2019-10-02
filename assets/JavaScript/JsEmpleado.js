$(document).ready(function () {
    var base_url = $("#base_url").val();

    $(document).on('click', '.btn-borrar', function () {
   
        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el transportista tambien se eliminaran todos los datos relacionados con el transportista!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo elimniar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {

                var id = $(this).val();

                $.ajax({
                    url: base_url + 'Formulario_Empleados/Empleado/borrar/' + id,
                    type: 'POST',
                    success: function (resp) {

                       window.location.href = base_url + resp;
                    }
                })


            }
        })

    })

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

