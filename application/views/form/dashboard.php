<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
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
                <h3><?php echo number_format($ingresos,2,'.',',') ; ?> Bs</h3>

                <p>Ingresos</p>
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
              <h3><?php echo number_format($egresos,2) ; ?> Bs</h3>

                <p>Egresos</p>
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
                <h3><?php echo $inventario['stock'] ?></h3>

                <p>Inventario Bovinos</p>
              </div>
              <div class="icon">
                <i class="fa fa-paw"></i>
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
              <h3 class="box-title">Reporte mensual de ingresos y egresos</h3>


            </div>
            <div class="box-body">
              <div class="chart">
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
                <input type="date" class="form-control" name="fechainicio" value="">
              </div>
              <label for="" class="col-md-1 control-label">Hasta: </label>
              <div class="col-md-5">
                <input type="date" class="form-control" name="fechafin" value="">

              </div>
              <br>
              <br>
              <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-info">Reportes de inventario</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Animales Bovinos </a></li>
                    <li class="divider"></li>
                    <li><a href="#">Otros Animales</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning">Balance</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Financiero</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Inventario</a></li>

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
            <h3 class="box-title">Reportes suplementarios</h3>
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
                  <li><a href="#">Categoria de animales bovinos </a></li>
                  <li class="divider"></li>
                  <li><a href="#">Categoria de otros Animales</a></li>
                </ul>
              </div>
              <div class="btn-group col-md-6 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-success col-md-8 col-sm-10 col-xs-10">Reporte de ventas</button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Cantidad animales bovinos</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Cantidad otros animales</a></li>

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
                  <li><a href="#">Cantidad animales bovinos</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Cantidad otros animales</a></li>
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