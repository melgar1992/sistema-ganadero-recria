!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ingresos
            <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">


                        <form action="<?php echo base_url(); ?>Formulario_Ingresos/Ingreso/guardarIngresos" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="">Categoria_Ingreso:</label>
                                    <select name="categoriaingresos" id="categoriaingresos" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($categoriaingresos as $categoriaingreso) : ?>
                                            <?php $datacategoria = $categoriaingreso->id_categoria_ingresos; ?>
                                            <option value="<?php echo $datacategoria; ?>">
                                                <?php echo $categoriaingreso->nombre ?></option>

                                        <?php endforeach; ?>
                                    </select>




                                </div>

                                <div class="col-md-3">
                                    <label for="">Forma_pago:</label>
                                    <input type="text" value="<?php echo set_value('forma_pago') ?>" class="form-control" name="forma_pago" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Empleado:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_empleado" value="<?php echo set_value('id_empleado') ?>" id="id_empleado">
                                        <input type="text" class="form-control" disabled="disabled" id="empleado">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fecha:</label>
                                    <input type="date" class="form-control" name="fecha" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-1 col-sm-1 col-xs-3 ">
                                    <div <?php echo !empty(form_error("cantidad")) ? 'has-error' : ''; ?>>
                                        <label for="cantidad">Cantidad<span class="required">*</span></label>

                                        <input type="number" name="cantidad" value="<?php echo set_value('cantidad') ?>" id="cantidad" required="required" class="form-control col-md-3 " placeholder="">
                                        <?php echo form_error("cantidad", "<span class='help-block col-md-4 cols-xs-12'>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">

                                    <div <?php echo !empty(form_error("detalle")) ? 'has-error' : ''; ?>>
                                        <label for="detalle">Detalle <span class="required">*</span></label>

                                        <input type="text" name="detalle" value="<?php echo set_value('detalle') ?>" id="detalle" required="required" class="form-control" placeholder="">
                                        <?php echo form_error("detalle", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <div <?php echo !empty(form_error("precio_unitario")) ? 'has-error' : ''; ?>>
                                        <label for="precio_unitario">Precio_unitario <span class="required">*</span></label>

                                        <input type="number" name="precio_unitario" value="<?php echo set_value('precio_unitario') ?>" id="precio_unitario" required="required" class="form-control" placeholder="">
                                        <?php echo form_error("precio_unitario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <div <?php echo !empty(form_error("total")) ? 'has-error' : ''; ?>>
                                        <label for="total">Total</label>

                                        <input type="number" readonly name="total" value="<?php echo set_value('total') ?>" id=total required="required" class="form-control" placeholder="">
                                        <?php echo form_error("total", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                                    </div>
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
                                            <th>Forma_Pago</th>
                                            <th>Fecha</th>
                                            <th>Categoria_Ingresos</th>
                                            <th>Empleado</th>
                                            <th>Cantidad</th>
                                            <th>Detalle</th>
                                            <th>Precio_Unitario</th>
                                            <th>Total</th>
                                            <th>Opciones</th>
                                        <tr>
                                    </thead>
                                    <tbody>


                                        <?php if (!empty($ingresos)) : ?>

                                            <?php foreach ($ingresos as $ingreso) : ?>
                                                <?php if (!empty($categoriaingresos)) : ?>
                                                    <?php foreach ($categoriaingresos as $categoriaingreso) : ?>
                                                        <?php if (!empty($empleados)) : ?>
                                                            <?php foreach ($empleados as $empleado) : ?>
                                                                <?php if (!empty($detalle_ingresos)) : ?>
                                                                    <?php foreach ($detalle_ingresos as $detalle_ingreso) : ?>


                                                                        <tr>

                                                                            <td><?php echo $ingreso->id_otros_ingresos; ?></td>
                                                                            <td><?php echo $ingreso->forma_pago; ?></td>
                                                                            <td><?php echo $ingreso->fecha; ?></td>


                                                                           

                                                                            <td><?php echo  $categoriaingreso->nombre; ?></td>


                                                                            <td><?php echo  $empleado->nombres; ?></td>

                                                                            <td><?php echo $detalle_ingreso->cantidad; ?></td>
                                                                            <td><?php echo $detalle_ingreso->detalle; ?></td>
                                                                            <td><?php echo $detalle_ingreso->precio_unitario; ?></td>
                                                                            <td><?php echo $detalle_ingreso->total; ?></td>

                                                                            <td>
                                                                                <div class="btn-group">

                                                                                    <a href="<?php echo base_url(); ?>Formulario_Ingresos/Ingreso/editar/<?php echo $ingreso->id_otros_ingresos; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                                                    <a href="<?php echo base_url(); ?>Formulario_Ingresos/Ingreso/borrar/<?php echo $ingreso->id_otros_ingresos; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>





                                                                    

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>

                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>




                                    </tbody>
                                </table>
                            </div>
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