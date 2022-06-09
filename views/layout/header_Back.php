<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?= APP_NAME ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/css/adminlte.min.css">
    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="./public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./public/dist/js/demo.js"></script>
    <script src="https://kit.fontawesome.com/9646161aa2.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <h1><a href="?c=site" class="nav-link"><?= APP_NAME ?></a></h1>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <a href="?c=login&a=logout">Logout</a>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="?c=site" class="nav-link">

            <h1><?= APP_NAME ?> </h1>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="./public/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $nome ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a  class="nav-link">

                            <p>
                                Faturas

                            </p>
                        </a>

                        <ul class="nav nav">
                            <?php if($role=='Admin' || $role =='Funcionario'){?>
                            <li class="nav-item">
                                <a href="router.php?c=fatura&a=create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Adicionar Faturas</p>
                                </a>
                            </li>
                            <?php } ?>

                            <li class="nav-item">
                                <a href="router.php?c=fatura&a=index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver Faturas</p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <?php if($role=='Admin'){?>
                    <li class="nav-item">
                        <a  class="nav-link">

                            <p>
                                Funcionarios

                            </p>
                        </a>
                        <ul class="nav nav">
                            <li class="nav-item">
                                <a href="./public/index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Adicionar Funcionarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./public/index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver Funcionarios</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($role=='Admin' || $role='Funcinario'){?>
                    <li class="nav-item">
                        <a  class="nav-link">

                            <p>
                                Empresa

                            </p>
                        </a>
                        <ul class="nav nav">
                            <li class="nav-item">
                                <a href="?c=empresa&a=index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver Empresas</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($role=='Admin' || $role='Funcinario'){?>
                    <li class="nav-item">
                        <a  class="nav-link">

                            <p>
                                Clientes

                            </p>
                        </a>
                        <ul class="nav nav">
                            <li class="nav-item">
                                <a href="./public/index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver Clientes</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($role=='Admin' || $role='Funcinario'){?>
                    <li class="nav-item">
                        <a  class="nav-link">
                            <p>
                                Gestão
                            </p>
                        </a>
                        <ul class="nav nav">
                            <li class="nav-item">
                                <a href="router.php?c=produto&a=index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Produtos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./public/index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Stock</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?c=iva&a=index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>IVA</p>
                                </a>
                            </li>
                            <?php } ?>

                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- /.navbar -->