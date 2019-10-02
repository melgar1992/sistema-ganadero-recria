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
                    url: base_url + 'Formularios_Generales/Transportista/borrar/' + id,
                    type: 'POST',
                    success: function (resp) {

                       window.location.href = base_url + resp;
                    }
                })


            }
        })

    })

})