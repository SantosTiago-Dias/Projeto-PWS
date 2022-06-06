<?php

class Produtos extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('iva')
    );
}