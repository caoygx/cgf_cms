<?php

function show_img($v){
    return "<img src='{$v}' width='50' />";
}

function generate_admin_url($menuConfig){
    if(empty($menuConfig['controller'])) return '';
    $url = "/admin/".$menuConfig['controller'].'/'.$menuConfig['action'];
    return $url;
}