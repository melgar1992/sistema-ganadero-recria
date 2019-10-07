$(document).ready(function () {
    var base_url = $("#base_url").val();

    $(document).on("click", ".btn-check", function () {

        empleado = $(this).val();
        infoempleado = empleado.split("*");
        $("#id_empleado").val(infoempleado[0]);
        $("#empleado").val(infoempleado[1]);
        $("#modal-default").modal("hide");
    });

    $(function () {
        $('#cantidad').change(function () {
            cantidad = $(this).val();

            $('#precio_unitario').change(function () {
                precio_unitario = $(this).val();
                Total = cantidad * precio_unitario;
                $('#importe_total').val(Total);
            });
        });
    });

    $("#btn-agregar").on("click", function () {


        if ($('#cantidad').val() != '' & $('#importe_total').val() != '' & $('#detalle').val() != '' & $('#precio_unitario').val() != '') {

            
            html = "<tr>";
            html += "<td><input type='hidden' name= 'detalle[]' value ='" + $('#detalle').val() + "'>" + $('#detalle').val(); +"</td>";
            html += "<td><input type='number' name= 'cantidad[]' value ='" + $('#cantidad').val() + "'></td>";
            html += "<td><input type = 'number' class='precio_unitario' name = 'precio_unitario[]'  value ='" + $('#precio_unitario').val() + "'></td>";
            html += "<td><input type ='hidden' name = 'sub_total[]' value ='" + $('#importe_total').val() +"'>" + $('#importe_total').val() +"</td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbingresos tbody").append(html);
            $('#cantidad').val(null);
            $('#detalle').val(null);
            $('#precio_unitario').val(null);
            $('#importe_total').val(null);
            sumar();
        } else {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Es necesario llenar todos los campos antes de agregarlos',

            })
        }
    });


})

function sumar() {
    total = 0;
    $("#tbingresos  tbody tr").each(function(){
        total =  total + Number($(this).find("td:eq(3)").text());
    });
    $("input[name=total]").val(total.toFixed(2));


}