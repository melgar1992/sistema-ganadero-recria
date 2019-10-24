<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pagos de Gastos Fijos
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de Pago Gasto Fijo</h3>

            </div>
            <div class="box-body">
                <h4>Los campos con * son obligatorios.</h4>

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formulario_Egresos/Egreso_gasto_fijo/guardarEgresoGastoFijo" id="pago_empleado" class="form-horizontal form-label-left">

                    <div class="form-group <?php echo !empty(form_error("empleado")) ? 'has-error' : ''; ?>">
                        <label for="empleado" class="control-label col-md-3 col-sm-3 col-xs-12">Empleado <span class="required">*</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="hidden" name="id_empleado" value="" id="id_empleado">
                            <input type="text" class="form-control" readonly name="empleado" required='required' id="empleado">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                            <?php echo form_error("empleado", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="form-group <?php echo !empty(form_error("fecha")) ? 'has-error' : ''; ?>">
                        <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha del pago <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="fecha" value="" id=fecha required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("fecha", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("gastos_fijos")) ? 'has-error' : ''; ?>">
                        <label for="gastos_fijos" class="control-label col-md-3 col-sm-3 col-xs-12">Gastos_Fijos<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="gastos_fijos" id="gastos_fijos" required class="form-group col-md-7 col-xs-12">
                                <option value=""></option>
                                <?php foreach ($gastos_fijos as $gasto_fijo) : ?>
                                    <option value="<?php echo $gasto_fijo->id_gastos_fijos; ?>"><?php echo $gasto_fijo->nombre; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error("gastos_fijos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Mes_Correspondiente<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-11">
                            <select type="text" name="mes_correspondiente" required="required" class="form-group col-md-7 col-xs-12 ">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo </option>
                                <option value="Abril">Abril </option>
                                <option value="Mayo">Mayo </option>
                                <option value="Junio">Junio </option>
                                <option value="Julio">Julio </option>
                                <option value="Agosto">Agosto </option>
                                <option value="Septiembre">Septiembre </option>
                                <option value="Octubre">Octubre </option>
                                <option value="Noviembre">Noviembre </option>
                                <option value="Diciembre">Diciembre </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group <?php echo !empty(form_error("total")) ? 'has-error' : ''; ?>">
                        <label for="total" class="control-label col-md-3 col-sm-3 col-xs-12">Total Bs <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="total" value="" id=total required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("total", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <br>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                            <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                        </div>
                    </div>
                </form>
                <!-- /.box -->
                <div class="row">
                    <div class="col-md-12">
                        <h4>Listado de Egresos Gastos Fijos</h4>
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empleado</th>
                                    <th>Gastos Fijos</th>
                                    <th>Fecha</th>
                                    <th>Mes_Correspondiente</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pagos_gastos_fijos)) : ?>
                                    <?php foreach ($pagos_gastos_fijos as $pago_gasto_fijo) : ?>

                                        <tr>
                                            <td><?php echo $pago_gasto_fijo->id_pago_gasto_fijo; ?></td>
                                            <td><?php echo $pago_gasto_fijo->nombres; ?></td>
                                            <td><?php echo $pago_gasto_fijo->gastoFijo; ?></td>
                                            <td><?php echo $pago_gasto_fijo->mes_correspondiente; ?></td>
                                            <td><?php echo $pago_gasto_fijo->fecha; ?></td>
                                            <td><?php echo $pago_gasto_fijo->total; ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url() ?>Formulario_Egresos/Egreso_gasto_fijo/editar/<?php echo $pago_gasto_fijo->id_pago_gasto_fijo; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <button type="button" value="<?php echo $pago_gasto_fijo->id_pago_gasto_fijo; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>


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
                <h4 class="modal-title">Lista de Empleados</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Carnet de Indentidad</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($empleados)) : ?>
                            <?php foreach ($empleados as $empleado) : ?>

                                <tr>
                                    <td><?php echo $empleado->id_empleado; ?></td>
                                    <td><?php echo $empleado->nombres; ?></td>
                                    <td><?php echo $empleado->apellidos; ?></td>
                                    <td><?php echo $empleado->carnet_identidad; ?></td>

                                    <?php $dataEmpleado = $empleado->id_empleado . "*" . $empleado->nombres . "*" . $empleado->apellidos . "*" . $empleado->carnet_identidad . "*" . $empleado->telefono . "*" . $empleado->direccion . "*" . $empleado->id_contrato_empleado; ?>

                                    <td>
                                        <button type="button" class="btn btn-success btn-check" value="<?php echo $dataEmpleado; ?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->