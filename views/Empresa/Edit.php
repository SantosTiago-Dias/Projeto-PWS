

<form action="router.php?c=empresa&a=update&id=<?=$empresas->id?>" method="post">
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

        <div class="form-row">
            <div class="col-md-6 mb-4">
                <label for="empresa">Nome da Empresa</label>
                <input type="text" id="empresa" class="form-control" name="nome" value="<?php if(isset($empresas)) { echo
                $empresas->nome; }?>">

            </div>
            <div class="col-md-6 mb-4">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" value="<?php if(isset($empresas)) { echo
                $empresas->email; }?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-4">
                <label for="inputName">Telefone</label>
                <input type="text" id="inputName" class="form-control" name="telefone" value="<?php if(isset($empresas)) { echo
                $empresas->telefone; }?>">

            </div>
            <div class="col-md-6 mb-4">
                <label for="nif">Nif</label>
                <input type="text" id="nif" class="form-control" name="nif" value="<?php if(isset($empresas)) { echo
                $empresas->nif; }?>">
            </div>
        </div>


        <div class="form-row">
            <div class="col-md-6 mb-4">
                <label for="morada">Morada</label>
                <input type="text"  name="morada" class="form-control" value="<?php if(isset($empresas)) { echo
                $empresas->morada; }?>">

            </div>
            <div class="col-md-6 mb-4">
                <label for="cod_Postal">Codigo Postal</label>
                <input type="text"  class="form-control" name="codPostal" value="<?php if(isset($empresas)) { echo
                $empresas->codpostal; }?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-4">
                <label for="morada">Localidade</label>
                <input type="text" name="local" class="form-control" value="<?php if(isset($empresas)) { echo
                $empresas->local; }?>">

            </div>
            <div class="col-md-6 mb-4">
                <label for="cod_Postal">Capital Social</label>
                <input type="text"  class="form-control" name="capSocial" value="<?php if(isset($empresas)) { echo
                $empresas->capsocial; }?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputDescription">Project Description</label>
            <textarea id="inputDescription" class="form-control" rows="4" name="descricao"><?php if(isset($empresas)) { echo
                $empresas->descricao; }?></textarea>
        </div>
        <button class="btn btn-success" type="submit">Editar Dados</button>
        <button type="submit" class="btn btn-danger">Cancelar</button>

    </div>
    <a href="?c=empresa&a=index" class="btn btn-secondary">Voltar atras</a>
</div>
</form>