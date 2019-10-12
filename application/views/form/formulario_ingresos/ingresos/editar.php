<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ingresos
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

                        <form action="<?php echo base_url(); ?>Formulario_Ingresos/Ingreso/actualizarIngreso" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?php echo $ingreso->id_otros_ingresos; ?>" name="id_otros_ingresos">
                            <div class="form-group">

                                <div class="col-md-3 <?php echo form_error("categoriaingresos") != false ? 'has-error' : ''; ?>">
                                    <label for="">Categoria Ingreso:</label>
                                    <select name="categoriaingresos" id="categoriaingresos" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($categoriaingresos as $categoriaingreso) : ?>
                                            <?php if ($categoriaingreso->id_categoria_ingresos == $ingreso->id_categoria_ingresos) : ?>
                                                <option value="<?php echo $categoriaingreso->id_categoria_ingresos; ?>" selected> <?php echo $categoriaingreso->nombre ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $categoriaingreso->id_categoria_ingresos; ?>"> <?php echo $categoriaingreso->nombre ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('categoriaingresos', "<span class= 'help-block'>", '</span>'); ?>
                                </div>

                                <div class="col-md-3 <?php echo form_error("forma_pago") != false ? 'has-error' : ''; ?>">
                                    <label for="">Forma pago:</label>
                                    <select class="form-control" name="forma_pago" required>
                                        <option value="Efectivo" <?php echo ($ingreso->forma_pago == 'Efectivo') ? 'selected' : ''; ?>> Efectivo </option>
                                        <option value="Deposito" <?php echo ($ingreso->forma_pago == 'Deposito') ? 'selected' : ''; ?>> Deposito</option>
                                        <option value="Cheque" <?php echo ($ingreso->forma_pago == 'Cheque') ? 'selected' : ''; ?>>Cheque</option>
                                    </select>
                                </div>
                                <?php echo form_error('forma_pago', "<span class= 'help-block'>", '</span>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Empleado:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_empleado" value="<?php echo !empty(form_error("id_empleado")) ? set_value("id_empleado") : $ingreso->id_empleado ?>" id="id_empleado">
                                        <input type="text" class="form-control" readonly value="<?php echo !empty(form_error("id_empleado")) ? set_value("id_empleado") : $ingreso->nombres ?>" required='required' id="empleado">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fecha:</label>
                                    <input type="date" value="<?php echo !empty(form_error("fecha")) ? set_value("fecha") : $ingreso->fecha ?>" class="form-control" name="fecha" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-2 col-sm-2 col-xs-3 ">
                                    <div>
                                        <label for="cantidad">Cantidad<span class="required">*</span></label>

                                        <input type="number" value="" id="cantidad" class="form-control col-md-3 " placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">

                                    <div>
                                        <label for="detalle">Detalle <span class="required">*</span></label>

                                        <input type="text" value="" id="detalle" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <div>
                                        <label for="precio_unitario">Precio_unitario <span class="required">*</span></label>

                                        <input type="number" value="" id="precio_unitario" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <div>
                                        <label for="importe_total">Importe Total</label>
                                        <input type="number" readonly value="" id="importe_total" class="form-control" placeholder="">
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
                                    <table id="tbingresos" class="table table-bordered btn-hover">
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
                                            <?php if (!empty($detalle_ingresos)) : ?>
                                                <?php foreach ($detalle_ingresos as $detalle_ingreso) : ?>

                                                    <tr>
                                                        <td>
                                                            <input type='text' name='detalle[]' value='<?php echo $detalle_ingreso->detalle; ?>'>
                                                        </td>
                                                        <td>
                                                            <input type='number' name='cantidad[]' value='<?php echo $detalle_ingreso->cantidad; ?>'>
                                                        </td>
                                                        <td>
                                                            <input type='number' name='precio_unitario[]' value='<?php echo $detalle_ingreso->precio_unitario; ?>'>
                                                        </td>
                                                        <td>
                                                            <input type='number'readonly name='sub_total[]' value='<?php echo $detalle_ingreso->sub_total; ?>'>
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
                                <div class='form-group'>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span class="input-group-addon">Importe total:</span>
                                            <input type="number" class="form-control" placeholder="0.00" id="total" name="total" required readonly="readonly">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a class="btn btn-primary btn-flat" href="<?php echo site_url("Formulario_ingresos/Ingreso") ?>" type="button">Volver</a>
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
