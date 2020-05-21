<?php
namespace app\controller;
use app\BaseController;

class Error extends BaseController
{
    public function __call($method, $args)
    {
        return 'error request!';
    }
}