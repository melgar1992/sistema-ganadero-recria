$(document).ready(function () {
    var base_url = $("#base_url").val();
    var tabla_stock = $('#tabla_stock_estancias').DataTable();
    sumar();

    $(document).on("click", ".btn-check-empleado", function () {

        empleado = $(this).val();
        infoempleado = empleado.split("*");
        $("#id_empleado").val(infoempleado[0]);
        $("#empleado").val(infoempleado[1] + ' ' + infoempleado[2]);
        $("#modal-default").modal("hide");
    });
    $(document).on("click", ".btn-check-ganadero", function () {

        ganadero = $(this).val();
        infoganadero = ganadero.split("*");
        $("#id_ganadero").val(infoganadero[0]);
        $("#ganadero").val(infoganadero[1] + ' ' + infoganadero[2]);
        $("#modal-ganaderos").modal("hide");
    });
    $(document).on("click", ".btn-check-transportista", function () {

        transportista = $(this).val();
        infoTransportista = transportista.split("*");
        $("#id_transportista").val(infoTransportista[0]);
        $("#transportista").val(infoTransportista[1] + ' ' + infoTransportista[2]);
        $("#modal-transportista").modal("hide");
    });
    $(document).on("click", ".btn-check-intermediario", function () {

        intermediario = $(this).val();
        infointermediario = intermediario.split("*");
        $("#id_intermediario").val(infointermediario[0]);
        $("#intermediario").val(infointermediario[1] + ' ' + infointermediario[2]);
        $("#modal-intermediario").modal("hide");
    });
    $(document).on('change', '#tbAnimales input.cantidad', function () {

        //busca la fila de la datatable
        // id_animal = $(this).closest('tr').find('td:eq(4)').children('input').val();
        // fila = tabla_stock.rows().eq(0).filter(function (rowIdx) {
        //     return tabla_stock.cell(rowIdx, 0).data() === id_animal ? true : false;
        // });;

        // Hace los calculos de la pagina
        cantidad = $(this).val();
        precio_unitario = $(this).closest('tr').find('td:eq(6)').children('input').val();
        if (precio_unitario != '') {
            sub_total = cantidad * precio_unitario;
            $(this).closest('tr').find('td:eq(9)').children('input').val(sub_total.toFixed(2));
            sumar();
        }

        //Se actauliza el stock en la datatable.
        // stock = $(this).closest('tr').find('td:eq(4)').text();
        // console.log(stock);
        // stockActual = Number(stock) - Number(cantidad);
        // // Funcion para buscar el index de la fila a editar.
        // tabla_stock.cell(fila, 5).data(stockActual).draw(); // esta funcion funciona para editar la celda, solo falta encontrar la fila.  
        // $(this).closest('tr').find('td:eq(4)').children('p').text(stockActual);

    });
    $(document).on('change', '#tbAnimales input.precio_unitario', function () {

        precio_unitario = $(this).val();
        cantidad = $(this).closest('tr').find('td:eq(5)').children('input').val();
        if (cantidad != '') {
            sub_total = cantidad * precio_unitario;
            $(this).closest('tr').find('td:eq(9)').children('input').val(sub_total.toFixed(2));
            sumar();
        }

    });
    $(document).on('change', '#tbAnimales input.precio_transporte', function () {
        sumar();
    });
    $(document).on('change','#comision', function () {
        sumar();
    });
    $(document).on("click", ".btn-remove-compra", function () {


        //Se actauliza el stock en la datatable.
        id_animal = $(this).closest('tr').find('td:eq(4)').children('input').val();
        // Funcion para buscar el index de la fila a editar.
        fila = tabla_stock.rows().eq(0).filter(function (rowIdx) {
            return tabla_stock.cell(rowIdx, 0).data() === id_animal ? true : false;
        });;
        cantidad = $(this).closest('tr').find('td:eq(5)').children('input').val();
        stock = tabla_stock.cell(fila, 5).data(); // se obtiene el stock de la estancia.
        stockActual = Number(stock) + Number(cantidad);
        tabla_stock.cell(fila, 5).data(stockActual).draw(); // esta funcion funciona para editar la celda del datable.  
        $(this).closest("tr").remove();
        sumar();

    });
    $(document).on('click', '.btn-borrar', function () {

        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el venta no se podra recuperar!",
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
                    url: base_url + 'Formulario_Animales/Venta_animales/borrar/' + id,
                    type: 'POST',
                    success: function (resp) {
                        window.location.href = base_url + resp;
                    }
                })


            }
        })
    })
    $(document).on("click", '.btn-check-stock_estancia_bovinos', function () {
        data = $(this).val();
        info_estancia_stock = data.split('*');
        id_animal = info_estancia_stock[0];
        // Funcion para buscar el index de la fila a editar.
        fila = tabla_stock.rows().eq(0).filter(function (rowIdx) {
            return tabla_stock.cell(rowIdx, 0).data() === id_animal ? true : false;
        });;
        stock = tabla_stock.cell(fila, 5).data();
        if (stock > 0) {
            if (data != '') {
                $('#btn-agregar').val(data);
                $('#stock').val(stock);
                $('#modal-stock-estancias').modal('hide')
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Hlago salio mal',

                })
            }
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'El stock esta vacio',

            })
        }


    });
    $('#btn-agregar').on('click', function () {
        data = $(this).val();
        if (data != '') {
            cantidad = $('#canti').val();
            stock = $('#stock').val();
            if (Number(cantidad) <= Number(stock)) {
                //Se actauliza el stock en la datatable.
                nuevostock = Number(stock) - Number(cantidad);
                id_animal = info_estancia_stock[0];
                // Funcion para buscar el index de la filadatatable a editar.
                fila = tabla_stock.rows().eq(0).filter(function (rowIdx) {
                    return tabla_stock.cell(rowIdx, 0).data() === id_animal ? true : false;
                });;
                tabla_stock.cell(fila, 5).data(nuevostock).draw(); // esta funcion funciona para editar la celda, solo falta encontrar la fila.

                info_estancia_stock = data.split('*');
                html = "<tr>";
                html += "<td><input type='hidden' readonly class ='form-control' name= 'id_estancia[]' value ='" + info_estancia_stock[1] + "'><p>" + info_estancia_stock[3] + "</p></td>";
                html += "<td><input type='hidden' readonly class ='form-control' name= 'categoria[]' value ='" + info_estancia_stock[4] + "'><p>" + info_estancia_stock[4] + "</p></td>";
                html += "<td><input type='hidden' readonly class='raza form-control' name= 'raza[]' value ='" + info_estancia_stock[2] + "'><p>" + info_estancia_stock[5] + "</p></td>";
                html += "<td><input type='hidden' readonly class='sexo form-control' name= 'sexo[]' value ='" + info_estancia_stock[6] + "'><p>" + info_estancia_stock[6] + "</p></td>";
                html += "<td><input type='hidden' readonly class='stock form-control' name= 'id_animal[]' value ='" + info_estancia_stock[0] + "'><p>" + nuevostock + "</p></td>";
                html += "<td><input type = 'hidden' class='cantidad form-control' min = '0' max = '" + info_estancia_stock[7] + "' name = 'cantidad[]'  value ='" + $('#canti').val() + "'><p>" + $('#canti').val() + "</p></td>";
                html += "<td><input type = 'number' class='precio_unitario form-control' min = '0' name = 'precio_unitario[]'  value =''></td>";
                html += "<td><input type = 'number' class='precio_transporte form-control' min = '0' name = 'precio_transporte[]'  value =''></td>";
                html += "<td><input type='text'  class='placa_camion form-control' name= 'placa_camion[]' value =''></td>";
                html += "<td><input type ='number' readonly class = 'form-control' name = 'sub_total[]' value =''></td>";
                html += "<td><button type='button' class='btn btn-danger btn-remove-compra'><span class='fa fa-remove'></span></button></td>";
                html += "</tr>";

                $("#tbAnimales tbody").append(html);
                $('#canti').val(null);
                $('#stock').val(null);
                $('#btn-agregar').val(null);

                sumar();
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'La cantidad supera al stock',
                })
            }


        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Los campos no estan llenados correctamete',

            })
        }
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

    new CampoNumerico('#canti');
  
});
function sumar() {
    subtotalCompra = 0;
    subtotaltransporte = 0;

    $("#tbAnimales  tbody tr").each(function () {
        subtotalCompra = subtotalCompra + Number($(this).find("td:eq(9)").children('input').val());
        subtotaltransporte = subtotaltransporte + Number($(this).find("td:eq(7)").children('input').val());
    });
    total = 0;
    total = subtotalCompra - subtotaltransporte;
    porcentaje = $("#comision").val() / 100;
    comision = subtotalCompra * porcentaje;
    $("input[name=total]").val(total.toFixed(2));
    $("input[name=total_transporte]").val(subtotaltransporte.toFixed(2));
    $("input[name=suma_ganado]").val(subtotalCompra.toFixed(2));
    $("input[name=importe_comision]").val(comision.toFixed(2));
}
$('#tabla_ganadero').DataTable();
$('#tabla_stock_estancias').DataTable();
$('#tabla_ganaderos').DataTable();
$('#tabla_intermediario').DataTable();