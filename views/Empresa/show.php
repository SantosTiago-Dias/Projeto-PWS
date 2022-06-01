
<!--<div class="row" style="margin-left: 10%">
    <div class="col-sm-12">
        <div class="row" style="margin: 10px">
            <form action="router.php?c=book&a=update&id=<?=$empresas->id?>" method="post">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nome da Empresa:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($empresas)) { echo
                        $empresas->nome; }?>" placeholder="Nome do Livro">
                        <?php if(isset($book->errors)) {
                            echo '  <div class="alert alert-danger" role="alert">'.$book->errors->on("name").'</div>';
                        }?>

                    </div>



                <button type="submit" class="btn btn-primary">Edit</button>
            </form>

        </div>
        <td> <a href="router.php?c=book&a=index"
                class="btn btn-info" role="button">Voltar atras</a></td>
    </div>

</div>-->
<form action="router.php?c=book&a=update&id=<?=$empresas->id?>" method="post">
<div style="margin-left: 14%">
    <div class="card-header">
        <h3 class="">Empresa</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div >
        <div class="form-group">
            <label for="inputName">Nome da Empresa</label>
            <input type="text" id="inputName" class="form-control" value="<?php if(isset($empresas)) { echo
            $empresas->nome; }?>">
        </div>
        <div class="form-group">
            <label for="inputName">Email</label>
            <input type="text" id="inputName" class="form-control" value="<?php if(isset($empresas)) { echo
            $empresas->email; }?>">
        </div>
        <div class="form-group">
            <label for="inputName">Telefone</label>
            <input type="text" id="inputName" class="form-control" value="<?php if(isset($empresas)) { echo
            $empresas->telefone; }?>">
        </div>
        <div class="form-group">
            <label for="inputName">Nif</label>
            <input type="text" id="inputName" class="form-control" value="<?php if(isset($empresas)) { echo
            $empresas->nif; }?>">
        </div>
        <div class="form-group">
            <label for="inputName">Morada</label>
            <input type="text" id="inputName" class="form-control" value="<?php if(isset($empresas)) { echo
            $empresas->morada; }?>">
        </div>
        <div class="form-group">
            <label for="inputDescription">Project Description</label>
            <textarea id="inputDescription" class="form-control" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
        </div>
        <div class="form-group">
            <label for="inputStatus">Status</label>
            <select id="inputStatus" class="form-control custom-select">
                <option disabled>Select one</option>
                <option>On Hold</option>
                <option>Canceled</option>
                <option selected>Success</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputClientCompany">Client Company</label>
            <input type="text" id="inputClientCompany" class="form-control" value="Deveint Inc">
        </div>
        <div class="form-group">
            <label for="inputProjectLeader">Project Leader</label>
            <input type="text" id="inputProjectLeader" class="form-control" value="Tony Chicken">
        </div>
    </div>
</div>
</form>