<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detalle Egresos Variables
            <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box ">
            <div class="box-body">
                <form action="<?php echo base_url(); ?>Formulario_Egresos/Egreso_gasto_variable/guardarEgresos" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-3 <?php echo form_error("categoriaegresovariables") != false ? 'has-error' : ''; ?>">
                            <label for="">Categoria_Gastos_Variables:</label>
                            <select name="categoriaegresovariables" id="categoriaegresovariables" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <?php foreach ($categoriaegresovariables as $categoriaegresovariable) : ?>
                                    <option value="<?php echo $categoriaegresovariable->id_tipo_gastos_variables; ?>">
                                        <?php echo $categoriaegresovariable->nombre ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('categoriaingresos', "<span class= 'help-block'>", '</span>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="">Empleado:</label>
                            <div class="input-group">
                                <input type="hidden" name="id_empleado" value="" id="id_empleado">
                                <input type="text" class="form-control" readonly required='required' id="empleado">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                            </div>
                            <?php echo form_error('id_empleado', "<span class= 'help-block'>", '</span>'); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2 ">
                            <div>
                                <label for="cantidad">Cantidad: <span class="required">*</span></label>

                                <input type="number" value="" id="cantidad" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">

                            <div>
                                <label for="detalle">Detalle: <span class="required">*</span></label>

                                <input type="text" value="" id="detalle" class="form-control " placeholder="">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6">
                            <div>
                                <label for="precio_unitario">Precio_unitario: <span class="required">*</span></label>

                                <input type="number" value="" id="precio_unitario" class="form-control  " placeholder="">
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-4 col-xs-3">
                            <div>
                                <label for="importe_total">Importe Total Bs: </label>
                                <input type="number" readonly value="" id="importe_total" class="form-control " placeholder="">
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
                                        <th>Sub Total Bs</th>
                                        <th>Opciones</th>
                                    <tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class='form-group'>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">Importe total:</span>
                                <input type="number" class="form-control  " placeholder="0.00" id="total" name="total" required readonly="readonly">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-4">
                            <a class="btn btn-primary btn-flat" href="<?php echo site_url("Formulario_Egresos/Egreso_gasto_variable") ?>" type="button">Volver</a>
                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                        </div>
                    </div>
                </form>

                <!-- /.box-body -->

                <!-- /.box -->
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