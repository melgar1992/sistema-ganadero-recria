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
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="<?php echo site_url("Formulario_Egresos/Pago_empleado") ?>" class="btn btn-primary btn-flat">Volver</a>
                        <a href="<?php echo site_url("Formulario_Egresos/Pago_empleado") ?>" class="btn btn-primary btn-flat">Volver</a>
                        <a href="<?php echo site_url("Formulario_Egresos/Pago_empleado") ?>" class="btn btn-primary btn-flat">Volver</a>
                        <a href="<?php echo site_url("Formulario_Egresos/Pago_empleado") ?>" class="btn btn-primary btn-flat">Volver</a>
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
                            <?php if (!empty($ingresos)) : ?>
                                <?php foreach ($ingresos as $ingreso) : ?>

                                    <tr>
                                        <td><?php echo $ingreso->id_otros_ingresos; ?></td>
                                        <td><?php echo $ingreso->nombres; ?></td>
                                        <td><?php echo $ingreso->nombre_categoria_ingreso; ?></td>
                                        <td><?php echo $ingreso->fecha; ?></td>
                                        <td><?php echo $ingreso->forma_pago; ?></td>
                                        <td><?php echo $ingreso->total; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-vista-ingresos" data-toggle="modal" data-target="#modal-default" value="<?php echo $ingreso->id_otros_ingresos ?>"><span class="fa fa-search"></span></button>
                                                <a href="<?php echo base_url() ?>Formulario_Ingresos/Ingreso/editar/<?php echo $ingreso->id_otros_ingresos; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                <button type="button" value="<?php echo $ingreso->id_otros_ingresos; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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