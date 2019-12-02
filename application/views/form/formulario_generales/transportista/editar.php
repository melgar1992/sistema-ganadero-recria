 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Transportista
           
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box">
             <div class="box-header with-border">
                 <h3 class="box-title">Editar Transportista </h3>

                 
             </div>
             <div class="box-body">

                 <?php if ($this->session->flashdata("error")) : ?>
                     <div class="alert alert-danger alert-dismissable">
                         <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                         <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                     </div>
                 <?php endif; ?>
                 <form method="POST" action="<?php echo base_url(); ?>Formularios_Generales/Transportista/ActualizarTransportista" id="tipo_transporte" class="form-horizontal form-label-left">
                     <input type="hidden" value="<?php echo $transportista->id_transportista; ?>" name="id_transportista">
                     <input type="hidden" value="<?php echo $transportista->id_persona; ?>" name="id_persona">

                     <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                         <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $transportista->nombres ?>" id=nombre required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("apellidos")) ? 'has-error' : ''; ?>">
                         <label for="apellidos" class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="apellidos" value="<?php echo !empty(form_error("apellidos")) ? set_value("apellidos") : $transportista->apellidos ?>" id=apellidos required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("apellidos", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("ci")) ? 'has-error' : ''; ?>">
                         <label for="ci" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Identidad: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="ci" value="<?php echo !empty(form_error("ci")) ? set_value("ci") : $transportista->carnet_identidad ?>" id=ci required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("ci", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("telefono")) ? 'has-error' : ''; ?>">
                         <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Telefono: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="telefono" value="<?php echo !empty(form_error("telefono")) ? set_value("telefono") : $transportista->telefono ?>" id=telefono required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("telefono", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group <?php echo !empty(form_error("trayecto")) ? 'has-error' : ''; ?>">
                         <label for="trayecto" class="control-label col-md-3 col-sm-3 col-xs-12">Trayecto de trabajo: <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <input type="text" name="trayecto" value="<?php echo !empty(form_error("trayecto")) ? set_value("trayecto") : $transportista->trayecto ?>" id=trayecto required="required" class="form-control col-md-3 col-sm-3 col-xs-12" placeholder="">
                             <?php echo form_error("trayecto", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="tipo_transporte" class="control-label col-md-3 col-sm-3 col-xs-12">tipo transporte <span class="required">*</span></label>
                         <div class="col-md-4 col-sm-6 col-xs-12">
                             <select name="tipo_transporte" id="tipo_transporte" required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                                 <?php foreach ($tipo_transportes as $tipo_transporte) : ?>
                                     <?php if ($tipo_transporte->id_tipo_transporte == $transportista->id_tipo_transporte) : ?>
                                         <option value="<?php echo $tipo_transporte->id_tipo_transporte; ?>" selected><?php echo $tipo_transporte->nombres; ?></option>
                                     <?php else : ?>
                                         <option value="<?php echo $tipo_transporte->id_tipo_transporte; ?>"><?php echo $tipo_transporte->nombres; ?></option>
                                     <?php endif; ?>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>

                     <div class="in_solid"></div>

                     <br>

                     <div class="form-group">

                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <a href="<?php echo site_url("Formularios_Generales/Transportista") ?>" class="btn btn-primary btn-flat" >Volver</a>
                             <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                         </div>
                     </div>

                     <div class="in_solid"></div>

                 </form>


     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->