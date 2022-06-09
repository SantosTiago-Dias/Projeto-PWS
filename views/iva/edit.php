<div style="margin-left: 14%;">
    <form action="router.php?c=iva&a=update&id=<?=$iva->id?>" method="post">
        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Taxa de Iva</label>
            <input type="text" id="empresa" class="form-control" name="iva" value="<?php if(isset($iva)) { echo
            $iva->taxa; }?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descricao:</label>
            <textarea class="form-control" name="descricao" rows="3"><?php if(isset($iva)) { echo
                $iva->descricao; }?></textarea>
        </div>

        <a href="router.php?c=iva&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Editar Iva</button>
    </form>
</div>
