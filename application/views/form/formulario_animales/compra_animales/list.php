<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ingresos Animales
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
        <div class="box-header with-border">
                <h3 class="box-title">Opciones de Compra</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="<?php echo site_url("Formulario_Animales/Compra_animales/addbovinos") ?>" class="btn btn-success">Compra animales bovinos</a>
                        <a href="<?php echo site_url("Formulario_Animales/Compra_animales/addanimales") ?>" class="btn btn-success">Compra animales</a>
                    </div>

                </div>

                <br>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Vendedor</th>
                                    <th>Responsable Compra</th>
                                    <th>Fecha</th>
                                    <th>Tipo Compra</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($compra_animales)) : ?>
                                    <?php foreach ($compra_animales as $compra_animal) : ?>

                                        <tr>
                                            <td><?php echo $compra_animal->id_compra_animales ?></td>
                                            <td><?php echo $compra_animal->nombre_ganadero ?> <?php echo $compra_animal->apellido_ganadero ?></td>
                                            <td><?php echo $compra_animal->nombres; ?> <?php echo $compra_animal->apellidos;  ?></td>
                                            <td><?php echo $compra_animal->fecha; ?></td>
                                            <td><?php echo $compra_animal->tipo_compra ?></td>
                                            <td><?php echo number_format($compra_animal->total, 2); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                  
                                                    <?php if ($compra_animal->tipo_compra == 'bovino') : ?>
                                                        <a href="<?php echo base_url() ?>Formulario_Animales/Compra_animales/editarBovinos/<?php echo $compra_animal->id_compra_animales; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php else :  ?>
                                                        <a href="<?php echo base_url() ?>Formulario_Animales/Compra_animales/editarAnimales/<?php echo $compra_animal->id_compra_animales; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif;  ?>
                                                    <button type="button" value="<?php echo $compra_animal->id_compra_animales; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>