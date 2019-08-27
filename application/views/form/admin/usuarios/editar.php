  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Editar
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


                  <form action= "<?php echo base_url();?>Administrador/Usuarios/actualizar" method="POST" class="form-horizontal form-label-left">
                  <input type="hidden" name="idusuario" value="<?php echo $usuario->id_usuarios; ?>">

                      <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                          <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id= "nombres" name="nombre" value="<?php echo $usuario->nombres;?> " class="form-group col-md-7 col-xs-12" >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="apellidos" class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="apellidos" id="apellidos" value="<?php echo $usuario->apellidos;?>" class="form-group col-md-7 col-xs-12" >

                          </div>

                      </div>
                      <div class="form-group">
                          <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="telefono" value="<?php echo $usuario->telefono;?>" class="form-group col-md-7 col-xs-12" >

                          </div>
                      </div>
                      <div class="form-group">
                          <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="email" id="email" value="<?php echo $usuario->email;?>" class="form-group col-md-7 col-xs-12" >

                          </div>
                      </div>
                      <div class="form-group">
                          <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Usuario <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="username" id="username" value="<?php echo $usuario->username;?>" class="form-group col-md-7 col-xs-12">

                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="roles" class="control-label col-md-3 col-sm-3 col-xs-12">Roles <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="roles" id="roles" required="required" class="form-group col-md-7 col-xs-12">
                                  <?php foreach ($roles as $rol) : ?>
                                  <option value="<?php echo $rol->id_roles; ?>"<?php echo $rol->id_roles == $usuario->id_roles ? "selected":"";?>><?php echo $rol->nombres; ?></option>
                                  <?php endforeach; ?>
                              </select>

                          </div>
                      </div>






                      <div class="form-group">

                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary btn-flat" href="<?php echo site_url("Administrador/Usuarios")?>" type="button">Volver</a>
                              <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                          </div>
                      </div>

                  </form>

                  <hr>
               
                  <!-- /.box -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  