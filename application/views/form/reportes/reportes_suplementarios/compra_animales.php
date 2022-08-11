<div class="row">
    <div class="col-xs-12 text-center">
        <b><?php echo $empresa['nombre']; ?></b><br>
        Telefono: <?php echo $empresa['telefono']; ?> <br>
    </div>
</div> <br>

<div class="row">
    <div class="col-xs-12">
        <p class="text-center">
            <?php echo $empresa['descripcion']; ?>

        </p>
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
                <?php foreach ($compra_animales_bovinos as $compra_animal_bovino) : ?>
                    <tr>
                        <td><?php echo $compra_animal_bovino->categoria; ?></td>
                        <td><?php echo $compra_animal_bovino->sexo; ?></td>
                        <td><?php echo $compra_animal_bovino->cantidad; ?></td>
                        <td><?php echo number_format($compra_animal_bovino->sub_total, 2); ?></td>

                    <?php endforeach; ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-left"><strong>Total:</strong></td>
                    <td colspan="0" class="text-left"><strong><?php echo number_format($totales_compras->cantidad, 2); ?></strong></td>
                    <td colspan="0" class="text-left"><strong><?php echo number_format($totales_compras->sub_total, 2); ?></strong></td>
                </tr>

            </tfoot>

        </table>
    </div>
</div>