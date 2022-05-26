<?php
require_once './controllers/BaseController.php';

class SiteController extends BaseController
{
    function index()
    {
        $this->makeView('site', 'index');
    }
}