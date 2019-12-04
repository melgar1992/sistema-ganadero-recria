<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Egresos Gastos Variables
            <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <?php if ($this->session->flashdata("error")) : ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                            </div>
                        <?php endif; ?>

                        <form action="<?php echo base_url(); ?>Formulario_Egresos/Egreso_gasto_variable/actualizarEgreso" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $egreso_gasto_variable->id_gastos_variables; ?>" name="id_gastos_variables">
                            <div class="form-group">

                                <div class="col-md-3 <?php echo form_error("categoriaegresovariables") != false ? 'has-error' : ''; ?>">
                                    <label for="">Categoria Gastos Variables:</label>
                                    <select name="categoriaegresovariables" id="categoriaegresovariables" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($categoriaegresovariables as $categoriaegresovariable) : ?>
                                            <?php if ($categoriaegresovariable->id_tipo_gastos_variables == $egreso_gasto_variable->id_tipo_gastos_variables) : ?>
                                                <option value="<?php echo $categoriaegresovariable->id_tipo_gastos_variables; ?>" selected> <?php echo $categoriaegresovariable->nombre ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $categoriaegresovariable->id_tipo_gastos_variables; ?>"> <?php echo $categoriaegresovariable->nombre ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('categoriaegresovariable', "<span class= 'help-block'>", '</span>'); ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-sm-6 col-xs-11">
                                    <label for="">Empleado:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_empleado" value="<?php echo !empty(form_error("id_empleado")) ? set_value("id_empleado") : $egreso_gasto_variable->id_empleado ?>" id="id_empleado">
                                        <input type="text" class="form-control" readonly value="<?php echo !empty(form_error("id_empleado")) ? set_value("id_empleado") : $egreso_gasto_variable->nombres ?>" required='required' id="empleado">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fecha:</label>
                                    <input type="date" value="<?php echo !empty(form_error("fecha")) ? set_value("fecha") : $egreso_gasto_variable->fecha ?>" class="form-control" name="fecha" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-2 ">
                                    <div>
                                        <label for="cantidad">Cantidad: *</label>

                                        <input type="number" step="any" min="0" value="" id="cantidad" class="form-control col-md-3 " placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">

                                    <div>
                                        <label for="detalle">Detalle: * </label>

                                        <input type="text" value="" id="detalle" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-6">
                                    <div>
                                        <label for="precio_unitario">Precio_unitario: * </label>

                                        <input type="number" step="any" min="0" value="" id="precio_unitario" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-4 col-xs-3">
                                    <div>
                                        <label for="importe_total">Importe Total: </label>
                                        <input type="number" step="any" min="0" readonly value="" id="importe_total" class="form-control" placeholder="">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                                    <button type="button" id="btn-agregar" class="btn btn-success"><span class="fa fa-plus"></span>Agregar</button>

                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="tbegresos" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th>Detalle</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Sub Total</th>
                                                <th>Opciones</th>
                                            <tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($detalle_egresos)) : ?>
                                                <?php foreach ($detalle_egresos as $detalle_egreso) : ?>

                                                    <tr>
                                                        <td>
                                                            <input type='text' name='detalle[]' value='<?php echo $detalle_egreso->detalle; ?>'>
                                                        </td>
                                                        <td>
                                                            <input type='number' step="any" min="0" class='cantidad' name='cantidad[]' value='<?php echo $detalle_egreso->cantidad; ?>'>
                                                        </td>
                                                        <td>
                                                            <input type='number' step="any" min="0" class='precio_unitario' name='precio_unitario[]' value='<?php echo $detalle_egreso->precio_unitario; ?>'>
                                                        </td>
                                                        <td>
                                                            <input type='hidden' name='sub_total[]' value='<?php echo $detalle_egreso->sub_total; ?>'>
                                                            <p><?php echo $detalle_egreso->sub_total ?></p>
                                                        </td>
                                                        <td>
                                                            <button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Importe total:</span>
                                        <input type="number" step="any" min="0" class="form-control" value="<?php echo !empty(form_error("total")) ? set_value("total") : $egreso_gasto_variable->total ?>" placeholder="0.00" id="total" name="total" required readonly="readonly">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <a class="btn btn-primary " href="<?php echo site_url("Formulario_Egresos/Egreso_gasto_variable") ?>" type="button">Volver</a>
                                    <button type="submit" class="btn btn-warning ">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
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

                                    <?php $dataEmpleado = $empleado->id_empleado . "*" . $empleado->nombres . "*" . $empleado->apellidos . "*" . $empleado->carnet_identidad . "*" . $empleado->telefono . "*" . $empleado->direccion; ?>

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