<div class="card" style="margin-left: 16%;">
    <div class="card-header">
        <h3 class="card-title">Funcionarios</h3>
    </div>
    <!-- /.card-header -->



    <div class="card-body">
        <table id="Funcinarios" class="table table-bordered table-striped">
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


            <?php foreach ($funcionarios as $funcionario ) { ?>


                <tr>
                    <td style="display: none"><?=$funcionario->id?></td>
                    <td style="color: white"><?=$funcionario->username?></td>
                    <td style="color: white"><?=$funcionario->telefone?></td>
                    <td style="color: white"><?=$funcionario->email?></td>
                    <td style="color: white"><?=$funcionario->nif?></td>

                    <!-- Mudar isto -->
                    <td>

                        <a href="router.php?c=funcionario&a=edit&id=<?=$funcionario ->id ?>"
                           class="btn btn-info" role="button">Edit</a>

                    </td>

                </tr>


            <?php } ?>


            </tbody>

        </table>
        <br>
        <a href="router.php?c=funcionario&a=create"
           class="btn btn-info" role="button">Criar funcionario</a>
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
