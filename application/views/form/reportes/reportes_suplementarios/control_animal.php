<div class="row">
    <div class="col-xs-12 text-center">
        <b>Laguna Seca</b><br>
        Tel. 69050003 <br>
        Email:nicolas@hotmail.com
    </div>
</div> <br>

<div class="row">
    <div class="col-xs-12">

        En el siguiente reporte se mostrara los datos actuales del año presente de todos los tipos de controles realizados en las distintas estancias.
    </div>
    <div class="col-xs-12">
        <br>
        <b>Estancias Evaluadas:</b>
        <br>
        <?php foreach ($estancias as $estancia) : ?>
            <tr>

                <td> <?php echo $estancia->nombre; ?></td>
                <div id="nombre" clear=left colspan="2"></div>
            </tr>
        <?php endforeach; ?>
    </div>
</div>
</br>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Estancia</th>
                    <th>Tipo de control</th>
                    <th>Sexo</th>
                    <th>Categoria</th>
                    <th>Cantidad</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($control_animales as $control_animal) : ?>
                    <tr>
                        <td><?php echo $control_animal->nombre; ?></td>
                        <td><?php echo $control_animal->tipo_movimiento; ?></td>
                        <td><?php echo $control_animal->sexo; ?></td>
                        <td><?php echo $control_animal->categoria; ?></td>
                        <td><?php echo $control_animal->cantidad; ?></td>


                    <?php endforeach; ?>

            </tbody>

        </table>
    </div>
</div>