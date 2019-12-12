<div class="row">
    <div class="col-xs-12 text-center">
        <b>Laguna Seca</b><br>
        Tel. 69050003 <br>
        Email:nicolas@hotmail.com
    </div>
</div> <br>
<div class="row">
    <div class="col-xs-12">

        En el siguiente reporte se mostrara los datos de las cantidades en las diferentes categorias de las ventas de animales bovinos realizadas en el año presente asi como tambien los ingresos de forma monetaria.

    </div>
</div>
</br>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Sexo</th>
                    <th>Cantidad</th>
                    <th>Valor de venta</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($venta_animales_bovinos as $venta_animal_bovino) : ?>
                    <tr>
                        <td><?php echo $venta_animal_bovino->categoria; ?></td>
                        <td><?php echo $venta_animal_bovino->sexo; ?></td>
                        <td><?php echo $venta_animal_bovino->cantidad; ?></td>
                        <td><?php echo number_format($venta_animal_bovino->sub_total, 2); ?></td>

                    <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-left"><strong>Total:</strong></td>
                    <td colspan="0" class="text-left"><strong><?php echo number_format($totales_ventas->cantidad,2); ?></strong></td>
                    <td colspan="0" class="text-left"><strong><?php echo number_format($totales_ventas->sub_total,2); ?></strong></td>
                </tr>
                
            </tfoot>

        </table>
    </div>
</div>