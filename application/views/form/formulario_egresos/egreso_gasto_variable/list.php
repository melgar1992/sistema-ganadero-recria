<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Egresos Gastos Variables
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                
            </div>
            <div class="box-body">
                <div class="form-group">
                    <a href="<?php echo base_url(); ?>Formulario_Egresos/Egreso_gasto_variable/add">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                            <button type="submit" id="agregar" class="btn btn-success">Agregar Gastos Variables</button>
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
                            <th>Nombre empleado</th>
                            <th>Categoria gastos variables</th>
                            <th>Fecha</th>
                            <th>Egreso total</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($egresos_gastos_variables)) : ?>
                            <?php foreach ($egresos_gastos_variables as $egreso_gasto_variable) : ?>

                                <tr>
                                    <td><?php echo $egreso_gasto_variable->id_gastos_variables; ?></td>
                                    <td><?php echo $egreso_gasto_variable->nombres; ?></td>
                                    <td><?php echo $egreso_gasto_variable->nombre_categoria_egreso_variable; ?></td>
                                    <td><?php echo $egreso_gasto_variable->fecha; ?></td>
                                    <td><?php echo number_format($egreso_gasto_variable->total, 2); ?></td>
                                    <td>
                                        <div class="btn-group">
                                           
                                            <a href="<?php echo base_url() ?>Formulario_Egresos/egreso_gasto_variable/editar/<?php echo $egreso_gasto_variable->id_gastos_variables; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                            <button type="button" value="<?php echo $egreso_gasto_variable->id_gastos_variables; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
                                        </div>
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

                <h4 class="modal-title"></h4>

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