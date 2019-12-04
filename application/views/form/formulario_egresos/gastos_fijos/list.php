<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gastos fijos
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de Gastos Fijos </h3>


            </div>
            <div class="box-body">
                <h4>Los campos con * son obligatorios.</h4>
                <br> </br>
                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>


                <form method="POST" action="<?php echo base_url(); ?>Formulario_Egresos/Gastos_fijo/guardarGastoFijo" id="gasto_fijo" class="form-horizontal form-label-left">
                    <input type="hidden" class='form-group' value="<?php echo $this->session->userdata('id_usuarios'); ?>" name="id_usuario">
                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de la cuenta fija: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" value="<?php echo set_value("nombre"); ?>" id="nombre" required="required" class="form-control col-md-3 col-xs-12" placeholder="Telefono tigo, entel, etc">
                            <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>

                        </div>
                    </div>

                    <div class="form-group <?php echo !empty(form_error("total")) ? 'has-error' : ''; ?>">
                        <label for="total" class="control-label col-md-3 col-sm-3 col-xs-12">Total Bs: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" name="total" value="<?php echo set_value("total"); ?>" id="total" required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("total", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>

                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                            <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

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
                                    <th>Nombre cuenta</th>
                                    <th>Total Bs</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($gastos_fijos)) : ?>
                                    <?php foreach ($gastos_fijos as $gasto_fijo) : ?>

                                        <tr>
                                            <td><?php echo $gasto_fijo->id_gastos_fijos; ?></td>
                                            <td><?php echo $gasto_fijo->nombre; ?></td>
                                            <td><?php echo number_format($gasto_fijo->total, 2); ?></td>
                                            <td>
                                                <div class="btn-group">

                                                    <a href="<?php echo base_url() ?>Formulario_Egresos/Gastos_fijo/editar/<?php echo $gasto_fijo->id_gastos_fijos; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <button type="button" value="<?php echo $gasto_fijo->id_gastos_fijos; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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

                <h4 class="modal-title">Informacion de la Categoria</h4>

            </div>

            <div class="modal-body">



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>



            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>