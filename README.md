# LaF
**五中人失物招领平台**

------
## 介绍

**实物招领平台包含以下功能：**

* 发布 失物招领 / 寻物启事
* 支持图片上传
* 支持将已发布的内容设置为已取回 / 已找回


## 系统环境

* PHP >= 5.6
* MYSQL >= 5.5


## 安装流程

 1. 将 `import.sql` 导入数据库
 2. 进入 `application/config` 目录，编辑 `database.php` 和 `config.php` 文件，分别配置数据库信息和网站地址
 3. 编辑 `application/models/User_model.php`，在 `getUserToken` 函数中修改 Oauth 相关信息
 3. （如使用 nginx）为 codeigniter 配置伪静态


## 使用方法
1. 开箱即用


## TODO

 - 增加管理模块（而不是现在通过数据库来管理）
