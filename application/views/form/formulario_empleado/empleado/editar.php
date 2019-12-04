<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Empleados
            <small></small>
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

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formulario_Empleados/Empleado/actualizarEmpleado" id="contrato_empleado" class="form-horizontal form-label-left">
                    <input type="hidden" value="<?php echo $empleado->id_contrato_empleado; ?>" name="id_contrato_empleado">
                    <input type="hidden" value="<?php echo $empleado->id_persona; ?>" name="id_persona">
                    <input type="hidden" value="<?php echo $empleado->id_empleado; ?>" name="id_empleado">

                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $empleado->nombres ?>" id=nombre required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                        <label for="apellidos" class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="apellidos" value="<?php echo !empty(form_error("apellidos")) ? set_value("apellidos") : $empleado->apellidos ?>" id=apellidos required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("apellidos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                        <label for="ci" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Identidad: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="ci" value="<?php echo !empty(form_error("ci")) ? set_value("ci") : $empleado->carnet_identidad ?>" id=ci required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                        <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Telefono: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="telefono" value="<?php echo !empty(form_error("telefono")) ? set_value("telefono") : $empleado->telefono ?>" id=telefono required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo_cargo" class="control-label col-md-3 col-sm-3 col-xs-12">Cargo del empleado: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select name="tipo_cargo" id="tipo_cargo" required="required" class="form-control col-md-3 col-xs-12">
                                <?php foreach ($tipos_cargos as $tipo_cargo) : ?>
                                    <?php if ($tipo_cargo->id_tipos_cargos == $empleado->id_tipos_cargos) : ?>
                                        <option value="<?php echo $tipo_cargo->id_tipos_cargos; ?>" selected><?php echo $tipo_cargo->cargo; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $tipo_cargo->id_tipos_cargos; ?>"><?php echo $tipo_cargo->cargo; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("direccion")) ? 'has-error' : ''; ?>">
                        <label for="direccion" class="control-label col-md-3 col-sm-3 col-xs-12">Direccion: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <textarea rows="3" type="text" name="direccion"  id=direccion required="required" class="form-control col-md-3 col-xs-12" placeholder=""><?php echo !empty(form_error("direccion")) ? set_value("direccion") : $empleado->direccion ?></textarea>
                            <?php echo form_error("direccion", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha_ingreso")) ? 'has-error' : ''; ?>">
                        <label for="fecha_ingreso" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Ingreso: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="date" name="fecha_ingreso" value="<?php echo !empty(form_error("fecha_ingreso")) ? set_value("fecha_ingreso") : $empleado->fecha_ingreso ?>" id=fecha_ingreso required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("fecha_ingreso", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha_salida")) ? 'has-error' : ''; ?>">
                        <label for="fecha_salida" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Salida: </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="date" name="fecha_salida" value="<?php echo !empty(form_error("fecha_salida")) ? set_value("fecha_salida") : $empleado->fecha_salida ?>" id=fecha_salida  class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("fecha_salida", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("sueldo")) ? 'has-error' : ''; ?>">
                        <label for="sueldo" class="control-label col-md-3 col-sm-3 col-xs-12">Sueldo base: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" name="sueldo" value="<?php echo !empty(form_error("sueldo")) ? set_value("sueldo") : $empleado->sueldo ?>" id=sueldo required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("sueldo", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("afp_empleado")) ? 'has-error' : ''; ?>">
                        <label for="afp_empleado" class="control-label col-md-3 col-sm-3 col-xs-12">Afp del empleado: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" readonly name="afp_empleado" value="<?php echo !empty(form_error("afp_empleado")) ? set_value("afp_empleado") : $empleado->afp_empleado ?>" id=afp_empleado required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("afp_empleado", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("afp_empleador")) ? 'has-error' : ''; ?>">
                        <label for="afp_empleador" class="control-label col-md-3 col-sm-3 col-xs-12">Afp del empleador: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" readonly name="afp_empleador" value="<?php echo !empty(form_error("afp_empleador")) ? set_value("afp_empleador") : $empleado->afp_empleador ?>" id=afp_empleador required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("afp_empleador", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("caja_nacional")) ? 'has-error' : ''; ?>">
                        <label for="caja_nacional" class="control-label col-md-3 col-sm-3 col-xs-12">Seguro caja nacional: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" readonly name="caja_nacional" value="<?php echo !empty(form_error("caja_nacional")) ? set_value("caja_nacional") : $empleado->caja_nacional ?>" id=caja_nacional required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("caja_nacional", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("sueldo_liquido")) ? 'has-error' : ''; ?>">
                        <label for="sueldo_liquido" class="control-label col-md-3 col-sm-3 col-xs-12">Sueldo Liquido: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" readonly name="sueldo_liquido" value="<?php echo !empty(form_error("sueldo_liquido")) ? set_value("sueldo_liquido") : $empleado->sueldo_liquido ?>" id=sueldo_liquido required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("sueldo_liquido", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("sueldo_total")) ? 'has-error' : ''; ?>">
                        <label for="sueldo_total" class="control-label col-md-3 col-sm-3 col-xs-12">Sueldo Total: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" readonly name="sueldo_total" value="<?php echo !empty(form_error("sueldo_total")) ? set_value("sueldo_total") : $empleado->sueldo_total ?>" id=sueldo_total required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("sueldo_total", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="in_solid"></div>

                    <br>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary btn-flat" href="<?php echo site_url("Formulario_Empleados/Empleado")?>" type="button">Volver</a>
                            <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                        </div>
                    </div>

                    <div class="in_solid"></div>

                </form>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->