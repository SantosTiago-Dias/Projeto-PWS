<div style="margin-left: 17%;">
    <form action="router.php?c=funcionario&a=update&id=<?=$funcionario->id?>" method="post">
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" id="empresa" class="form-control" name="username" value="<?php if(isset($funcionario)) { echo
            $funcionario->username; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php if(isset($funcionario)) { echo
            $funcionario->email; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php if(isset($funcionario)) { echo
            $funcionario->password; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Telefone</label>
            <input type="number" class="form-control" name="telefone" value="<?php if(isset($funcionario)) { echo
            $funcionario->telefone; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nif</label>
            <input type="number" class="form-control" name="nif" value="<?php if(isset($funcionario)) { echo
            $funcionario->nif; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Morada</label>
            <input type="text" class="form-control" name="morada" value="<?php if(isset($funcionario)) { echo
            $funcionario->morada; }?>">
        </div>
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Localidade</label>
            <input type="text" class="form-control" name="localidade"value="<?php if(isset($funcionario)) { echo
            $funcionario->localidade; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Código Postal</label>
            <input type="text" class="form-control" name="codPostal"value="<?php if(isset($funcionario)) { echo
            $funcionario->codpostal; }?>">

        </div>

        <a href="router.php?c=funcionario&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Editar funcionario</button>
    </form>
</div>