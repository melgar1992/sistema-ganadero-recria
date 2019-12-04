<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gastos Fijos
            <small></small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar</h3>

                
            </div>
            <div class="box-body">

                <?php if ($this->session->flashdata("error")) : ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">$times;</button>
                        <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo base_url(); ?>Formulario_Egresos/Gastos_fijo/actualizarGastoFijo" id="contrato_empleado" class="form-horizontal form-label-left">
                    <input type="hidden" value="<?php echo $this->session->userdata('id_usuarios'); ?>" name="id_usuarios">
                    <input type="hidden" value="<?php echo $gasto_fijo->id_gastos_fijos ?>" name="id_gastos_fijos">
                    <div class="form-group <?php echo !empty(form_error("nombre")) ? 'has-error' : ''; ?>">
                        <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" value="<?php echo !empty(form_error("nombre")) ? set_value("nombre") : $gasto_fijo->nombre ?>" id=nombre required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("nombre", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo !empty(form_error("total")) ? 'has-error' : ''; ?>">
                        <label for="total" class="control-label col-md-3 col-sm-3 col-xs-12">Total Bs: <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="number" step="any" min="0" name="total" value="<?php echo !empty(form_error("total")) ? set_value("total") : $gasto_fijo->total ?>" id=total required="required" class="form-control col-md-3 col-xs-12" placeholder="">
                            <?php echo form_error("total", "<span class='help-block col-md-4 cols-xs-12 '>", "</span>"); ?>
                        </div>
                    </div>
                    <div class="in_solid"></div>

                    <br>

                    <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?php echo site_url("Formulario_Egresos/Gastos_fijo") ?>" class="btn btn-primary btn-flat">Volver</a>
                            <button type="submit" id="guardar" class="btn btn-success">Editar</button>

                        </div>
                    </div>

                    <div class="in_solid"></div>

                </form>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->