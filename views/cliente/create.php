<div style="margin-left: 17%;">
    <form action='router.php?c=cliente&a=store' method="post">
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" class="form-control" name="username">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Telefone</label>
            <input type="number" class="form-control" name="telefone">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nif</label>
            <input type="number" class="form-control" name="nif">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Morada</label>
            <input type="text" class="form-control" name="morada">
        </div>
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Localidade</label>
            <input type="text" class="form-control" name="localidade">
        </div>
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Código Postal</label>
            <input type="text" class="form-control" name="codPostal">
        </div>

        <a href="router.php?c=cliente&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Criar Cliente</button>
    </form>
</div>