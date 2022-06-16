<div style="margin-left: 16%;">
    <form action="router.php?c=cliente&a=update&id=<?=$cliente->id?>" method="post">
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" id="empresa" class="form-control" name="username" value="<?php if(isset($cliente)) { echo
            $cliente->username; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php if(isset($cliente)) { echo
            $cliente->email; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php if(isset($cliente)) { echo
            $cliente->password; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Telefone</label>
            <input type="number" class="form-control" name="telefone" value="<?php if(isset($cliente)) { echo
            $cliente->telefone; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nif</label>
            <input type="number" class="form-control" name="nif" value="<?php if(isset($cliente)) { echo
            $cliente->nif; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Morada</label>
            <input type="text" class="form-control" name="morada" value="<?php if(isset($cliente)) { echo
            $cliente->morada; }?>">
        </div>
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Localidade</label>
            <input type="text" class="form-control" name="localidade"value="<?php if(isset($cliente)) { echo
            $cliente->localidade; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Código Postal</label>
            <input type="text" class="form-control" name="codPostal"value="<?php if(isset($cliente)) { echo
            $cliente->codpostal; }?>">

        </div>

        <a href="router.php?c=cliente&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Editar Clientes</button>
    </form>
</div>