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