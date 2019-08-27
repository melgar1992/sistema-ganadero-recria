$(document).ready(function () {
    var base_url = $("#base_url").val();
    $(".btn-borrar").on("click", function(e) {
        e.preventDefault();
        var ruta = $(this).attr("href");
        //alert(ruta);
        $.ajax({
            url: ruta,
            type: "POST",
            success: function(resp) {

                window.location.href = base_url + resp;

            }


        });

    });

    $(document).on('click', '.btn-vista-usuario', function () {
        
        
        valor_id = $(this).val();
        $.ajax({
            url: base_url + 'Administrador/Usuarios/vista',
            type: 'POST',
            dataType: 'html',
            data:{id:valor_id},
            success: function (data) {
              
             $('#modal-default .modal-body').html(data);
            }
        }); 
     });
    

});