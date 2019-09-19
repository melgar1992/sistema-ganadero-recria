<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Empleados
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de Empleado</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <p>Los campos con * son obligatorios, despues podran agregar mas estancia de ser necesario.</p>
                <p>Es necesario tener al menos 1 tipo cargo registrado, de no tener registrado uno hacer click <a href="<?php echo base_url(); ?>Formularios_Empleados/Tipo_cargo">aqui</a>.</p>
                <br/>

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formularios_Generales/Empleado/guardarEmpleado" id="empleado" class="form-horizontal form-label-left">
                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombres <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" value="<?php echo set_value('nombre') ?>" id=nombre required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                        <label for="apellidos" class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="apellidos" value="<?php echo set_value('apellidos') ?>" id=apellidos required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("apellidos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                        <label for="ci" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Identidad <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="ci" value="<?php echo set_value('ci') ?>" id=ci required="required" class="form-group col-md-7 col-xs-12">
                            <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                        <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Telefono <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="telefono" value="<?php echo set_value('telefono') ?>" id=telefono required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("tipo_cargo")) ? 'has-error' : ''; ?>">
                         <label for="tipo_cargo" class="control-label col-md-3 col-sm-3 col-xs-12">Tipos de Transporte <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <select name="tipo_cargo" id="tipo_cargo" required class="form-group col-md-7 col-xs-12">
                                 <option value=""></option>
                                 <?php foreach ($tipos_cargos as $tipo_cargo) : ?>
                                     <option value="<?php echo $tipo_cargo->id_tipos_cargos; ?>"><?php echo $tipo_cargo->cargo; ?></option>
                                 <?php endforeach; ?>
                             </select>
                             <?php echo form_error("tipo_cargo", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                    <div class="form-group">
                        <label for="direccion" class="control-label col-md-3 col-sm-3 col-xs-12">Direccion </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea rows="3" type="text" name="direccion" value="<?php echo set_value('direccion') ?>" id=direccion class="form-group col-md-7 col-xs-12" placeholder=""></textarea>
                            <?php echo form_error("direccion", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha_ingreso")) ? 'has-error' : ''; ?>">
                        <label for="fecha_ingreso" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Ingreso <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="fecha_ingreso" value="<?php echo set_value('fecha_ingreso') ?>" id=fecha_ingreso required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("fecha_ingreso", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("fecha_salida")) ? 'has-error' : ''; ?>">
                        <label for="fecha_salida" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha salida </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" name="fecha_salida" value="<?php echo set_value('fecha_salida') ?>" id=fecha_salida  class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("fecha_salida", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("sueldo")) ? 'has-error' : ''; ?>">
                        <label for="sueldo" class="control-label col-md-3 col-sm-3 col-xs-12">Sueldo del Empleado<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="sueldo" value="<?php echo set_value('sueldo') ?>" id=sueldo required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("sueldo", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("afp")) ? 'has-error' : ''; ?>">
                        <label for="afp" class="control-label col-md-3 col-sm-3 col-xs-12">Afp </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" readonly  name="afp" value="<?php echo set_value('afp') ?>" id=afp required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("afp", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("afp_empleador")) ? 'has-error' : ''; ?>">
                        <label for="afp_empleador" class="control-label col-md-3 col-sm-3 col-xs-12">Afp Empleador </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" readonly  name="afp_empleador" value="<?php echo set_value('afp_empleador') ?>" id=afp_empleador required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("afp_empleador", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("seguro_medico")) ? 'has-error' : ''; ?>">
                        <label for="seguro_medico" class="control-label col-md-3 col-sm-3 col-xs-12">Seguro medico</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number"  readonly name="seguro_medico" value="<?php echo set_value('seguro_medico') ?>" id=seguro_medico required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("seguro_medico", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("seguro_medico")) ? 'has-error' : ''; ?>">
                        <label for="seguro_medico" class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number"  readonly name="seguro_medico" value="<?php echo set_value('seguro_medico') ?>" id=seguro_medico required="required" class="form-group col-md-7 col-xs-12" placeholder="">
                            <?php echo form_error("seguro_medico", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
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

                <h4 class="modal-title">Informacion del Producto</h4>

            </div>

            <div class="modal-body">

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