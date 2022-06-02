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
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Nif</th>
                <th>Morada</th>
                <th>Localidade</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($empresas as $empresa) { ?>
            <tr>
                <td><?=$empresa->id?></td>
                <td><?=$empresa->nome?></td>
                <td><?=$empresa->email?></td>
                <td><?=$empresa->telefone ?></td>
                <td><?=$empresa->nif ?></td>
                <td><?=$empresa->morada ?></td>
                <td><?=$empresa->local ?></td>
                <td>
                    <a href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>"
                       class="btn btn-info" role="button">Show</a>
                    <a href="router.php?c=empresa&a=edit&id=<?= $empresa->id ?>"
                       class="btn btn-info" role="button">Edit</a>
                    <a href="router.php?c=book&a=delete&id=<?=$empresa->id ?>"
                       class="btn btn-warning" role="button">Delete</a>
                </td>

            </tr>
            <?php } ?>


            </tbody>

        </table>
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
