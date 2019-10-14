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
// Funcion para agregar el detalle a la tabla
    $("#btn-agregar").on("click", function () {


        if ($('#cantidad').val() != '' & $('#importe_total').val() != '' & $('#detalle').val() != '' & $('#precio_unitario').val() != '') {

            
            html = "<tr>";
            html += "<td><input type='hidden' name= 'detalle[]' value ='" + $('#detalle').val() + "'>" + $('#detalle').val(); +"</td>";
            html += "<td><input type='number' class='cantidad' name= 'cantidad[]' value ='" + $('#cantidad').val() + "'></td>";
            html += "<td><input type = 'number' class='precio_unitario' name = 'precio_unitario[]'  value ='" + $('#precio_unitario').val() + "'></td>";
            html += "<td><input type ='hidden' name = 'sub_total[]' value ='" + $('#importe_total').val() +"'><p>" + $('#importe_total').val() +"</p></td>";
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
    
    $(document).on("click", ".btn-remove-producto", function() {

        $(this).closest("tr").remove();
        sumar();
    });
    //Funcion para sumar en la tabla
    $(document).on("keyup","#tbingresos input.cantidad",function () {
   
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(2)").children("input").val();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(3)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(3)").children("input").val(importe.toFixed(2));
        sumar();
    });
    $(document).on("keyup","#tbingresos input.precio_unitario",function () {
        
        
        precio = $(this).val();
        cantidad = $(this).closest("tr").find("td:eq(1)").children("input").val();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(3)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(3)").children("input").val(importe.toFixed(2));
        sumar();
    });

    //Borrar el ingreso
    $(document).on('click', '.btn-borrar', function () {
   
        Swal.fire({
            title: 'Esta seguro de elimar?',
            text: "Una vez elimina el Ingreso tambien se eliminaran todos los datos relacionados con el mismo!",
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
                    url: base_url + 'Formulario_Ingresos/Ingreso/borrar/' + id,
                    type: 'POST',
                    success: function (resp) {

                       window.location.href = base_url + resp;
                    }
                })


            }
        })

    })


})
//Suma el subtotal de la tabla y lo ingresa al total de ingreso
function sumar() {
    total = 0;
    $("#tbingresos  tbody tr").each(function(){
        total =  total + Number($(this).find("td:eq(3)").text());
    });
    $("input[name=total]").val(total.toFixed(2));


}