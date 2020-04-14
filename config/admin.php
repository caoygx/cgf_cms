<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/4/13
 * Time: 16:11
 */
return [
    'menu' => [
        [
            'title'    => "订单相关",
            'url'      => '',
            'children' => [
                ["title" => '商品管理', "controller"=>"goods","action"=>"index"],
                ["title" => '订单管理',"controller"=>"order","action"=>"index"],
                ["title" => '快递',"controller"=>"express","action"=>"index"],

            ]
        ],
        [
            'title'    => "用户",
            'url'      => '',
            'children' => [
                ["title" => '用户管理',"controller"=>"user","action"=>"index", "url" => '/admin/user'],
                ["title" => '用户访问记录',"controller"=>"logRequest","action"=>"index", "url" => '/admin/logRequest'],

            ]
        ],
        [
            'title'    => "系统",
            'url'      => '',
            'children' => [
                ["title" => '编辑器',"controller"=>"user","action"=>"index"],
                ["title" => '清除缓存',"controller"=>"system","action"=>"clearCache"],
            ]
        ],
    ]
];