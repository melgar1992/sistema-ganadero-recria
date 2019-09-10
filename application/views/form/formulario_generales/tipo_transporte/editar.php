 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Tipos de Transporte
             <small>Listado</small>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box">
             <div class="box-header with-border">
                 <h3 class="box-title">Formulario</h3>

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
                 <form method="POST" action="<?php echo base_url();?>Formularios_Generales/Tipo_transporte/ActualizarTipoTransporte" id="tipo_transporte" class="form-horizontal form-label-left">
                 <input type="hidden" value="<?php echo $tipo_transporte->id_tipo_transporte;?>" name= "id_tipo_transporte">
                     <div class="form-group <?php echo !empty(form_error("nombre"))?'has-error':'';?>">
                         <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del tipo del transporte <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre"))? set_value("nombre"):$tipo_transporte->nombres?>" id=nombre required="required" class="form-group col-md-7 col-xs-12" placeholder="Camiones, Fluvial, Arreo de Ganado, Etc.">
                             <?php echo form_error("nombre","<span class='help-block col-md-4 cols-xs-12 '>","</span>");?>
                         </div>
                     </div>

                     <div class="in_solid"></div>

                     <br>

                     <div class="form-group">

                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <a href="<?php echo site_url("Formularios_Generales/Tipo_transporte")?>" class="btn btn-primary btn-flat" type="reset">Volver</a>
                             <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                         </div>
                     </div>

                     <div class="in_solid"></div>

                 </form>

               
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->