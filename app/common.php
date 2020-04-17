<?php

function show_img($v){
    return "<img src='{$v}' width='50' />";
}

function generate_admin_url($menuConfig){
    if(empty($menuConfig['controller'])) return '';
    $url = "/admin/".$menuConfig['controller'].'/'.$menuConfig['action'];
    return $url;
}

function getControllerUrl(){
    $pathinfo = app()->request->pathinfo();
    $pathinfo = explode('/',$pathinfo);
    //$module = $pathinfo[0];
    $controllerUrl = "/".$pathinfo[0]."/".$pathinfo[1];
    return $controllerUrl;
}

function haveUploadFile(){
    foreach ($_FILES as $k => $v) {
        if(!empty($v['tmp_name'])) return true;
    }
    return false;
}