<footer class="main-footer">
  <div class="pull-right hidden-xs">

  </div>
  <strong>Sistema de control de animales.</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/template/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Jquery Print, sirve para imprimir -->
<script src="<?php echo base_url(); ?>assets/template/jquery-print/jquery.print.js"></script>
<!-- DataTables-->
<script src="<?php echo base_url(); ?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Data Tables export -->
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<!-- Sweet Alert -->
<script src="<?php echo base_url(); ?>assets/template/sweetalert2/sweetalert2.all.min.js"></script>
<!-- ChartJs -->
<script src="<?php echo base_url(); ?>assets/template/chartjs/Chart.js"></script>
<input type="hidden" value="<?php echo base_url() ?>" id="base_url">
<script>
  $('#example1').DataTable({
    responsive: "true",
    "language": {
      'lengthMenu': "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registro",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior",

      },
      "sProcesing": "Procesando...",
    }

  });
  $('.sidebar-menu').tree();
</script>
<script>
  
</script>

<!--Formulario de la pagina -->
<?php
if (isset($pagina)) { ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/JavaScript/Js<?php echo $pagina; ?>.js"></script>
<?php
}

?>

</body>

</html>