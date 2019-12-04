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
                <h3 class="box-title">Formulario de Boletas de pagos</h3>

                
            </div>
            <div class="box-body">
                <h4>Los campos con * son obligatorios.</h4>

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formulario_Egresos/Pago_empleado/guardarBoletaPago" id="pago_empleado" class="form-horizontal form-label-left">

                    <div class="form-group <?php echo !empty(form_error("empleado")) ? 'has-error' : ''; ?>">
                        <label for="empelado" class="control-label col-md-3 col-sm-3 col-xs-12">Empleado: <span class="required">*</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="hidden" name="id_empleado" value="" id="id_empleado">
                            <input type="hidden" name="id_contrato_empleado" value="" id="id_contrato_empleado">
                            <input type="text" class="form-control" readonly name="empleado" required='required' id="empleado">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                            <?php echo form_error("empelado", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha")) ? 'has-error' : ''; ?>">
                        <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha del pago: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="date" name="fecha" value="" id=fecha required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("fecha", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("tipo_pago")) ? 'has-error' : ''; ?>">
                        <label for="tipo_pago" class="control-label col-md-3 col-sm-3 col-xs-12">Tipos de pago: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select name="tipo_pago" id="tipo_pago" required class="form-control col-md-3 col-xs-12">
                                <option value=""></option>
                                <?php foreach ($tipos_pagos as $tipo_pago) : ?>
                                    <option value="<?php echo $tipo_pago->id_tipo_pago; ?>"><?php echo $tipo_pago->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error("tipo_pago", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("pago")) ? 'has-error' : ''; ?>">
                        <label for="pago" class="control-label col-md-3 col-sm-3 col-xs-12">Pago Bs: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" step="any" min="0" name="pago" value="" id=pago required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("pago", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="in_solid"></div>

                    <br>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                            <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                        </div>
                    </div>

                    <div class="in_solid"></div>

                </form>
                <!-- /.box -->
                <div class="row">
                    <div class="col-md-12">
                        <h4>Listado de Estancias</h4>
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Empleado</th>
                                    <th>Tipo de pago</th>
                                    <th>Fecha</th>
                                    <th>Pago Bs</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($boletas_pagos)) : ?>
                                    <?php foreach ($boletas_pagos as $boletas_pago) : ?>
                                        boletas_pagos
                                        <tr>
                                            <td><?php echo $boletas_pago->id_boleta_pago; ?></td>
                                            <td><?php echo $boletas_pago->nombres; ?> <?php echo $boletas_pago->apellidos; ?></td>
                                            <td><?php echo $boletas_pago->tipoPago; ?></td>
                                            <td><?php echo $boletas_pago->fecha; ?></td>
                                            <td><?php echo number_format ($boletas_pago->pago, 2); ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url() ?>Formulario_Egresos/Pago_empleado/editar/<?php echo $boletas_pago->id_boleta_pago; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <button type="button" value="<?php echo $boletas_pago->id_boleta_pago; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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