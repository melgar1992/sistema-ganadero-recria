<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Intermediario
         
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box">
             <div class="box-header with-border">
                 <h3 class="box-title">Editar Intermediario</h3>

                 
             </div>
             <div class="box-body">

                 <?php if ($this->session->flashdata("error")) : ?>
                     <div class="alert alert-danger alert-dismissable">
                         <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                         <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                     </div>
                 <?php endif; ?>
                 <form method="POST" action="<?php echo base_url(); ?>Formularios_Generales/Intermediario/ActualizarIntermediario" id="tipo_intermediario" class="form-horizontal form-label-left">
                     <input type="hidden" value="<?php echo $intermediario->id_intermediario; ?>" name="id_intermediario">
                     <input type="hidden" value="<?php echo $intermediario->id_persona; ?>" name="id_persona">

                     <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                         <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $intermediario->nombres ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                         <label for="apellidos" class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="apellidos" value="<?php echo !empty(form_error("apellidos")) ? set_value("apellidos") : $intermediario->apellidos ?>" id=apellidos required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("apellidos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                         <label for="ci" class="control-label col-md-3 col-sm-3 col-xs-12">Carnet de Identidad: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="ci" value="<?php echo !empty(form_error("ci")) ? set_value("ci") : $intermediario->carnet_identidad ?>" id=ci required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                         <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Telefono: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="telefono" value="<?php echo !empty(form_error("telefono")) ? set_value("telefono") : $intermediario->telefono ?>" id=telefono required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     
                     
                     <div class="in_solid"></div>

                     <br> </br>

                     <div class="form-group">

                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <a href="<?php echo site_url("Formularios_Generales/Intermediario") ?>" class="btn btn-primary btn-flat" >Volver</a>
                             <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                         </div>
                     </div>

                     <div class="in_solid"></div>

                 </form>


     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->