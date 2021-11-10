$(document).ready(function () {
    var base_url = $("#base_url").val();
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
    $(document).on("click", ".btn-check-estancia", function () {

        estancia = $(this).val();
        infoestancia = estancia.split("*");
        $("#id_estancia").val(infoestancia[0]);
        $("#estancia").val(infoestancia[1]);
        $("#modal-estancia").modal("hide");
    });
    $(document).on("click", ".btn-check-intermediario", function () {

        intermediario = $(this).val();
        infointermediario = intermediario.split("*");
        $("#id_intermediario").val(infointermediario[0]);
        $("#intermediario").val(infointermediario[1] + ' ' + infointermediario[2]);
        $("#modal-intermediario").modal("hide");
    });

    $("#btn-agregar").on("click", function () {


        if ($('#catego').val() != '' & $('#raz').val() != '' & $('#sex').val() != '') {


            html = "<tr>";
            html += "<td><input type='text' readonly class ='form-control' name= 'categoria[]' value ='" + $('#catego').val() + "'></td>";
            html += "<td><input type='hidden' readonly class='raza form-control' name= 'raza[]' value ='" + $('#raz').val() + "'><p class= 'form-control'>" + $('select[name="raz"] option:selected').text() + "</p></td>";
            html += "<td><input type='text' readonly class='sexo form-control' name= 'sexo[]' value ='" + $('#sex').val() + "'></td>";
            html += "<td><input type = 'number' class='cantidad form-control' name = 'cantidad[]'  value ='0'></td>";
            html += "<td><input type = 'number' step= '0.01' class='precio_unitario form-control' name = 'precio_unitario[]'  value =''></td>";
            html += "<td><input type = 'number' class='precio_transporte form-control' name = 'precio_transporte[]'  value =''></td>";
            html += "<td><input type='text'  class='placa_camion form-control' name= 'placa_camion[]' value =''></td>";
            html += "<td><input type ='number' readonly class = 'form-control' name = 'sub_total[]' value =''></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-compra'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbCompraBovinos tbody").append(html);
            $('#raz').val(null);
            $('#sex').val(null);
            $('#catego').val(null);
            sumar();

        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Es necesario llenar todos los campos antes de agregarlos a la tabla',

            })
        }
    });
    $(document).on('change', '#tbCompraBovinos input.cantidad', function () {


        cantidad = $(this).val();
        precio_unitario = $(this).closest('tr').find('td:eq(4)').children('input').val();
        if (precio_unitario != '') {
            sub_total = cantidad * precio_unitario;
            $(this).closest('tr').find('td:eq(7)').children('input').val(sub_total.toFixed(2));
            sumar();
        }

    });
    $(document).on('change', '#tbCompraBovinos input.precio_unitario', function () {

        precio_unitario = $(this).val();
        cantidad = $(this).closest('tr').find('td:eq(3)').children('input').val();
        if (cantidad != '') {
            sub_total = cantidad * precio_unitario;
            $(this).closest('tr').find('td:eq(7)').children('input').val(sub_total.toFixed(2));
            sumar();
        }

    });
    $(document).on('change', '#tbCompraBovinos input.precio_transporte', function () {
        sumar();
    });
    $(document).on('change','#comision', function () {
        sumar();
    });
    $(document).on("click", ".btn-remove-compra", function () {

        $(this).closest("tr").remove();
        sumar();

    });
    $(document).on('click', '.btn-borrar', function () {

        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el compra no se podra recuperar!",
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
                    url: base_url + 'Formulario_Animales/Compra_animales/borrar/' + id,
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
        $('#raz').empty();
        $('#raz').prop('disabled', false);
        $.ajax({
            type: "POST",
            url: base_url + "Formulario_Animales/Compra_animales/buscarRazas/",
            data: { cat: categoria },
            success: function (respuesta) {
                respuesta2 = JSON.parse(respuesta);
                jQuery.each(respuesta2, function (i, valoractual) {
                    $('#raz').prepend("<option value='" + valoractual.id_tipo_animal + "' >" + valoractual.raza + "</option>");
                });
            }
        });
    });
});

function sumar() {
    subtotalCompra = 0;
    subtotaltransporte = 0;

    $("#tbCompraBovinos  tbody tr").each(function () {
        subtotalCompra = subtotalCompra + Number($(this).find("td:eq(7)").children('input').val());
        subtotaltransporte = subtotaltransporte + Number($(this).find("td:eq(5)").children('input').val());
    });
    total = 0;
    total = subtotalCompra + subtotaltransporte;
    porcentaje = $("#comision").val() / 100;
    comision = subtotalCompra * porcentaje;
    $("input[name=total]").val(total.toFixed(2));
    $("input[name=total_transporte]").val(subtotaltransporte.toFixed(2));
    $("input[name=suma_ganado]").val(subtotalCompra.toFixed(2));
    $("input[name=importe_comision]").val(comision.toFixed(2));
}
$('#tabla_ganadero').DataTable();
$('#tabla_estancias').DataTable();
$('#tabla_ganaderos').DataTable();
$('#tabla_intermediario').DataTable();