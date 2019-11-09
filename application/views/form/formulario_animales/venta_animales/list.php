<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Salida de animales
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Opciones de venta</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="<?php echo site_url("Formulario_Animales/Venta_animales/addbovinos") ?>" class="btn btn-success">Venta animales bovinos</a>
                        <a href="<?php echo site_url("Formulario_Animales/Venta_animales/addanimales") ?>" class="btn btn-success">Venta animales</a>
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
                                    <th>Comprador</th>
                                    <th>Responsable Venta</th>
                                    <th>Fecha</th>
                                    <th>Tipo Venta</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($venta_animales)) : ?>
                                    <?php foreach ($venta_animales as $venta_animal) : ?>

                                        <tr>
                                            <td><?php echo $venta_animal->id_venta_animales ?></td>
                                            <td><?php echo $venta_animal->nombre_ganadero ?> <?php echo $venta_animal->apellido_ganadero ?></td>
                                            <td><?php echo $venta_animal->nombres; ?> <?php echo $venta_animal->apellidos;  ?></td>
                                            <td><?php echo $venta_animal->fecha; ?></td>
                                            <td><?php echo $venta_animal->tipo_venta ?></td>
                                            <td><?php echo number_format($venta_animal->total, 2); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-vista-ingresos" data-toggle="modal" data-target="#modal-default" value="<?php echo $venta_animal->id_venta_animales ?>"><span class="fa fa-search"></span></button>
                                                    <?php if ($venta_animal->tipo_venta == 'bovino') : ?>
                                                        <a href="<?php echo base_url() ?>Formulario_Animales/Venta_animales/editarBovinos/<?php echo $venta_animal->id_venta_animales; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php else :  ?>
                                                        <a href="<?php echo base_url() ?>Formulario_Animales/Venta_animales/editarAnimales/<?php echo $venta_animal->id_venta_animales; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif;  ?>
                                                    <button type="button" value="<?php echo $venta_animal->id_venta_animales; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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