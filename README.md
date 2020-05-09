基于tp6和cgf的cms 模板用的是adminLET
===============

> 运行环境要求PHP7.1+。

### demo地址


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
1.访问新功能的地址会报错，因为文件还没生成，刷新下就好。
