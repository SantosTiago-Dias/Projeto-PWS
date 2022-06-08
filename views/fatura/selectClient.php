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


                    <?php
                    foreach ($clientes as $client) { ?>
                    <tr>

                        <td style="color: white"><?=$client->username?></td>
                        <td style="color: white"><?=$client->morada?></td>
                        <td style="color: white"><?=$client->localidade?></td>
                        <td style="color: white"><a href="router.php?c=fatura&a=create&id=<?=$client->id?>" class="btn btn-primary" role="button">Selecionar Cliente</a></td>
                    </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->




</div>