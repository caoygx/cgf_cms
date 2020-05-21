<?php
namespace app\controller;

use app\BaseController;
use QL\QueryList;


class Home extends BaseController
{
    public $autoInstantiateModel=false;

    public function index(){
        $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($this->m);
        }
        if (!empty ($this->m)) {
            $this->_list($this->m);
        }

        $default_return_format = config('app.default_return_format','html');
        if($default_return_format == 'html' || $this->request->module=='admin'){
            $r = $this->cgf->generateListsTemplate();//生成模板
        }
        return $this->toview();
    }


}
