<div class="invoice p-3 mb-3" style="margin-left: 16%">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Fatura Nª <?=$fatura->id?>
                <small class="float-right">Date: XXX</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <div class="row">

        <!-- accepted payments column -->

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

            </div>
            <!-- /.col -->
        </div>
        <br>
        <div class="row">
            <div class="col-12 table-responsive">
                <form action="router.php?c=linhaFatura&a=store&idFatura=<?= $fatura->id ?>&idProduto=<?php if(isset($produto)){ echo $produto->id;}?>" method="POST">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço Unidade</th>
                            <th>Taxa</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        foreach ($linhafatura as $linhaFaturas) { ?>
                            <tr style="color: white">

                                <td style="display: none" name="id_Produto"><?= $linhaFaturas->id ?> ></td>
                                <td><?= $linhaFaturas->produto->nome ?></td>
                                <td><?= $linhaFaturas->quantidade ?></td>
                                <td><?= $linhaFaturas->valor ?></td>
                                <td><?= $linhaFaturas->valor_iva ?>%</td>





                            </tr>
                        <?php   }?>




                        </tbody>
                    </table>
                </form>

            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">

                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                <a href="router.php?c=fatura&a=index" class="btn btn-default "> Voltar atras</a>

            </div>
        </div>
    </div>