<div style="margin-left: 17%;">
    <form action='router.php?c=iva&a=store' method="post">
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Taxa de Iva</label>
            <input type="number" class="form-control" name="iva">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descricao:</label>
            <textarea class="form-control" name="descricao" rows="3"></textarea>
        </div>

        <a href="router.php?c=iva&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Criar Iva</button>
    </form>
</div>
