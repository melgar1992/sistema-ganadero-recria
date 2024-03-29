$(document).ready(function () {
    var base_url = $("#base_url").val();
    var tabla_stock = $('#example1').DataTable();
    tabla_stock.order([2,'asc']).draw();
    $(document).on("click", ".btn-check-estancia", function () {

        estancia = $(this).val();
        infoestancia = estancia.split("*");
        $("#id_estancia").val(infoestancia[0]);
        $("#estancia").val(infoestancia[1]);
        $("#modal-estancia").modal("hide");
    });
    $(document).on('click', '.btn-borrar', function () {

        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el inventario no se podra recuperar,tambien se perderan todos los datos relacionados con el!",
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
                    url: base_url + 'Formulario_Animales/Inventario_animales/borrar/' + id,
                    type: 'POST',
                    success: function (resp) {
                        window.location.href = base_url + resp;
                    }
                })


            }
        })
    })
    $(document).on('click', '#cambio_categoria', function () {

        Swal.fire({
            title: 'Esta seguro de realizar el cambio de categorias??',
            text: "Una vez se cambian las categorias no se puede revertir!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo cambio categoria!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                
                $.ajax({
                    url: base_url + 'Formulario_Animales/Inventario_animales/cambioCategoria',
                    type: 'POST',
                    success: function (resp) {
                        window.location.href = base_url + resp;
                    }
                })


            }
        })
    })
    $('.categ').on('change', function () {
        var categoria = $(this).val();
        $('.raz').empty();
        $('.raz').prop('disabled', false);
        $.ajax({
            type: "POST",
            url: base_url + "Formulario_Animales/Compra_animales/buscarRazas/",
            data: { cat: categoria },
            success: function (respuesta) {
                respuesta2 = JSON.parse(respuesta);
                jQuery.each(respuesta2, function (i, valoractual) {
                    $('.raz').prepend("<option value='" + valoractual.id_tipo_animal + "' >" + valoractual.raza + "</option>");
                });
            }
        });
    });
    class CampoNumerico {

        constructor(selector) {
            this.nodo = document.querySelector(selector);
            this.valor = '';

            this.empezarAEscucharEventos();
        }

        empezarAEscucharEventos() {
            this.nodo.addEventListener('keydown', function (evento) {
                const teclaPresionada = evento.key;
                const teclaPresionadaEsUnNumero =
                    Number.isInteger(parseInt(teclaPresionada));

                const sePresionoUnaTeclaNoAdmitida =
                    teclaPresionada != 'ArrowDown' &&
                    teclaPresionada != 'ArrowUp' &&
                    teclaPresionada != 'ArrowLeft' &&
                    teclaPresionada != 'ArrowRight' &&
                    teclaPresionada != 'Backspace' &&
                    teclaPresionada != 'Delete' &&
                    teclaPresionada != 'Enter' &&
                    !teclaPresionadaEsUnNumero;
                const comienzaPorCero =
                    this.nodo.value.length === 0 &&
                    teclaPresionada == 0;

                if (sePresionoUnaTeclaNoAdmitida || comienzaPorCero) {
                    evento.preventDefault();
                } else if (teclaPresionadaEsUnNumero) {
                    this.valor += String(teclaPresionada);
                }

            }.bind(this));

            this.nodo.addEventListener('input', function (evento) {
                const cumpleFormatoEsperado = new RegExp(/^[0-9]+/).test(this.nodo.value);

                if (!cumpleFormatoEsperado) {
                    this.nodo.value = this.valor;
                } else {
                    this.valor = this.nodo.value;
                }
            }.bind(this));
        }

    }
    new CampoNumerico('#cantidad');
   

});

$('#tabla_empleados').DataTable();
$('#tabla_estancias').DataTable();
