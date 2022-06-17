<div class="invoice p-3 mb-3" style="margin-left: 16%">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Fatura Nª xxxx
                <small class="float-right">Date: <?= date("Y-m-d"); ?></small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Nome Empresa</strong><br>
                Morada:<br>
                Cod-Postal,Localidade<br>
                Telemovel:<br>
                Email: <br>
                Nif:
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Cliente:</b><br>

            <strong>Nome Cliente</strong>
            <?php if(isset($cliente)){echo $cliente->username;}?><br>
            Morada: <?php if(isset($cliente)) {echo $cliente->morada;}?><br>
            Cod-Postal,Localidade <?php if(isset($cliente)) {echo $cliente->codpostal.','.$cliente->localidade;}?><br>
            Telemovel:<?php if(isset($cliente)) {echo $cliente->telefone;}?><br>
            Email:<?php if(isset($cliente)) {echo $cliente->email;}?><br>
            Nif:<?php if(isset($cliente)) {echo $cliente->nif;}?>
                <a href="router.php?c=fatura&a=selectCliente" class="btn btn-primary float-right">Selecionar cliente</a>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


        <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- /.row -->
    <?php if(isset($cliente)) { ?>
        <div class="row no-print">
            <div class="col-12">
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <a href="router.php?c=fatura&a=store&id=<?php if(isset($cliente)) {echo $cliente->id;}?>" class="btn btn-success float-right" style="margin-right: 5px;"><i class="fas fa-print"></i> Guardar</a>
                <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">Anular</button>

            </div>
        </div>
        <?php }?>
    <!-- this row will not appear when printing -->

</div>