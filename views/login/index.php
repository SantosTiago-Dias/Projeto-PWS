<?php require_once './views/layout/header_Front.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <?php
                if(isset($erro))
                {
                    echo "Erro: " . $erro;
                }
                ?>
                <form action="./router.php?c=login&a=login" method="post">
                    <label for="name">Nome</label>
                    <input style="color: black !important;" class="form-control" type="text" id="name" name="name" ><br>
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                    <br>
                    <button class="btn btn-primary" type="submit">Login</button>


                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php require_once './views/layout/footer.php'; ?>