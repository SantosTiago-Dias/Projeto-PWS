<div class="invoice p-3 mb-3" style="margin-left: 13%">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-user"></i> Selecione o cliente

            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <!-- Table row -->
    <div class="row">

        <div class="col-12 table-responsive">
            <table class="table table-striped">
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


                    <?php
                    foreach ($produtos as $produto) { ?>
                    <tr>
                        <td style="color: white"><?=$produto->id?></td>
                        <td style="color: white"><?=$produto->nome?></td>
                        <td style="color: white"><?=$produto->stock?></td>
                        <td style="color: white"><?= number_format($produto->preco, 2, '.', '');?>€</td>
                        <td style="color: white"><a href="router.php?c=linhaFatura&a=create&id=<?=$produto->id?>" class="btn btn-primary" role="button">Selecionar Produto</a></td>
                    </tr>
                    <?php } ?>


                </tbody>
            </table>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->



    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <button type="button" class="btn btn-success float-right"> Emitir</button>
            <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">Anular</button>
        </div>
    </div>
</div>