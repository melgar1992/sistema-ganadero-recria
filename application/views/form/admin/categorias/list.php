 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Categorias
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


                 <form method="POST" action="<?php echo base_url(); ?>Mantenimiento/Categorias/guardarCategoria" id="categorias" class="form-horizontal form-label-left">
                     <div class="form-group <?php echo !empty(form_error("nombre"))?'has-error':'';?>">
                         <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="nombre" value="<?php echo set_value("nombre");?>"id="nombre" required="required" class="form-group col-md-7 col-xs-12" placeholder="Nombre de la Categoria">
                             <?php echo form_error("nombre","<span class='help-block col-md-4 cols-xs-12 '>","</span>");?>

                         </div>
                     </div>
                     <div class="form-group">
                         <label for="descripcion" class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="text" name="descripcion" id="descripcion" required="required" class="form-group col-md-7 col-xs-12" placeholder="Escriba una descripcion breve">

                         </div>
                     </div>



                     <div class="form-group">

                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button class="btn btn-primary btn-flat" type="reset">Borrar</button>
                             <button type="submit" id="guardar" class="btn btn-success">Guardar</button>

                         </div>
                     </div>

                 </form>

                 <hr>
                 <div class="row">
                     <div class="col-md-12">
                         <table id="example1" class="table table-bordered btn-hover">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nombres</th>
                                     <th>Descripcion</th>
                                     <th>Opciones</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (!empty($categorias)) : ?>
                                     <?php foreach ($categorias as $categoria) : ?>

                                         <tr>
                                             <td><?php echo $categoria->id_categorias; ?></td>
                                             <td><?php echo $categoria->nombre; ?></td>
                                             <td><?php echo $categoria->descripcion; ?></td>
                                             <td>
                                                 <div class="btn-group">
                                                     <button type="button" class="btn btn-info btn-vista" data-toggle="modal" data-target="modal-default" value="<?php echo $categoria->id_categorias ?>"><span class="fa fa-search"></span></button>
                                                     <a href="<?php echo base_url() ?>Mantenimiento/Categorias/editar/<?php echo $categoria->id_categorias; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                     <a href="<?php echo base_url();?>Mantenimiento/Categorias/borrar/<?php echo $categoria->id_categorias;?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></a>
                                                 </div>
                                             </td>
                                         </tr>
                                     <?php endforeach; ?>
                                 <?php endif; ?>

                             </tbody>
                         </table>
                     </div>
                 </div>
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

<h4 class="modal-title">Informacion de la Categoria</h4>

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