<?php

class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('taxaiva'),
        array('descricao', 'message' => 'It must be provided'),

    );
}