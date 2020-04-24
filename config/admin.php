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
            'title'    => "数据",
            'url'      => '',
            'children' => [
                ["title" => 'APP', "controller"=>"app","action"=>"index"],
                ["title" => '游戏', "controller"=>"game","action"=>"index"],
                ["title" => 'GMV', "controller"=>"gmv","action"=>"index"],
                ["title" => '手机存量', "controller"=>"mobile","action"=>"index"],
                ["title" => '在线教育', "controller"=>"edu","action"=>"index"],
                ["title" => '智能手表', "controller"=>"watch","action"=>"index"],
                ["title" => '招聘',"controller"=>"job","action"=>"index"],
                ["title" => '平板电视',"controller"=>"tv","action"=>"index"],

            ]
        ],
       /* [
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
        ],*/
    ]
];