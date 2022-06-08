<div class="invoice p-3 mb-3" style="margin-left: 13%">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Fatura Nª xxxx
                <small class="float-right">Date: XXX</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <div class="row">

        <!-- accepted payments column -->
        <form>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <b>Empresa:</b><br>
                    <br>
                    <address>
                        <strong>Nome da Empresa:</strong><?php if(isset($empresa)){echo $empresa->nome;}?><br>
                        <strong>Email: </strong> <?php if(isset($empresa)) {echo $empresa->email;}?><br>
                        <strong>Nif: </strong> <?php if(isset($empresa)) {echo $empresa->nif;}?><br>
                        <strong>Telemovel: </strong> <?php if(isset($empresa)) {echo $empresa->telefone;}?><br>
                        <strong>Morada: </strong> <?php if(isset($empresa)) {echo $empresa->morada;}?><br>
                        <strong>Cod-Postal,Localidade: </strong> <?php if(isset($empresa)) {echo $empresa->codpostal.','.$empresa->local;}?><br>



                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                    <b>Cliente:</b><br>
                    <br>
                    <strong>Nome do Cliente: </strong><?php if(isset($cliente)){echo $cliente->username;}?><br>
                    <strong>Email: </strong><?php if(isset($cliente)) {echo $cliente->email;}?><br>
                    <strong>Nif: </strong><?php if(isset($cliente)) {echo $cliente->nif;}?><br>
                    <strong>Telemovel: </strong><?php if(isset($cliente)) {echo $cliente->telefone;}?><br>
                    <strong>Morada: </strong> <?php if(isset($cliente)) {echo $cliente->morada;}?><br>
                    <strong>Cod-Postal,Localidade: </strong> <?php if(isset($cliente)) {echo $cliente->codpostal.','.$cliente->localidade;}?><br>
                    <a href="router.php?c=linhaFatura&a=selectProduto" class="btn btn-primary float-right">Selecionar Produto</a>

                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <?php var_dump($produto) ?>

                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço Unidade</th>
                            <th>Taxa</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr style="color: white">
                            <td style="display: none" name="id_Produto"><?= $produto->id ?></td>
                            <td><?= $produto->nome ?></td>
                            <td><input type="number" min="0" max="<?= $produto->stock ?>"></td>
                            <td><?= number_format($produto->preco, 2, '.', ''); ?></td>
                            <td><?= $produto->iva->taxa ?>%</td>
                            <td><a href="router.php?c=linhaFatura&a=store">Guardar</a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
        </form>
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