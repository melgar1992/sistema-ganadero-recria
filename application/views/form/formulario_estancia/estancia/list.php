<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Estancias
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de Estancias</h3>


            </div>
            <div class="box-body">
                <h4>Los campos con * son obligatorios.</h4>

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formulario_Estancia/Estancia/guardarEstancia" id="estancia" class="form-horizontal form-label-left">
                    <div class='form-group'>
                        <label for="empleado" class="control-label col-md-3 col-sm-3 col-xs-12">Representante de la estancia: <span class="required">*</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-12 <?php echo !empty(form_error("empleado")) ? 'has-error' : ''; ?>">
                            <input type="hidden" name="id_empleado" value="" id="id_empleado">
                            <input type="text" class="form-control" readonly required='required' id="empleado">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                            <?php echo form_error("empelado", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de la Estancia: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" value="" id=nombre required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="departamento" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento: </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="departamento" required name="departamento" class="form-control col-md-3 col-xs-12">
                                <option value=""></option>
                                <option value="Pando">Pando</option>
                                <option value="Beni">Beni</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Cochabamba">Cochabamba</option>
                                <option value="La Paz">La Paz</option>
                                <option value="Sucre">Sucre</option>
                                <option value="Potosi">Potosi</option>
                                <option value="Tarija">Tarija</option>
                                <option value="Oruro">Oruro</option>
                            </select>
                            <?php echo form_error("departamento", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("provincia")) ? 'has-error' : ''; ?>">
                        <label for="provincia" class="control-label col-md-3 col-sm-3 col-xs-12">Provincia: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="provincia" value="" id=provincia required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("provincia", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("municipio")) ? 'has-error' : ''; ?>">
                        <label for="municipio" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="municipio" value="" id=municipio required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("municipio", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("referencia")) ? 'has-error' : ''; ?>">
                        <label for="referencia" class="control-label col-md-3 col-sm-3 col-xs-12">Referencia: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <textarea rows='3' name="referencia" value="" id=referencia required="required" class="form-control col-md-3 col-xs-12" placeholder=""></textarea>
                            <?php echo form_error("referencia", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
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
                                    <th>Propietario</th>
                                    <th>Nombre de la Estancia</th>
                                    <th>Departamento</th>
                                    <th>Provincia</th>
                                    <th>Municipio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($estancias)) : ?>
                                    <?php foreach ($estancias as $estancia) : ?>

                                        <tr>
                                            <td><?php echo $estancia->id_estancia; ?></td>
                                            <td><?php echo $estancia->nombres; ?> <?php echo $estancia->apellidos; ?></td>
                                            <td><?php echo $estancia->nombre; ?></td>
                                            <td><?php echo $estancia->departamento; ?></td>
                                            <td><?php echo $estancia->provincia; ?></td>
                                            <td><?php echo $estancia->municipio; ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url() ?>Formulario_Estancia/Estancia/editar/<?php echo $estancia->id_estancia; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <button type="button" value="<?php echo $estancia->id_estancia; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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