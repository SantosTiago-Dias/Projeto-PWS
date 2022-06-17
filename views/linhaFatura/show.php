<div class="invoice p-3 mb-3" style="margin-left: 16%">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Fatura Nª <?=$fatura->id?>
                <small class="float-right">Date:  <?= date("Y-m-d"); ?></small>
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
        <div class="row no-print">
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                </div>
                <!-- /.col -->
                <div class="col-6">


                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?= $fatura->valortotal-$fatura->ivatotal ?></td>


                            </tr>
                            <tr>
                                <th>Iva</th>
                                <td><?= $fatura->ivatotal ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><?= $fatura->valortotal ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <?php if ($fatura->status == 0 && $funcao != "Cliente") { ?>

                <a href="router.php?c=fatura&a=emitir&id= <?=$fatura->id?>" style="margin-left: 1%" class="btn btn-success float-right"><i class="fa-solid fa-paper-plane"></i>  Emitir Fatura</a>
                    <a href="router.php?c=fatura&a=anular&id= <?=$fatura->id?>" class="btn btn-danger float-right"><i class="fa-solid fa-trash"></i>  Anular Fatura</a>
                <a href="router.php?c=fatura&a=index" class="btn btn-default "> Voltar atras</a>
                <?php }else{ ?>
                    <a href="#" rel="noopener" target="_blank" class="btn btn-default float-right"><i class="fas fa-print"></i> Print</a>
                    <a href="router.php?c=fatura&a=index" class="btn btn-default "> Voltar atras</a>
                <?php } ?>
            </div>
        </div>
    </div>