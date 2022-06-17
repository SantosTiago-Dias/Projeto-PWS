<div style="margin-left: 16%;">


    <form action="router.php?c=produto&a=update&id=<?=$produto->id?>" method="post">

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?php if(isset($produto)) { echo
            $produto->nome; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Preço</label>
            <input type="number" class="form-control" name="preco" value="<?php if(isset($produto)) { echo
            $produto->preco; }?>">
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlInput1" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" value="<?php if(isset($produto)) { echo
            $produto->stock; }?>">
        </div>


        <div class="mb-3" >

            <label for="iva">Taxa de Iva:</label>

            <select name="iva" id="iva">
                <?php foreach($ivas as $iva){
                    if($produto->iva_id == $iva->id){
                        echo '<option selected value="'. $iva->id .'"> '.$iva->taxa .'%</option>';
                    }
                    else{
                        echo '<option value="'. $iva->id .'"> '.$iva->taxa .'%</option>';
                    }
                }
                ?>
            </select>
        </div>


        <a href="router.php?c=produto&a=index"
           class="btn btn-danger" role="button">Voltar atras</a>
        <button class="btn btn-info">Editar Produto</button>
    </form>
</div>