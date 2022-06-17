<div style="margin-left: 16%;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?php

                    if(!empty($_SESSION['message'])) {
                        if ($_SESSION['status']==="good")
                        {
                            echo '<div style="padding: 2%" class="btn-success text-center ">'.$_SESSION['message'].'</div><br><br>';
                        }
                        elseif ($_SESSION['status']==="bad")
                        {
                            echo '<div style="padding: 2%" class="btn-danger text-center ">'.$_SESSION['message'].'</div><br><br>';
                        }

                        unset($_SESSION['message']);
                    }

                    ?>

                    <h3 class="card-title">Faturas</h3>
                    <form action="router.php?c=fatura&a=search" method="POST">
                        <div class="d-flex justify-content-end">

                                <input type="search" class="formw rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="value_search" />
                                <button type="submit" class="input-group-text border-0" id="search-addon">
                                <i  class="fas fa-search"></i>
                              </button>


                        </div>
                    </form>
                    <div class="d-flex justify-content-end">


                    </div>





                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>NºFatura</th>
                            <th>Nome Cliente</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php

                        foreach ($faturas as $fatura){

                            if($fatura->status!==null){?>
                        <tbody>
                        <tr>
                            <td><?= $fatura->id ?></td>
                            <td><?= $fatura->cliente->username ?></td>
                            <td><?= $fatura->dtafatura->format('Y-m-d H:i:s') ?></td>
                            <td><?= $fatura->valortotal?>€</td>



                            <?php
                            if($fatura->status==1){
                                echo "<td style='background-color: green'>Emitida</td>";
                            }
                            else {
                                echo "<td style='background-color: yellowgreen'>Laçamento</td>";
                            }

                                ?>
                            <td>

                                <a href="router.php?c=linhaFatura&a=show&idFatura=<?= $fatura->id ?>"><i class="fa-solid fa-circle-info"></i></a>

                                <?php

                                if($funcao !== "Cliente" && $fatura->status !== 1 ) { ?>
                                <a href="router.php?c=linhaFatura&a=edit&idFatura=<?= $fatura->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <?php } ?>

                            </td>
                        </tr>

                        </tbody>
                        <?php }} ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>