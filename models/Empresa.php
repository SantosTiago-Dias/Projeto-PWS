<?php

class empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('nome'),
        array('email', 'message' => 'It must be provided'),
        array('telefone','is' => 9, 'message' => 'It must be provided'),
        array('nif','is' => 9,'message' => 'It must be provided'),
        array('morada', 'message' => 'It must be provided'),
        array('codPostal','is' => 9, 'message' => 'It must be provided'),
        array('Local', 'message' => 'It must be provided'),
        array('capSocial','only_integer' => true, 'message' => 'It must be provided'),
        array('descricao', 'message' => 'It must be provided'),
    );

    static $belongs_to = array(

    );
}