# 修改内容
不再使用原本的检测方法，准确性过低，转而使用api检测获取网站状态码，目前准确度极高，仅对于开启了特定防火墙的站点无法获取正确的状态码
api部署文件`api.php`可放置在任意可访问路径，替换`Check.php`第`65行`接口即可，当然也可使用我的接口。
替换说明`https://domain/path/api.php?url=`
# 额外说明
如果你已经修改了typecho的默认后台路径，则需批量替换`/admin/extending.php`为`/你的后台/extending.php`
# 我的博客
[倾城于你](https://qninq.cn/)
---

原作者的Readme文件：
# AbnormalLinks-For-Typecho

插件基于 Handsome 主题的友链功能制作，Links 插件未做测试，鄙人不才，代码比较水，也还有很多可以完善的地方，**欢迎大佬们提出建议。**

## 特点

在前端（JavaScript）使用进行链接可用性检测，并能将可能失效的链接标记为失效链接（不会被删除）。目的是帮助快速检查友链状态，向无效的友链说拜拜！

## 注意

检测原理是检查`URL状态码`是否是`200`，以此来判断链接状态。

插件检测不一定准确，可能会误判为失效链接。建议点开链接确认一下再做处理。

* 限于前端检测的缘故，服务端禁止跨域也会返回错误
* 友链是`HTTPS`链接就不要填写`HTTP`链接（避免301）
* 避免友链通过`第三方页面跳转`（避免检测跳转页）
* 浏览器当前网络下站点`响应时间过长`会有失效报告

*卸载插件请先禁用插件，不要直接删除插件。*

## 更新

* 遇到异常返回错误状态码，方便排查问题

博客：[https://www.zhaoyingtian.com/archives/95.html](https://www.zhaoyingtian.com/archives/95.html)
