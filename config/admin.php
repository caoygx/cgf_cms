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
                ["title" => '商品管理', "url" => '/admin/goods'],
                ["title" => '订单管理', "url" => '/admin/order'],
                ["title" => '快递', "url" => '/admin/express'],

            ]
        ],
        [
            'title'    => "用户",
            'url'      => '',
            'children' => [
                ["title" => '用户管理', "url" => '/admin/user'],
                ["title" => '用户访问记录', "url" => '/admin/logRequest'],

            ]
        ],
        [
            'title'    => "系统",
            'url'      => '',
            'children' => [
                ["title" => '编辑器', "url" => '/admin/index/editor'],
                ["title" => '网页截图', "url" => '/admin/slimer/'],
                ["title" => '清除缓存', "url" => '/admin/system/delRuntimeTemp/'],
                ["title" => '生成公众号url', "url" => '/admin/system/generateWeixinUrl/'],
            ]
        ],
    ]
];