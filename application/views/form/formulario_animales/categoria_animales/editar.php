<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categorias Animales
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
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
                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       
                         
                        <select name="animales[]" id="animales"  required="required" class="form-group col-md-7 col-xs-12">  
                        <option value="Bovino">Bovino</option>
                                <option value="Equino">Equino</option>
                                <option value="Familia Cerdos">Familia Cerdos </option>
                                <option value="Aves">Aves </option>
                              
                                <?php $animal= $_POST['animales[]']?>
                                </select>
                                <?php foreach ($categorias as $categoria) : ?>
                                    <?php if ($categoria->nombre == $animal) : ?>
                                        <option value="<?php echo $categoria->nombre; ?>" selected><?php echo $categoria->nombre; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $categoria->nombre; ?>"><?php echo $categoria->nombre; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                             
                            




                        </div>
                    </div>


                    <div class="form-group">
                    <?php echo form_error("raza","<span class='help-block col-md-4 cols-xs-12 '>","</span>");?>
                        <label for="raza" class="control-label col-md-3 col-sm-3 col-xs-12">Raza <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="raza" id="raza" value="<?php echo $categorias->raza ?>" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba la raza">

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