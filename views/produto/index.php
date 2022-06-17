<div class="card" style="margin-left: 16%;">
    <div class="card-header">
        <h3 class="card-title">Produtos</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="empresa" class="table table-bordered table-striped">
            <thead>
            <tr>
                <!-- -->
                <th>Referência</th>
                <th>Nome</th>
                <th>Stock</th>
                <th>Preço</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td style="color: white"><?=$produto->id?></td>
                    <td style="color: white"><?=$produto->nome?></td>
                    <?php if($produto->stock==0) {
                        echo '<td style="color: white;background-color: red">'.$produto->stock.'</td>';
                    } else{
                        echo '<td style="color: white;">'.$produto->stock.'</td>';
                    }?>
                    <td style="color: white"><?= number_format($produto->preco, 2, '.', '');?>€</td>

                    <?php if ($produto->status== '1')
                    {
                        echo '<td style="background-color: green;color: white">Ativo</td>';
                    }
                    else{
                        echo '<td style="background-color: red;color: white">Desativo</td>';
                    }?>

                    <td>

                        <a href="router.php?c=produto&a=edit&id=<?= $produto->id ?>"
                           class="btn btn-info" role="button">Edit</a>

                        <a href="router.php?c=produto&a=adicionarstock&id=<?= $produto->id ?>"
                           class="btn btn-info" role="button">Adicionar Stock</a>

                        <?php if ($produto->status== '1')
                        {
                            echo '   <a href="router.php?c=produto&a=desativar&id='.$produto->id.'"
                        class="btn btn-danger" role="button">Desativar</a>';
                        }
                        else{
                            echo '   <a href="router.php?c=produto&a=ativar&id='.$produto->id.'"
                        class="btn btn-success" role="button">Ativar</a>';
                        }?>

                    </td>

                </tr>


            <?php } ?>




            </tbody>

        </table>
        <br>


        <a href="router.php?c=produto&a=create"
           class="btn btn-info" role="button">Criar Produto</a>

    </div>
    <!-- /.card-body -->
</div>
