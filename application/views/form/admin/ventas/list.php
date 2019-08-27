<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ventas
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>Movimientos/Ventas/add">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                            <button type="submit" id="agregar" class="btn btn-success">Agregar ventas</button>
                    </a>

                </div>



            </div>
        </div>

        </form>

        <hr>
        <div class="row">
            <div class="col-md-12">
                <table id="example1" class="table table-bordered btn-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres Cliente</th>
                            <th>Tipo Comprobante</th>
                            <th>Numero del Comprobante</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ventas)) : ?>
                        <?php foreach ($ventas as $venta) : ?>
                        <tr>
                            <td><?php echo $venta->id_ventas; ?></td>
                            <td><?php echo $venta->nombres; ?></td>
                            <td><?php echo $venta->tipocomprobante; ?></td>
                            <td><?php echo $venta->num_documento; ?></td>
                            <td><?php echo $venta->fecha; ?></td>
                            <td><?php echo $venta->total; ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-view-venta" data-toggle="modal" data-target="#modal-default" value="<?php echo $venta->id_ventas?>"><span class="fa fa-search"></span></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Informacion de la venta</h4>

            </div>

            <div class="modal-body">



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print">Imprimir</span></button>
                

            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>

<!-- /.modal -->