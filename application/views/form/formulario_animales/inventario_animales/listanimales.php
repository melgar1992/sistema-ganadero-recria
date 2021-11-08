<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Inventario Animales 
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de Inventario Animales</h3>

            </div>
            <div class="box-body">
            <h4> Los campos con * son obligatorios</h4>
                <br> </br>
                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>


                <form method="POST" action="<?php echo base_url(); ?>Formulario_Animales/Inventario_animales/guardarAnimal" id="inventario_animal" class="form-horizontal form-label-left">

                    <div class='form-group'>
                        <label for="estancia" class="control-label col-md-3 col-sm-3 col-xs-12">Estancia: *</label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11 <?php echo !empty(form_error("estancia")) ? 'has-error' : ''; ?>">
                            <input type="hidden" name="id_estancia" value="" id="id_estancia">
                            <input type="text" class="form-control" required placeholder="estancia" readonly name="estancia" id="estancia">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-estancia"><span class="fa fa-search"></span> Buscar</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cantidad" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <input type="number" name="cantidad" id="cantidad" required="required" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoria" class="control-label col-md-3 col-sm-3 col-xs-12">Familia Animal<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select type="text" name="categoria" id="categoria" class="categ form-control" required="required" class="form-control">
                                <option value=""></option>
                                <option value="Equino">Equino</option>
                                <option value="Familia Cerdos">Familia Cerdos </option>
                                <option value="Aves">Aves </option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="raza" class="control-label col-md-3 col-sm-3 col-xs-12">Raza<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select id="raza" disable name="raza" class="form-control raz">
                                <option value=""></option>
                               
                            </select>
                            <?php echo form_error("raza", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label col-md-3 col-sm-3 col-xs-12">sexo<span class="required">: *</span></label>
                        <div class="input-group col-md-4 col-sm-6 col-xs-11">
                            <select id="sex" name="sex" class="form-control">
                                <option value="M">Macho</option>
                                <option value="H">Hembra</option>
                            </select>
                            <?php echo form_error("sex", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
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
                                    <th>Estancia</th>
                                    <th>Familia Animales</th>
                                    <th>Raza</th>
                                    <th>Sexo</th>
                                    <th>Stock</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($stock_estancias_bovinos)) : ?>
                                    <?php foreach ($stock_estancias_bovinos as $stock_estancia_bovinos) : ?>

                                        <tr>
                                            <td><?php echo $stock_estancia_bovinos->id_animal; ?></td>
                                            <td><?php echo $stock_estancia_bovinos->nombre_estancia; ?></td>
                                            <td><?php echo $stock_estancia_bovinos->categoria; ?></td>
                                            <td><?php echo $stock_estancia_bovinos->raza; ?></td>
                                            <td><?php echo $stock_estancia_bovinos->sexo; ?></td>
                                            <td><?php echo $stock_estancia_bovinos->stock; ?></td>
                                            <?php $data_stock_estancia_bovinos = $stock_estancia_bovinos->id_animal . "*" . $stock_estancia_bovinos->id_estancia . "*" . $stock_estancia_bovinos->id_tipo_animal . "*" . $stock_estancia_bovinos->nombre_estancia . "*" . $stock_estancia_bovinos->categoria . "*" . $stock_estancia_bovinos->raza . "*" . $stock_estancia_bovinos->sexo . "*" . $stock_estancia_bovinos->stock; ?>
                                            <td>
                                                <a href="<?php echo base_url() ?>Formulario_Animales/Inventario_animales/editarAnimal/<?php echo $stock_estancia_bovinos->id_animal; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                <button type="button" value="<?php echo $stock_estancia_bovinos->id_animal; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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

<div class="modal fade" id="modal-estancia">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Estancia</h4>
            </div>
            <div class="modal-body">
                <table id="tabla_estancias" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Estancia</th>
                            <th>Representante</th>
                            <th>Departamento</th>
                            <th>Referencia</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($estancias)) : ?>
                            <?php foreach ($estancias as $estancia) : ?>

                                <tr>
                                    <td><?php echo $estancia->id_estancia; ?></td>
                                    <td><?php echo $estancia->nombre; ?></td>
                                    <td><?php echo $estancia->nombres; ?><?php echo $estancia->apellidos; ?></td>
                                    <td><?php echo $estancia->departamento; ?></td>
                                    <th><?php echo $estancia->referencia ?></th>
                                    <?php $dataEstancia = $estancia->id_estancia . "*" . $estancia->nombre; ?>

                                    <td>
                                        <button type="button" class="btn btn-success btn-check-estancia" value="<?php echo $dataEstancia; ?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>

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