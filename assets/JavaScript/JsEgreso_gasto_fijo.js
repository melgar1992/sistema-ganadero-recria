$(document).ready(function() {
    var base_url = $("#base_url").val();

    $(document).on("click", ".btn-check", function() {

        empleado = $(this).val();
        infoempleado = empleado.split("*");
        $("#id_empleado").val(infoempleado[0]);
        $("#empleado").val(infoempleado[1]);
        $("#modal-default").modal("hide");
    });
    $(document).on('click', '.btn-borrar', function() {

        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el pago egreso gasto fijo no se podra recuperar!",
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
                    url: base_url + 'Formulario_Egresos/Egreso_gasto_fijo/borrar/' + id,
                    type: 'POST',
                    success: function(resp) {
                        window.location.href = base_url + resp;
                    }
                })


            }
        })
    })
})