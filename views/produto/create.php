<div style="margin-left: 17%;">
    <form action='router.php?c=produto&a=store' method="post">


        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Preço</label>
            <input type="number" class="form-control" name="preco">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock">
        </div>


        <div class="mb-3" >

        <label for="iva">Taxa de Iva:</label>

        <select name="iva" id="iva">
            <?php foreach($ivas as $iva){?>
                <option value="<?= $iva->id ?>"><?= $iva->taxa ?>%</option>
            <?php } ?>

        </select>

        </div>


        <a href="router.php?c=produto&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Criar Produto</button>
    </form>
</div>