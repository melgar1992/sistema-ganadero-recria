<div class="row">
    <div class="col-xs-12 text-center">
        <b>Laguna Seca</b><br>
        Tel. 69050003 <br>
        Email:nicolas@hotmail.com
    </div>
</div> <br>

<div class="row">
    <div class="col-xs-12">

        En el siguiente reporte se mostrara los datos del año presente de la cantidad de animales bovinos que existen en todas las estancias en sus diferentes categorias.

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