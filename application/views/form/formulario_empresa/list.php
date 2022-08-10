<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Datos de la empresa
        </h1>

    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                <p>Los siguientes datos son de la empresa</p>
                <br>


                <form method="POST" action="<?php echo base_url(); ?>Formulario_empresa/Empresa/guardarEmpresa" id="empleado" class="form-horizontal form-label-left">
                    <input type="hidden" name="id" id="id" value="<?php if (isset($empresa)) {
                                                                        echo $empresa['id_datos_empresa'];
                                                                    } else {
                                                                        echo '0';
                                                                    } ?>">
                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" value="<?php if (isset($empresa)) {
                                                                        echo $empresa['nombre'];
                                                                    } ?>" id=nombre required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                        <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Telefono: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" name="telefono" value="<?php if (isset($empresa)) {
                                                                            echo $empresa['telefono'];
                                                                        } ?>" id=telefono required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="control-label col-md-3 col-sm-3 col-xs-12">descripcion: </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <textarea rows="3" type="text" name="descripcion" value="" id=descripcion class="form-control col-md-3 col-xs-12" placeholder=""><?php if (isset($empresa)) {
                                                                                                                                                                    echo $empresa['descripcion'];
                                                                                                                                                                } ?></textarea>
                            <?php echo form_error("descripcion", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
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
            </div>
        </div>
    </section>

</div>