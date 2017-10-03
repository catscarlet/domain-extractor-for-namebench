# 域名导出工具（Chrome、SS）

I didn't have time to write it in English.

## 简介

个人常年使用 namebench 优化DNS设置。但是其中内置的 alexa-top-2000-domains.txt 并没什么意义，大部分都是在国内无法访问的网站。因此制作了这么一个工具，能把 Chrome 的历史记录导出，并与 ss-libev 的日志文件做差集。这样就可以得到自己常用并且需要国内DNS服务器解析的域名列表了。

## 文件构成

核心文件：

- extractDomainFromChrome.php
- extractDomainFromSslibevLog.php

测试脚本：

- chrome_test.php
- ss_test.php
- diff_test.php

日志文件：

- History（Chrome历史记录文件，项目未包含样本）
- ss.log（项目包含样本）

## 使用方式

首先确保 PHP 环境包含 **sqlite3**，Chrome 的历史记录是 sqlite 格式的，因此需要使用 sqlite 环境。针对于 Ubuntu 16.04 和 PHP7.0 环境，可以执行 `apt-get install php7.0-sqlite3` 安装。

### Chrome部分

将 Chrome 的 History 文件（一般位置：`C:\Users\cat\AppData\Local\Google\Chrome\User Data\Default\History`）复制到项目目录下。

执行`php chrome_test.php`测试效果。

### SS部分

将 SS 的日志文件复制到项目目录下，并保存为`ss.log`。

执行`php ss_test.php`测试效果。

### 输出结果

执行`php diff_test.php`

```
A 0x3.me.
A 0x9.me.
A 1000yun.cn.
A 100oj.huijiwiki.com.
A 107cine.com.
A 144.dragonparking.com.
A 155384.co.
A 24timezones.com.
A 25.media.tumblr.com.
A 36kr.com.
A 3c.ltn.com.tw.
A 3ds.duowan.com.
A 3ds.guide.
A 3ds.tgbus.com.
A 3g.163.com.
....
```

## 已知问题

Chrome 的历史记录输出是全时期的，而 ss 的日志可能是短期的，所以可能会有部分应该被差掉的元素仍然保存在最终结果中。
