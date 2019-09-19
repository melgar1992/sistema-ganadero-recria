$(document).ready(function () {
    var base_url = $("#base_url").val();

    $('#sueldo').on('change',function () {
        sueldo = $(this).val();

        if(sueldo !=''){

            afp(sueldo);
            afp_empleador(sueldo);
            seguro_medico(sueldo);
            

        }
        else{
            $('#afp').val(null);
            $('#afp_empleador').val(null);
            $('#seguro_medico').val(null);

        }
    })

})
function afp(sueldo) {
    
    afp = sueldo * 0.1271;

    $('#afp').val(afp);

}

function afp_empleador(sueldo) {

    afp_empleador = sueldo * 0.0671;

    $('#afp').val(afp_empleador);
    
}
function seguro_medico(sueldo) {

    seguro_medico = sueldo * 0.1;

    $('#seguro_medico').val(seguro_medico);
    
}