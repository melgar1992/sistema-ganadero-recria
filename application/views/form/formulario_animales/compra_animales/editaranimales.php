<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Compra de Animales
            <small>Editar</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <form method="POST" action="<?php echo base_url(); ?>Formulario_Animales/Compra_animales/acutalizarBovinos" id="compra_animales_bovinos" class="form-horizontal form-label-left">
            <input type="hidden" value="<?php echo $compra_animal->id_compra_animales; ?>" name="id_compra_animales">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border ">
                    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if ($this->session->flashdata("error")) : ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                            <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <div class='col-md-3 col-sm-6 col-xs-12'>
                            <label for="ganadero" class="">Ganadero: *</label>
                            <div class="input-group <?php echo !empty(form_error("ganadero")) ? 'has-error' : ''; ?>">
                                <input type="hidden" name="id_ganadero" value="<?php echo !empty(form_error('id_ganadero')) ? set_value('id_ganadero') : $compra_animal->id_ganadero ?>" id="id_ganadero">
                                <input type="text" class="form-control" placeholder="ganadero que vende" readonly value="<?php echo !empty(form_error('ganadero')) ? set_value('ganadero') : $compra_animal->nombre_ganadero ?>" required='required' name="ganadero" required='required' id="ganadero">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-ganaderos"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                                <?php echo form_error("ganadero", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-6 col-xs-12'>
                            <label for="intermediario">Intermediario:</label>
                            <div class="input-group <?php echo !empty(form_error("intermediario")) ? 'has-error' : ''; ?>">
                                <input type="hidden" name="id_intermediario" value="<?php echo !empty($compra_animal->id_intermediario) ? $compra_animal->id_intermediario : ''; ?>" id="id_intermediario">
                                <input type="text" class="form-control" value="<?php echo ($compra_animal->id_intermediario !== '0') ? $compra_animal->nombre_intermediario : ''; ?>" placeholder="Intermediario" readonly name="intermediario" id="intermediario">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-intermediario"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                                <?php echo form_error("intermediario", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                            </div>
                        </div>
                        <div class='col-md-3 col-sm-6 col-xs-12'>
                            <div class='input-group'>
                                <label for="comision" class="">Comision:</label>
                                <input type="number" step= '0.01' min="0" max='10' value="<?php echo !empty(form_error('comision')) ? set_value('comision') : $compra_animal->comision ?>" class='form-control' name="comision" id="comision" placeholder="%">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='col-md-3 col-sm-6 col-xs-12'>
                            <label for="empleado" class="">Empleado: *</label>
                            <div class="input-group <?php echo !empty(form_error("empleado")) ? 'has-error' : ''; ?>">
                                <input type="hidden" name="id_empleado" value="<?php echo !empty(form_error('id_empleado')) ? form_error('id_empleado') : $compra_animal->id_empleado ?>" id="id_empleado">
                                <input type="text" class="form-control" value="<?php echo !empty(form_error('empleado')) ? form_error('empleado') : $compra_animal->nombre_empleado ?>" placeholder="Encargado de compra" readonly required='required' name="empleado" required='required' id="empleado">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                                <?php echo form_error("empelado", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                            </div>
                        </div>

                        <div class='col-md-3 col-sm-6 col-xs-12'>
                            <label for="estancia">Estancia: *</label>
                            <div class="input-group <?php echo !empty(form_error("estancia")) ? 'has-error' : ''; ?>">
                                <input type="hidden" name="id_estancia" value="<?php echo !empty(form_error('id_estancia')) ? form_error('id_estancia') : $compra_animal->id_estancia ?>" id="id_estancia">
                                <input type="text" class="form-control" value="<?php echo !empty(form_error('estancia')) ? form_error('estancia') : $compra_animal->nombre_estancia ?>" placeholder="estancia destino" readonly name="estancia" id="estancia">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-estancia"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                                <?php echo form_error("estancia", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                            </div>
                        </div>
                        <div class='col-md-2 col-sm-6 col-xs-12'>
                            <div class='input-group'>
                                <label for="comision" class="">Fecha compra: *</label>
                                <input type="date" class='form-control' required='required' value="<?php echo !empty(form_error('fecha')) ? form_error('fecha') : $compra_animal->fecha ?>" name="fecha" id="fecha">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='col-md-3 col-sm-6 col-xs-12'>
                            <label for="transportista">Transportista: *</label>
                            <div class="input-group <?php echo !empty(form_error("transportista")) ? 'has-error' : ''; ?>">
                                <input type="hidden" name="id_transportista" value="<?php echo !empty(form_error('id_transportista')) ? form_error('id_transportista') : $compra_animal->id_transportista ?>" id="id_transportista">
                                <input type="text" class="form-control" value='<?php echo !empty(form_error('transportista')) ? form_error('transportista') : $compra_animal->nombre_transportista ?>' placeholder="transportista" readonly name="transportista" id="transportista">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-transportista"><span class="fa fa-search"></span> Buscar</button>
                                </span>
                                <?php echo form_error("transportista", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-2 col-sm-4 col-xs-12">
                        <div>
                            <label for="categ">Categoria: <span class="required">*</span></label>
                            <select id="catego" name='categ' class="form-control categ">
                                <option value=""></option>
                                <option value="Equino">Equino</option>
                                <option value="Familia Cerdos">Familia Cerdos </option>
                                <option value="Aves">Aves </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12 ">
                        <div>
                            <label for="raz">Raza: <span class="required">*</span></label>
                            <select id="raz" name="raz" disabled class="form-control">
                                <option value=""></option>
                            </select>
                            <?php echo form_error("raz", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12">
                        <div>
                            <label for="sex">Sexo</label>
                            <select class="form-control" id="sex">
                                <option value="M">Macho</option>
                                <option value="H">Hembra</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="btn-agregar">&nbsp;</label>
                        <button type="button" id="btn-agregar" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span>Agregar</button>

                    </div>
                </div>



                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tbCompraBovinos" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Raza</th>
                                    <th>Sexo</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario Bs</th>
                                    <th>Precio transporte Bs</th>
                                    <th>Placa camion</th>
                                    <th>Sub total Bs</th>
                                    <th>Opciones</th>
                                <tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($detalle_movimiento_animales)) : ?>
                                    <?php foreach ($detalle_movimiento_animales as $detalle_movimiento_animal) : ?>

                                        <tr>
                                            <td>
                                                <input type='text' readonly class="form-control" name='categoria[]' value='<?php echo $detalle_movimiento_animal->categoria; ?>'>
                                            </td>
                                            <td>
                                                <input type='hidden' name='raza[]' value='<?php echo $detalle_movimiento_animal->id_tipo_animal; ?>'>
                                                <p><?php echo $detalle_movimiento_animal->raza ?></p>
                                            </td>
                                            <td>
                                                <input type='text' readonly class="form-control" name='sexo[]' value='<?php echo $detalle_movimiento_animal->sexo; ?>'>
                                            </td>
                                            <td>
                                                <input type='number' class="cantidad form-control" name='cantidad[]' value='<?php echo $detalle_movimiento_animal->cantidad; ?>'>
                                            </td>
                                            <td>
                                                <input type='number' step= '0.01' class='precio_unitario form-control' name='precio_unitario[]' value='<?php echo $detalle_movimiento_animal->precio_unitario; ?>'>
                                            </td>
                                            <td>
                                                <input type='number' class='precio_transporte form-control' name='precio_transporte[]' value='<?php echo $detalle_movimiento_animal->precio_transporte; ?>'>
                                            </td>
                                            <td>
                                                <input type='text' class='placa_camion form-control' name='placa_camion[]' value='<?php echo $detalle_movimiento_animal->placa_camion; ?>'>
                                            </td>
                                            <td>
                                                <input type='number' readonly class="sub_total form-control" name='sub_total[]' value='<?php echo $detalle_movimiento_animal->sub_total; ?>'>
                                            </td>
                                            <td>
                                                <button type='button' class='btn btn-danger btn-remove-compra'><span class='fa fa-remove'></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.Tabla de detalle ingresos -->
                <hr>
                <div class='form-group'>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Gastos de transporte Bs:</span>
                            <input type="number" class="form-control" placeholder="0.00" id="total_transporte" name="total_transporte" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Total Compra Bs:</span>
                            <input type="number" class="form-control" placeholder="0.00" id="suma_ganado" name="suma_ganado" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Importe en comision Bs:</span>
                            <input type="number" class="form-control" placeholder="0.00" id="importe_comision" name="importe_comision" required readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Importe total Bs:</span>
                            <input type="number" class="form-control" placeholder="0.00" id="total" name="total" required readonly="readonly">
                        </div>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-flat" href="<?php echo site_url("Formulario_Animales/Compra_animales") ?>" type="button">Volver</a>
                            <button type="submit" class="btn btn-warning btn-flat">Editar</button>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </form>
    </section>
    <!-- /.content -->
</div>

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
                                        <button type="button" class="btn btn-success btn-check-empleado" value="<?php echo $dataEmpleado; ?>"><span class="fa fa-check"></span></button>
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
<div class="modal fade" id="modal-ganaderos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Ganaderos</h4>
            </div>
            <div class="modal-body">
                <table id="tabla_ganadero" class="table table-bordered table-striped table-hover">
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
                        <?php if (!empty($ganaderos)) : ?>
                            <?php foreach ($ganaderos as $ganadero) : ?>

                                <tr>
                                    <td><?php echo $ganadero->id_ganadero; ?></td>
                                    <td><?php echo $ganadero->nombres; ?></td>
                                    <td><?php echo $ganadero->apellidos; ?></td>
                                    <td><?php echo $ganadero->carnet_identidad; ?></td>

                                    <?php $dataGanadero = $ganadero->id_ganadero . "*" . $ganadero->nombres . "*" . $ganadero->apellidos; ?>

                                    <td>
                                        <button type="button" class="btn btn-success btn-check-ganadero" value="<?php echo $dataGanadero; ?>"><span class="fa fa-check"></span></button>
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
<div class="modal fade" id="modal-estancia">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Estancia</h4>
            </div>
            <div class="modal-body">
                <table id="tabla_estancias" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Estancia</th>
                            <th>Representante</th>
                            <th>Departamento</th>
                            <th>Referencia</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($estancias)) : ?>
                            <?php foreach ($estancias as $estancia) : ?>

                                <tr>
                                    <td><?php echo $estancia->id_estancia; ?></td>
                                    <td><?php echo $estancia->nombre; ?></td>
                                    <td><?php echo $estancia->nombres; ?><?php echo $estancia->apellidos; ?></td>
                                    <td><?php echo $estancia->departamento; ?></td>
                                    <th><?php echo $estancia->referencia ?></th>
                                    <?php $dataEstancia = $estancia->id_estancia . "*" . $estancia->nombre; ?>

                                    <td>
                                        <button type="button" class="btn btn-success btn-check-estancia" value="<?php echo $dataEstancia; ?>"><span class="fa fa-check"></span></button>
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
<div class="modal fade" id="modal-transportista">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Ganaderos</h4>
            </div>
            <div class="modal-body">
                <table id="tabla_ganaderos" class="table table-bordered table-striped table-hover">
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
                        <?php if (!empty($transportistas)) : ?>
                            <?php foreach ($transportistas as $transportista) : ?>

                                <tr>
                                    <td><?php echo $transportista->id_transportista; ?></td>
                                    <td><?php echo $transportista->nombres; ?></td>
                                    <td><?php echo $transportista->apellidos; ?></td>
                                    <td><?php echo $transportista->carnet_identidad; ?></td>

                                    <?php $dataTransportista = $transportista->id_transportista . "*" . $transportista->nombres . "*" . $transportista->apellidos; ?>

                                    <td>
                                        <button type="button" class="btn btn-success btn-check-transportista" value="<?php echo $dataTransportista; ?>"><span class="fa fa-check"></span></button>
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
<div class="modal fade" id="modal-intermediario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Ganaderos</h4>
            </div>
            <div class="modal-body">
                <table id="tabla_intermediario" class="table table-bordered table-striped table-hover">
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
                        <?php if (!empty($intermediarios)) : ?>
                            <?php foreach ($intermediarios as $intermediario) : ?>

                                <tr>
                                    <td><?php echo $intermediario->id_intermediario; ?></td>
                                    <td><?php echo $intermediario->nombres; ?></td>
                                    <td><?php echo $intermediario->apellidos; ?></td>
                                    <td><?php echo $intermediario->carnet_identidad; ?></td>

                                    <?php $dataIntermediario = $intermediario->id_intermediario . "*" . $intermediario->nombres . "*" . $intermediario->apellidos; ?>

                                    <td>
                                        <button type="button" class="btn btn-success btn-check-intermediario" value="<?php echo $dataIntermediario; ?>"><span class="fa fa-check"></span></button>
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