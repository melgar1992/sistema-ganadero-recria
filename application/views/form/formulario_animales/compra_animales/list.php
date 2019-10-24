<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ingresos
            <small>Listado</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="<?php echo site_url("Formulario_Animales/Compra_animales/addbovinos") ?>" class="btn btn-primary btn-flat">Compra animales bovinos</a>
                        <a href="<?php echo site_url("Formulario_Animales/Compra_animales/addanimales") ?>" class="btn btn-primary btn-flat">Compra animales</a>
                    </div>

                </div>
            </div>

            </form>

            <!-- /.box -->
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered btn-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre empleado</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($compra_animales)) : ?>
                                <?php foreach ($compra_animales as $compra_animal) : ?>

                                    <tr>
                                        <td><?php echo $compra_animal->id_compra_animales ?></td>
                                        <td><?php echo $compra_animal->nombres;
                                                    echo $compra_animal->apellidos;  ?></td>
                                        <td><?php echo $compra_animal->fecha; ?></td>
                                        <td><?php echo $compra_animal->total; ?></td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-vista-ingresos" data-toggle="modal" data-target="#modal-default" value="<?php echo $compra_animal->id_compra_animales ?>"><span class="fa fa-search"></span></button>
                                            <a href="<?php echo base_url() ?>Formulario_Ingresos/Ingreso/editar/<?php echo $compra_animal->id_compra_animales; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
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
    </section>
    <!-- /.content -->
</div>