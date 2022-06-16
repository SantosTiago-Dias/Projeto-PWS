<div class="card" style="margin-left: 13%;">
    <div class="card-header">
        <h3 class="card-title">Clientes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="Clientes" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="display:none"> Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Nif</th>




                <th></th>
            </tr>
            </thead>
            <tbody>

                <?php foreach ($cliente as $clientes) { ?>


            <tr>
                <td style="display: none"><?=$clientes->id?></td>
                <td style="color: white"><?=$clientes->username?></td>
                <td style="color: white"><?=$clientes->telefone?></td>
                <td style="color: white"><?=$clientes->email?></td>
                <td style="color: white"><?=$clientes->nif?></td>

                <!-- Mudar isto -->
                <td>

                    <a href="router.php?c=cliente&a=edit&id=<?=$clientes ->id ?>"
                       class="btn btn-info" role="button">Edit</a>

                </td>

            </tr>


            <?php } ?>


            </tbody>

        </table>
        <br>
        <a href="router.php?c=cliente&a=create"
           class="btn btn-info" role="button">Criar Cliente</a>
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
