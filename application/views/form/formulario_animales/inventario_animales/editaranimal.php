<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Inventario Animales 
       
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Inventario Animales </h3>

            </div>
            <div class="box-body">

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>


                <form method="POST" action="<?php echo base_url(); ?>Formulario_Animales/Inventario_animales/actualizarAnimal" id="inventario_animal" class="form-horizontal form-label-left">
                    <input type="hidden" name="id_animal" value="<?php echo $animal->id_animal ?>" id="id_animal">
                    <div class='form-group'>
                        <label for="estancia" class="control-label col-md-3 col-sm-3 col-xs-12">Estancia: *</label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11 <?php echo !empty(form_error("estancia")) ? 'has-error' : ''; ?>">
                            <input type="hidden" name="id_estancia" value="<?php echo $animal->id_estancia ?>" id="id_estancia">
                            <input type="text" class="form-control" value="<?php echo $animal->nombre_estancia ?>" placeholder="estancia" readonly name="estancia" id="estancia">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-estancia"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cantidad" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="number" value="<?php echo $animal->stock ?>" name="cantidad" id="cantidad" required="required" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoria" class="control-label col-md-3 col-sm-3 col-xs-12">Familia Animal<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select type="text" disabled name="categoria" id="categoria" class="categ form-control" required="required" class="form-control">
                            <option value="<?php echo $animal->categoria ?>" selected><?php echo $animal->categoria ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="raza" class="control-label col-md-3 col-sm-3 col-xs-12">Raza<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select id="raza" disabled name="raza" class="form-control raz">
                                <option value="<?php echo $animal->id_tipo_animal ?>" selected><?php echo $animal->raza ?></option>
                               
                            </select>
                            <?php echo form_error("raza", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label col-md-3 col-sm-3 col-xs-12">sexo<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="text" disabled value="<?php echo $animal->sexo ?>" id="sex" name="sex" class="form-control">
                                
                            <?php echo form_error("sex", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?php echo site_url("Formulario_Animales/Inventario_animales/listAnimales") ?>" class="btn btn-primary btn-flat">Volver</a>
                            <button type="submit" id="guardar" class="btn btn-warning">Editar</button>

                        </div>
                    </div>

                </form>

                <hr>
              
                <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->