<?php

class Fatura extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('utilizadore'),
        array('cliente','class_name'=>'Utilizadore','foreign_key'=>'cliente_id')
    );

    static $has_many = array(
        array('linhafaturas')
   );
}