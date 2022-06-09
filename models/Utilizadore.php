<?php

class utilizadore extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username'),
        array('password')
    );

    static $has_many  = array(
        array('fatura')
    );
}