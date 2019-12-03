<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categoria Animales
     
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Categoria Animales</h3>

            </div>
            <div class="box-body">

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>


                <form method="POST" action="<?php echo base_url(); ?>Formulario_Animales/Categoria_animales/actualizarCategoriaAnimal" id="categorias" class="form-horizontal form-label-left">
                    <input type="hidden" value="<?php echo $categorias->id_tipo_animal; ?>" name="id_tipo_animal">
                    <div class="form-group">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select name="nombre" id="nombre" required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                                <?php foreach ($animales as $animal) : ?>
                                    <?php if ($animal == $categorias->nombre) : ?>
                                        <option value="<?php echo $animal ?>" selected><?php echo $animal?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $animal ?>"><?php echo $animal?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="raza" class="control-label col-md-3 col-sm-3 col-xs-12">Raza: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="raza" id="raza" value="<?php echo !empty(form_error("raza")) ? set_value("raza") : $categorias->raza ?>" required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="Escriba la raza">
                            <?php echo form_error("raza", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>



                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a class="btn btn-primary btn-flat" href="<?php echo site_url("Formulario_Animales/Categoria_animales") ?>" type="button">Volver</a>
                            <button type="submit" id="editar" class="btn btn-success">Editar</button>

                        </div>
                    </div>

                </form>

                <hr>

                <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->