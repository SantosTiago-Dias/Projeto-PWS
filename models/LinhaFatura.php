<?php

class Linhafatura extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('produto')
    );
}