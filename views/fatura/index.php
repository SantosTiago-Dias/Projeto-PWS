<div style="margin-left: 16%;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Faturas</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 100%;margin-top: 10%">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>NºFatura</th>
                            <th>Nome Cliente</th>
                            <th>Nome cliente</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($faturas as $fatura){ ?>
                        <tbody>
                        <tr>
                            <td><?= $fatura->id ?></td>
                            <td><?= $fatura->cliente->username ?></td>
                            <td><?= $fatura->dtafatura->format('Y-m-d H:i:s') ?></td>
                            <td><?= $fatura->valortotal?></td>


                            <td>
                            <?php
                            if($fatura->status==1){
                                echo "Emitida";
                            }
                            else {
                                echo "cancelada";
                            }

                                ?></td>
                            <td>
                                <a href="router.php?c=linhaFatura&a=show&idFatura=<?= $fatura->id ?>"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="router.php?c=linhaFatura&a=edit&idFatura=<?= $fatura->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                            </td>
                        </tr>

                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>