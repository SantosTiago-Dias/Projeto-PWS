<?php

class utilizadore extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username'),
        array('password')
    );
}