$(document).ready(function () {
	var base_url = $("#base_url").val();
	$('#reporte_categoria_bovino').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Reporte_categoria_bovino',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$('#reporte_categoria_animal').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Reporte_categoria_animal',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$('#reporte_venta_bovino').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Reporte_venta_animal_bovino',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$('#reporte_venta_animal').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Reporte_venta_animal',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$('#reporte_compra_bovino').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Reporte_compra_animal_bovino',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$('#reporte_compra_animal').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Reporte_compra_animal',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$('#reporte_control_bovino').on('click', function () {
		
		$.ajax({
			url: base_url + 'Dashboard/Control_animal_bovino',
			type: 'POST',
			dataType: 'html',
			success: function (data) {

				$('#modal-reporte .modal-body').html(data);

			}
		});
	});
	$(document).on('click','.btn-print',function () {

        $("#modal-reporte .modal-body").print({
            title: 'Reporte',
        });
	});
	
});
$(function () {
	/* ChartJS
	 * -------
	 * Here we will create a few charts using ChartJS
	 */

	//--------------
	//- AREA CHART -
	//--------------

	var areaChartData = {
		labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		datasets: [{
				label: 'Electronics',
				fillColor: 'rgba(210, 214, 222, 1)',
				strokeColor: 'rgba(210, 214, 222, 1)',
				pointColor: 'rgba(210, 214, 222, 1)',
				pointStrokeColor: '#c1c7d1',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(220,220,220,1)',
				data: [65, 59, 80, 81, 56, 55, 40]
			},
			{
				label: 'Digital Goods',
				fillColor: 'rgba(60,141,188,0.9)',
				strokeColor: 'rgba(60,141,188,0.8)',
				pointColor: '#3b8bba',
				pointStrokeColor: 'rgba(60,141,188,1)',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(60,141,188,1)',
				data: [28, 48, 40, 19, 86, 27, 90]
			}
		]
	}

	var areaChartOptions = {
		//Boolean - If we should show the scale at all
		showScale: true,
		//Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines: false,
		//String - Colour of the grid lines
		scaleGridLineColor: 'rgba(0,0,0,.05)',
		//Number - Width of the grid lines
		scaleGridLineWidth: 1,
		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines: true,
		//Boolean - Whether the line is curved between points
		bezierCurve: true,
		//Number - Tension of the bezier curve between points
		bezierCurveTension: 0.3,
		//Boolean - Whether to show a dot for each point
		pointDot: false,
		//Number - Radius of each point dot in pixels
		pointDotRadius: 4,
		//Number - Pixel width of point dot stroke
		pointDotStrokeWidth: 1,
		//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		pointHitDetectionRadius: 20,
		//Boolean - Whether to show a stroke for datasets
		datasetStroke: true,
		//Number - Pixel width of dataset stroke
		datasetStrokeWidth: 2,
		//Boolean - Whether to fill the dataset with a color
		datasetFill: true,
		//String - A legend template
		legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		maintainAspectRatio: true,
		//Boolean - whether to make the chart responsive to window resizing
		responsive: true
	}


	//-------------
	//- LINE CHART -
	//--------------
	var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
	var lineChart = new Chart(lineChartCanvas)
	var lineChartOptions = areaChartOptions
	lineChartOptions.datasetFill = false
	lineChart.Line(areaChartData, lineChartOptions)


})
