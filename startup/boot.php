<?php
require_once'vendor/autoload.php';

define('APP_NAME','Fatura+');//nome da aplicação variavel de ambiente
define('INVALID_ACESS_ROUTE','?c=login&a=index');

//configuração da base de daods
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');//dizer onde esta a os modelos
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/Projeto_PWC',
        )
    );

});

