$('#example').DataTable({
    dom: 'Bfrtip',
    buttons: [{
            extend: 'excelHtml5',
            title: "Lista Ventas",
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
            }

        },
        {
            extend: 'pdfHtml5',
            title: "Listado Ventas",
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
            }
        }
    ],
});