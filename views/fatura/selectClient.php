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
                    <th>Nome</th>
                    <th>Morada</th>
                    <th>Localidade</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <?php
                    foreach ($clientes as $client) { ?>

                        <td style="color: white"><?=$client->username?></td>
                        <td style="color: white"><?=$client->morada?></td>
                        <td style="color: white"><?=$client->localidade?></td>
                        <td style="color: white"><a href="router.php?c=fatura&a=store&id=<?=$client->id?>" class="btn btn-primary" role="button">Selecionar Cliente</a></td>
                    <?php } ?>
                </tr>

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