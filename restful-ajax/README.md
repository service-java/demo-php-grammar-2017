#### RESTful 和　AJAX

* AJAX

```
// ajax基础知识


```

* REST

```
// json 实现的站点 本地数组数据
Site.class.php // 数据源
RestController // 根据URL做出判断与响应
SiteRestHandler.class.php 继承自 SimpleRest.class.php

http://localhost/hello-php/restful-ajax/site-by-json/site/list/
http://localhost/hello-php/restful-ajax/site-by-json/site/list/2/
// RestController.php?view=all
// RestController.php?view=single&id=$1



// rest-classinfo-xml
GET  http://localhost/restful/class
GET  http://localhost/restful/class/1    
POST http://localhost/restful/class?name=SAT班&count=23 新建一个班
PUT  http://localhost/restful/class/1?name=SAT班&count=23  更新指定班的信息（全部信息）
PATCH  http://localhost/restful/class/1?name=SAT班    更新指定班的信息（部分信息）
DELETE  http://localhost/restful/class/1 删除指定班
```
