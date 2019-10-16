$(document).ready(function () {
	var base_url = $("#base_url").val();

	$(document).on("click", ".btn-check", function () {

		empleado = $(this).val();
		infoempleado = empleado.split("*");
		$("#id_empleado").val(infoempleado[0]);
		$("#empleado").val(infoempleado[1] + ' ' + infoempleado[2]);
		$("#modal-default").modal("hide");
	});




});
