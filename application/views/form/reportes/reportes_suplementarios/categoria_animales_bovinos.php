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
                    <th>Categoria</th>
                    <th>Sexo</th>
                    <th>Cantidad</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventario_categorias as $inventario_categoria) : ?>
                    <tr>
                        <td><?php echo $inventario_categoria->categoria; ?></td>
                        <td><?php echo $inventario_categoria->sexo; ?></td>
                        <td><?php echo $inventario_categoria->stock; ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
    </div>
</div>