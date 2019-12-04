<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pagos de Empleados
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>

                
            </div>
            <div class="box-body">
                <h4>Los campos con * son obligatorios.</h4>

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formulario_Egresos/Pago_empleado/actualizarBoletaPago" id="pago_empleado" class="form-horizontal form-label-left">
                            <input type="text" hidden name="id_boleta_pago" value="<?php echo $boleta_pago->id_boleta_pago; ?>">
                    <div class="form-group <?php echo !empty(form_error("empleado")) ? 'has-error' : ''; ?>">
                        <label for="empelado" class="control-label col-md-3 col-sm-3 col-xs-12">Empleado: <span class="required">*</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="hidden" name="id_empleado" value="<?php echo $boleta_pago->id_empleado; ?>" id="id_empleado">
                            <input type="hidden" name="id_contrato_empleado" value="<?php echo $boleta_pago->id_contrato_empleado; ?>" id="id_contrato_empleado">
                            <input type="text" class="form-control" readonly name="empleado" value="<?php echo $boleta_pago->nombres; ?> <?php echo $boleta_pago->apellidos; ?>" required='required' id="empleado">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                            <?php echo form_error("empelado", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha")) ? 'has-error' : ''; ?>">
                        <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha del pago: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="date" name="fecha" value="<?php echo !empty(form_error("fecha")) ? set_value("fecha") : $boleta_pago->fecha ?>" id=fecha required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("fecha", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("tipo_pago")) ? 'has-error' : ''; ?>">
                        <label for="tipo_pago" class="control-label col-md-3 col-sm-3 col-xs-12">Tipos de pago: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select name="tipo_pago" id="tipo_pago" required class="form-control col-md-3 col-xs-12">
                                <option value=""></option>
                                <?php foreach ($tipos_pagos as $tipo_pago) : ?>
                                    <?php if ($boleta_pago->id_tipo_pago == $tipo_pago->id_tipo_pago) : ?>
                                        <option value="<?php echo $tipo_pago->id_tipo_pago; ?>" selected><?php echo $tipo_pago->nombre; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $tipo_pago->id_tipo_pago; ?>"><?php echo $tipo_pago->nombre; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error("tipo_pago", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("pago")) ? 'has-error' : ''; ?>">
                        <label for="pago" class="control-label col-md-3 col-sm-3 col-xs-12">Pago Bs: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" name="pago" value="<?php echo !empty(form_error("pago")) ? set_value("pago") : $boleta_pago->pago ?>" id=pago required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("pago", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="in_solid"></div>

                    <br>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?php echo site_url("Formulario_Egresos/Pago_empleado") ?>" class="btn btn-primary btn-flat">Volver</a>
                            <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                        </div>
                    </div>

                    <div class="in_solid"></div>

                </form>
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