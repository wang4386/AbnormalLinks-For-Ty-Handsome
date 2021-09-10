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
