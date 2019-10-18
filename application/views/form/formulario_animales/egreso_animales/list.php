<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Egreso Animales
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
                            <a href="<?php echo site_url("Formulario_Animales/Venta_animales") ?>" type="button">Egreso_animales_bovinos</a>
                            <a href="<?php echo site_url("Formulario_Animales/Venta_animales") ?>" type="button">Egreso_animales</a>
                            
                                
                        </a>

                    </div>



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
                                <th>Nombre empleado</th>                         
                               <th>Fecha</th>
                                <th>Ingreso total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($ventas_animales)) : ?>
                                <?php foreach ($ventas_animales as $venta_animal) : ?>

                                    <tr>
                                        <td><?php echo $venta_animal->id_otros_ingresos; ?></td>
                                        <td><?php echo $venta_animal->nombres; ?></td>                                      
                                        <td><?php echo $venta_animal->fecha; ?></td>   
                                        <td><?php echo $venta_animal->total; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-vista-ingresos" data-toggle="modal" data-target="#modal-default" value="<?php echo $ingreso->id_otros_ingresos ?>"><span class="fa fa-search"></span></button>
                                                <a href="<?php echo base_url() ?>Formulario_Ingresos/Ingreso/editar/<?php echo $venta_animal->id_otros_ingresos; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                <button type="button" value="<?php echo $venta_animal->id_otros_ingresos; ?>" class="btn btn-danger btn-borrar"><span class="fa fa-remove"></span></button>
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

                    

                </div>

                <div class="modal-body">



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print">Imprimir</span></button>


                </div>

            </div>

            <!-- /.modal-content -->

        </div>

        <!-- /.modal-dialog -->

    </div>

    <!-- /.modal -->