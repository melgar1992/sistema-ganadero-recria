<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Control de ganado

    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Dashboard General</h3>
      </div>
      <div class="box-body">

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo number_format($ingresos, 2, '.', ','); ?> Bs</h3>

                <p>Ingresos de la gestion actual</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo number_format($egresos, 2); ?> Bs</h3>

                <p>Egresos de la gestion actual</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo ($inventario['stock'] > 0) ? $inventario['stock'] :  '0'; ?></h3>

                <p>Inventario animales bovinos</p>
              </div>
              <div class="icon">
                <i class="fa"><small>🐮</small></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.end Small boxes -->
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reporte de ingresos y egresos del año</h3>
              <div class="box-tools pull-right">
                <select name="year" id="year" class="form-control">
                  <?php foreach ($years as $year) : ?>
                    <option value="<?php echo $year->year ?>"><?php echo $year->year ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>
            <div class="box-body">
              <div id="chart" class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
    </div>
    <!-- /.box -->
    <div class="row">
      <div class="col-md-6 col-sm-12 col-xs-12">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Reportes Generales</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="" class="col-md-1 control-label">Desde: </label>
              <div class="col-md-5">
                <input type="date" class="form-control" id="fechainicio" name="fechainicio" value="">
              </div>
              <label for="" class="col-md-1 control-label">Hasta: </label>
              <div class="col-md-5">
                <input type="date" class="form-control" id="fechafin" name="fechafin" value="<?php echo date("Y-m-d"); ?>">

              </div>
              <br>
              <br>
              <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Balance
                    <span class="fa fa-caret-down"></span></button>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" id="balance_general">Financiero</a></li>
                  </ul>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Reportes suplementario del año</h3>
          </div>
          <div class="box-body">
            <div class="margin">
              <div class="btn-group col-md-6 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-info col-md-8 col-sm-10 col-xs-10">Reportes de inventario</button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a data-toggle="modal" id='reporte_categoria_bovino' data-target="#modal-reporte">Categoria de animales bovinos </a></li>
                  <li class="divider"></li>
                  <li><a data-toggle="modal" id='reporte_categoria_animal' data-target="#modal-reporte">Categoria de otros Animales</a></li>
                  <li class="divider"></li>
                  <li><a data-toggle="modal" id='reporte_control_bovino' data-target="#modal-reporte">Control bovino</a></li>
                </ul>
              </div>
              <div class="btn-group col-md-6 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-success col-md-8 col-sm-10 col-xs-10">Reporte de ventas</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a data-toggle="modal" id='reporte_venta_bovino' data-target="#modal-reporte">Cantidad animales bovinos</a></li>
                  <li class="divider"></li>
                  <li><a data-toggle="modal" id='reporte_venta_animal' data-target="#modal-reporte">Cantidad otros animales</a></li>

                </ul>
              </div>
            </div>
            <br>
            </br>
            <div class="margin">
              <div class="btn-group col-md-6 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-danger col-md-8 col-sm-10 col-xs-10">Reportes de compras</button>
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a data-toggle="modal" id='reporte_compra_bovino' data-target="#modal-reporte">Cantidad animales bovinos</a></li>
                  <li class="divider"></li>
                  <li><a data-toggle="modal" id='reporte_compra_animal' data-target="#modal-reporte">Cantidad otros animales</a></li>
                </ul>
              </div>

            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
      </div>
    </div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-reporte">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reporte</h4>
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