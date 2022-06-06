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
        <?= print_r($produto->iva_id)?>
        <!-- accepted payments column -->
        <form>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Referencia</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" style="color: white;" id="staticEmail" value="<?php echo $produto->id ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nome do Produto</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" style="color: white;" id="staticEmail" value="<?php echo $produto->nome ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Referencia</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" style="color: white;" id="staticEmail" value="<?php echo $produto->id ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Preço</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" style="color: white;" id="staticEmail" value="<?php echo number_format($produto->preco, 2, '.', ''); ?> €" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Iva</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" style="color: white;" id="staticEmail" value="<?php echo $produto->iva_id->taxaiva ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nome do Produto</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" style="color: white;" id="staticEmail" value="<?php echo $produto->nome ?>" disabled>
                </div>
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