<div class="card" style="margin-left: 13%;">
    <div class="card-header">
        <h3 class="card-title">Empresa</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="empresa" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Referencia</th>
                <th>Nome</th>
                <th>Stock</th>
                <th>Preço</th>

                <th></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td style="color: white"><?=$produto->id?></td>
                    <td style="color: white"><?=$produto->nome?></td>
                    <td style="color: white"><?=$produto->stock?></td>
                    <td style="color: white"><?= number_format($produto->preco, 2, '.', '');?>€</td>

                </tr>
            <?php } ?>


            </tbody>

        </table>
        <br>
        <a href="router.php?c=iva&a=create"
           class="btn btn-info" role="button">Criar Iva</a>
    </div>
    <!-- /.card-body -->
</div>
