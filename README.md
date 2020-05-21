基于tp6和cgf的cms 模板用的是adminLET
===============

> 运行环境要求PHP7.1+。

### 基本情况 
这是基于cgf的tp6的版本，还在开发中，问题不少。之前tp3做的更完善些。
tp3版本的地址：https://github.com/caoygx/cgf_demo

### demo地址
1. 后台管理 http://cgfcms.rrbrr.com/admin/goods/index
2. 前台接口 http://cgfcms.rrbrr.com/goods/index?ret_format=json

### cgf详情说明
https://github.com/caoygx/cgf_demo




## 安装

```
cd cgf_cms
composer indstall
```

或者直接解压vendor.zip





## 配置
1. 导入sql
2. 修改config/database.php

## 访问地址
http://www.cgfcms.com/admin 域名修改成自己的域名


## 注意
开启了强制路由，每新增一个功能，都要手动增加路由，否则无法访问。
1. 访问新功能的地址会报错，因为文件还没生成，刷新下就好。
2. BaseController.php屏蔽了一些错误输出，如果要显示可以去掉下面的代码： 
 error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED ^E_STRICT^E_WARNING); 
 
