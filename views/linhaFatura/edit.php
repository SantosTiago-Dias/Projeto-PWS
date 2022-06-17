<div class="invoice p-3 mb-3" style="margin-left: 16%">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Fatura Nª <?=$fatura->id?>
                <small class="float-right">Date: <?= date("Y-m-d"); ?></small>
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
                    <a href="router.php?c=linhaFatura&a=selectProduto&rota=edit&rota=edit&idFatura=<?= $fatura->id ?>" class="btn btn-primary float-right">Selecionar Produto</a>

                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-12 table-responsive">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço Unidade</th>
                                <th>Taxa</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php

                            foreach ($linhafaturas as $linhaFatura) { ?>
                                <tr style="color: white">

                                    <td style="display: none" >
                                        <form action="router.php?c=linhaFatura&a=update&idFatura=<?= $fatura->id ?>&idProduto=<?= $linhaFatura->produto->id?>" method="POST">
                                            <td><input style="color: black"  type="text" name="nome" value="<?= $linhaFatura->produto->nome ?>" readonly  ></td>
                                            <td><input type="number" name="quantidade" min="0"  value="<?= $linhaFatura->quantidade ?>" required></td>
                                            <td><input style="color: black" type="number" name="preco" value="<?= $linhaFatura->produto->preco ?>" readonly></td>
                                            <td ><input style="color: black" type="text" name="taxa" value="<?= $linhaFatura->produto->iva->taxa ?>"readonly>%</td>
                                            <td><button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button> <a class="btn btn-danger" href="router.php?c=linhaFatura&a=delete&idFatura=<?= $fatura->id ?>&idProduto=<?= $linhaFatura->produto->id?>"><i class="fa-solid fa-x"></i></a></td>
                                        </form>
                                    </td>
                                </tr>
                            <?php   }?>

                            <?php if(isset($produto)) {?>
                                <tr style="color: white">

                                    <td style="display: none" name="id_Produto"><input type="text" name="id" value="<?= $produto->id ?>" >
                                        <form action="router.php?c=linhaFatura&a=store&idFatura=<?= $fatura->id ?>&idProduto=<?php if(isset($produto)){ echo $produto->id;}?>&rota=edit" method="POST">
                                            <td><input style="color: black"  type="text" name="nome" value="<?= $produto->nome ?>" readonly  ></td>
                                            <td><input type="number" name="quantidade" min="0" max="<?= $produto->stock ?>" required></td>
                                            <td><input style="color: black" type="number" name="preco" value="<?= $produto->preco ?>" readonly></td>
                                            <td ><input style="color: black" type="text" name="taxa" value="<?= $produto->iva->taxa ?>"readonly>%</td>
                                    <td><button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button> <a class="btn btn-danger" href="router.php?c=linhaFatura&a=edit&idFatura=<?= $fatura->id ?>"><i class="fa-solid fa-x"></i></a></td>
                                        </form>
                                    </td>
                                </tr>

                            <?php } ?>


                            </tbody>
                        </table>
                    </form>
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
                            <div class="col-12">
                                <a href="router.php?c=fatura&a=index" class="btn btn-success float-right" style="margin-right: 5px;">Guardar</a>
                                <a href="router.php?c=fatura&a=index" class="btn btn-danger float-right" style="margin-right: 5px;">Anular Fatura</a>

                            </div>
                        </div>


                </div>

        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->

</div>