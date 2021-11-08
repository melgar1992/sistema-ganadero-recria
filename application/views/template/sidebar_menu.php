        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Navegacion principal</li>
                    <li>
                        <a href="<?php echo base_url(); ?>">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Formularios Generales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>Formularios_Generales/Ganadero"><i class="fa fa-circle-o"></i> Ganadero</a></li>
                            <li><a href="<?php echo base_url(); ?>Formularios_Generales/Tipo_transporte"><i class="fa fa-circle-o"></i> Tipo de Transporte</a></li>
                            <li><a href="<?php echo base_url(); ?>Formularios_Generales/Transportista"><i class="fa fa-circle-o"></i> Transportista</a></li>
                            <li><a href="<?php echo base_url(); ?>Formularios_Generales/Intermediario"><i class="fa fa-circle-o"></i> Intermediario</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa">🐮</i> <span>Formulario de Animales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>Formulario_Animales/Categoria_animales"><i class="fa fa-circle-o"></i> Categoria Animales</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Animales/control_animales/listBovino"><i class="fa fa-circle-o"></i>Control animales bovinos</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Animales/control_animales/listAnimales"><i class="fa fa-circle-o"></i>Control animales otros</a></li>
                            <?php if ($this->session->userdata('rol') == 'Admin') : ?>
                                <li><a href="<?php echo base_url(); ?>Formulario_Animales/Inventario_animales"><i class="fa fa-circle-o"></i> Inventario Animales Bovinos</a></li>
                                <li><a href="<?php echo base_url(); ?>Formulario_Animales/Inventario_animales/listAnimales"><i class="fa fa-circle-o"></i> Inventario Animales</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo base_url(); ?>Formulario_Animales/Venta_animales"><i class="fa fa-circle-o"></i> Ventas de Animales</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Animales/Compra_animales"><i class="fa fa-circle-o"></i> Compra de Animales</a></li>


                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bank"></i> <span>Formulario Estancia</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>Formulario_Estancia/Estancia"><i class="fa fa-circle-o"></i> Estancia</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-group"></i> <span>Formulario Empleados</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>Formulario_Empleados/Tipo_cargo"><i class="fa fa-circle-o"></i> Categoria de Cargo</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Empleados/Empleado"><i class="fa fa-circle-o"></i> Empleados</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Formulario Egresos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>Formulario_Egresos/Gastos_fijo"><i class="fa fa-circle-o"></i> Gastos Fijo</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Egresos/Pago_empleado"><i class="fa fa-circle-o"></i> Pagos de Empleado</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Egresos/Categoria_gastos_variable"><i class="fa fa-circle-o"></i> Categoria Gastos Variables</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Egresos/Egreso_gasto_fijo"><i class="fa fa-circle-o"></i> Egresos de gastos Fijos</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Egresos/Egreso_gasto_variable"><i class="fa fa-circle-o"></i> Egresos de gastos variables</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i> <span>Formulario Ingresos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>Formulario_Ingresos/Categoria_otros_ingresos"><i class="fa fa-circle-o"></i> Categorias de Otros Ingresos</a></li>
                            <li><a href="<?php echo base_url(); ?>Formulario_Ingresos/Ingreso"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                        </ul>
                    </li>
                    <?php if ($this->session->userdata('rol') == 'Admin') : ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-gear"></i> <span>Configuracion del sistema</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>Administrador/Usuarios"><i class="fa fa-circle-o"></i> Administracion de usuarios</a></li>
                        
                                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-circle-o"></i> Datos de la empresa</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->