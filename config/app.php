<?php
// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

return [
    // 应用地址
    'app_host'         => env('app.host', ''),
    // 应用的命名空间
    'app_namespace'    => '',
    // 是否启用路由
    'with_route'       => true,
    // 是否启用事件
    'with_event'       => true,
    // 默认应用
    'default_app'      => 'index',
    // 默认时区
    'default_timezone' => 'Asia/Shanghai',

    // 应用映射（自动多应用模式有效）
    'app_map'          => [],
    // 域名绑定（自动多应用模式有效）
    'domain_bind'      => [],
    // 禁止URL访问的应用列表（自动多应用模式有效）
    'deny_app_list'    => [],

    // 异常页面的模板文件
    'exception_tmpl'   => app()->getThinkPath() . 'tpl/think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'    => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'   => false,


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