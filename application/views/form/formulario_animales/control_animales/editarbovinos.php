<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Control Animales Bovinos
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

            </div>
            <div class="box-body">

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>


                <form method="POST" action="<?php echo base_url(); ?>Formulario_Animales/control_animales/actualizarControlBovino" id="control_animal_bovino" class="form-horizontal form-label-left">
                    <input type="hidden" class="form-control" value="<?php echo $control_bovino->id_detalle_venta_animales ?>"  name="id_detalle_venta_animales" id="id_detalle_venta_animales">
                    <div class='form-group'>
                        <label for="estancia" class="control-label col-md-3 col-sm-3 col-xs-12">Estancia*:</label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11 <?php echo !empty(form_error("estancia")) ? 'has-error' : ''; ?>">
                            <input type="hidden" name="id_estancia" value="<?php echo $control_bovino->id_estancia ?>" id="id_estancia">
                            <input type="text" class="form-control" placeholder="estancia" value="<?php echo $control_bovino->nombre_estancia ?>" readonly name="estancia" id="estancia">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-estancia"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                            <?php echo form_error("estancia", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cantidad" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad<span class="required">*:</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="number" name="cantidad" id="cantidad" value="<?php echo $control_bovino->cantidad ?>" required="required" class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo_movimiento" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de control<span class="required">*:</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select type="text" name="tipo_movimiento" required="required" class="form-control">
                                <option value=""></option>
                                <option value="Muerte" <?php echo ($control_bovino->tipo_movimiento == 'Muerte') ? 'selected' : ''; ?>>Muerte</option>
                                <option value="Nacimiento" <?php echo ($control_bovino->tipo_movimiento == 'Nacimiento') ? 'selected' : ''; ?>>Nacimiento</option>
                                <option value="Conteo" <?php echo ($control_bovino->tipo_movimiento == 'Conteo') ? 'selected' : ''; ?>>Conteo </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha")) ? 'has-error' : ''; ?>">
                        <label for="fecha" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha<span class="required">*:</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="date" name="fecha" value="<?php echo $control_bovino->fecha ?>" id=fecha required="required" class="form-control" placeholder="">
                            <?php echo form_error("fecha", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="raza" class="control-label col-md-3 col-sm-3 col-xs-12">Raza<span class="required">*:</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select id="raza" name="raza" required class="form-control">
                                <option value=""></option>
                                <?php foreach ($tipo_animales as $tipo_animale) : ?>
                                    <?php if ($control_bovino->id_tipo_animal == $tipo_animale->id_tipo_animal) : ?>
                                        <option value="<?php echo $tipo_animale->id_tipo_animal; ?>" selected><?php echo $tipo_animale->raza; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $tipo_animale->id_tipo_animal; ?>"><?php echo $tipo_animale->raza; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error("raza", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoria" class="control-label col-md-3 col-sm-3 col-xs-12">categoria<span class="required">*:</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select type="text" name="categoria" id="categoria" class="categoria form-control" required="required" class="form-control">
                                <option value=""></option>
                                <option value="12" <?php echo ($control_bovino->categoria == '12') ? 'selected' : ''; ?>>12</option>
                                <option value="12 - 24 " <?php echo ($control_bovino->categoria == '12 - 24 ') ? 'selected' : ''; ?>>12 - 24</option>
                                <option value="24 - 36" <?php echo ($control_bovino->categoria == '24 - 36') ? 'selected' : ''; ?>>24 - 36</option>
                                <option value="36" <?php echo ($control_bovino->categoria == '36') ? 'selected' : ''; ?>>36</option>
                                <option value="Bueyes" <?php echo ($control_bovino->categoria == 'Bueyes') ? 'selected' : ''; ?>>Bueyes</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label col-md-3 col-sm-3 col-xs-12">sexo<span class="required">*</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select id="sex" name="sexo" required class="form-control">
                                <option value="M" <?php echo ($control_bovino->sexo == 'M') ?>>Macho</option>
                                <option value="H" <?php echo ($control_bovino->sexo == 'H') ?>>Hembra</option>
                            </select>
                            <?php echo form_error("sex", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?php echo site_url("Formulario_Animales/control_animales/listbovino") ?>" class="btn btn-primary btn-flat">Volver</a>
                            <button type="submit" id="guardar" class="btn btn-warning">Editar</button>

                        </div>
                    </div>

                </form>


                <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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