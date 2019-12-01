<div class="row">
    <div class="col-xs-12 text-center">
        <b>Empresa de Ventas</b><br>
        Calle Moquegua 430 <br>
        Tel. 481890 <br>
        Email:yonybrondy17@gmail.com
    </div>
</div> <br>

<br>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Cuenta</th>
                    <th>Egresos</th>
                    <th>Ingresos</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Ingresos directos</strong></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Venta animales</td>
                    <td></td>
                    <td><?php echo number_format($ingreso_venta_animal['total'], 2); ?> </td>
                </tr>
                <tr>
                    <td>Pagos por comisiones</td>
                    <td><?php echo number_format($comision_venta['comision_total'], 2); ?> </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"> </td>
                </tr>
                <tr>
                    <td><strong>Otros Ingresos</strong></td>
                    <?php $suma_otros_ingresos = 0; ?>
                </tr>
                <?php if (!empty($otros_ingresos)) : ?>
                    <?php foreach ($otros_ingresos as $otro_ingreso) : ?>

                        <tr>
                            <td><?php echo $otro_ingreso->nombre; ?></td>
                            <td></td>
                            <td><?php echo number_format($otro_ingreso->ingresos, 2); ?></td>
                            <?php $suma_otros_ingresos = $suma_otros_ingresos + $otro_ingreso->ingresos; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td><strong>Utilidad Bruta</strong></td>
                    <td></td>
                    <?php $utilidad_bruta = $ingreso_venta_animal['total'] - $comision_venta['comision_total'] + $suma_otros_ingresos ?>
                    <td><?php echo number_format($utilidad_bruta, 2) ?></td>
                </tr>
                <tr>
                    <td><strong>Gastos fijos</strong></td>
                </tr>
                <?php $suma_pago_gastos_fijos = 0; ?>
                <?php if (!empty($pago_gastos_fijos)) : ?>
                    <?php foreach ($pago_gastos_fijos as $pago_gasto_fijo) : ?>

                        <tr>
                            <td><?php echo $pago_gasto_fijo->nombre; ?></td>
                            <td><?php echo number_format($pago_gasto_fijo->pago_gastos_fijos, 2); ?></td>
                            <td></td>
                            <?php $suma_pago_gastos_fijos = $suma_pago_gastos_fijos + $pago_gasto_fijo->pago_gastos_fijos; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td> <strong>Gastos variables</strong></td>
                </tr>
                <?php $suma_pago_gastos_variables = 0; ?>
                <?php if (!empty($pago_gastos_variables)) : ?>
                    <?php foreach ($pago_gastos_variables as $pago_gasto_variable) : ?>

                        <tr>
                            <td><?php echo $pago_gasto_variable->nombre; ?></td>
                            <td><?php echo number_format($pago_gasto_variable->pago_gastos_variables, 2); ?></td>
                            <td></td>
                            <?php $suma_pago_gastos_variables = $suma_pago_gastos_variables + $pago_gasto_variable->pago_gastos_variables; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td>Pago empleados</td>
                    <td><?php echo number_format($pago_empleados['pago']); ?></td>
                </tr>
                <tr>
                    <td>Compra animales</td>
                    <td><?php echo number_format($egreso_compra_animal['total'], 2); ?></td>
                    <td></td>
                </tr>
            </tbody>

        </table>
        <?php $balance = $utilidad_bruta - $suma_pago_gastos_fijos - $suma_pago_gastos_variables - $pago_empleados['pago'] - $egreso_compra_animal['total']; ?>
        <h3>Balance de la gestion <strong><?php echo number_format($balance, 2); ?></strong></h3>
    </div>
</div>