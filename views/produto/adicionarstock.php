<div style="margin-left: 16%;">


    <form action="router.php?c=produto&a=guardarstock&id=<?=$produto->id?>" method="post">

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input readonly type="text" class="form-control" name="nome" value="<?php if(isset($produto)) { echo
            $produto->nome; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Stock</label>
            <input readonly type="number" class="form-control" name="stock" value="<?php if(isset($produto)) { echo
            $produto->stock; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Quantidade de stock para adicionar:</label>
            <input type="number" class="form-control" name="nstock">
        </div>

        <a href="router.php?c=produto&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Editar Produto</button>
    </form>
</div>