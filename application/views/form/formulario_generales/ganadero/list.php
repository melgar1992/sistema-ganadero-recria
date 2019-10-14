 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Ganaderos
             <small>Listado</small>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box">
             <div class="box-header with-border">
                 <h3 class="box-title">Formulario de Ganadero</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                         <i class="fa fa-times"></i></button>
                 </div>
             </div>
             <div class="box-body">
                 <h4>Los campos con * son obligatorios, despues podran agregar mas estancia de ser necesario.</h4>

                 <?php if ($this->session->flashdata("error")) : ?>
                     <div class="alert alert-danger alert-dismissable">
                         <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                         <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                     </div>
                 <?php endif; ?>
                 <form method="POST" action="<?php echo base_url(); ?>Formularios_Generales/Ganadero/guardarGanadero" id="ganadero" class="form-horizontal form-label-left">
                 <input type="hidden" name="tipo_ganadero" value="externo" id="tipo_ganadero">

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
                         <h4>Listado de Ganaderos</h4>
                         <table id="example1" class="table table-bordered btn-hover">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nombres</th>
                                     <th>Apellidos</th>
                                     <th>Carnet de Indentidad</th>
                                     <th>Telefono</th>
                                     <th>Opciones</th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php if (!empty($ganaderos)) : ?>
                                 <?php foreach ($ganaderos as $ganadero) : ?>

                                     <tr>
                                         <td><?php echo $ganadero->id_ganadero; ?></td>
                                         <td><?php echo $ganadero->nombres; ?></td>
                                         <td><?php echo $ganadero->apellidos; ?></td>
                                         <td><?php echo $ganadero->carnet_identidad; ?></td>
                                         <td><?php echo $ganadero->telefono; ?></td>

                                         
                                         <td>
                                             <div class="btn-group">
                                                 <button type="button" class="btn btn-info btn-vista" data-toggle="modal" data-target="modal-default" value="<?php echo $ganadero->id_ganadero ?>"><span class="fa fa-search"></span></button>
                                                 <a href="<?php echo base_url() ?>Formularios_Generales/Ganadero/editar/<?php echo $ganadero->id_ganadero; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                 <button type="button" value="<?php echo $ganadero->id_ganadero;?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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