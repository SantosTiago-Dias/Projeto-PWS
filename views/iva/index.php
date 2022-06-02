<div class="card" style="margin-left: 13%;">
    <div class="card-header">
        <h3 class="card-title">Empresa</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="empresa" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Taxa Iva</th>
                <th>Descrição</th>
                <th>Status</th>

                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($ivas as $iva) { ?>
            <tr>
                <td style="color: white"><?=$iva->id?></td>
                <td style="color: white"><?=$iva->taxaiva?></td>
                <td style="color: white"><?=$iva->descricao?></td>
                <?php if ($iva->status== '1')
                    {
                        echo '<td style="background-color: green;color: white">Ativo</td>';
                    }
                    else{
                        echo '<td style="background-color: red;color: white">Desativo</td>';
                    }?>



                <td>

                    <a href="router.php?c=iva&a=edit&id=<?= $iva->id ?>"
                       class="btn btn-info" role="button">Edit</a>
                    <?php if ($iva->status== '1')
                    {
                        echo '   <a href="router.php?c=iva&a=desativar&id='.$iva->id.'"
                        class="btn btn-danger" role="button">Desativar</a>';
                    }
                    else{
                        echo '   <a href="router.php?c=iva&a=ativar&id='.$iva->id.'"
                        class="btn btn-success" role="button">Ativar</a>';
                    }?>

                </td>

            </tr>
            <?php } ?>


            </tbody>

        </table>
        <br>
        <a href="router.php?c=iva&a=create"
           class="btn btn-info" role="button">Criar Iva</a>
    </div>
    <!-- /.card-body -->
</div>

<!-- jQuery -->
<script src="./public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./public/plugins/jszip/jszip.min.js"></script>
<script src="./public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="./public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
