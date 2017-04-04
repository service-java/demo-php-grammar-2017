#### 语法

* basic-and-php7

```
echo print printf
作用域细节体现
魔术变量

随机数
datetime date等日期函数

error exception 异常处理机制
```

* db

```
Mysqli

PDO
```

* form-arr-str-regex-filter

```
表单提交

数组 多维数组

字符串

简单的正则表达式

过滤器
```

* session-cookie

```
cookie 简单操作

session


// 登录注册
// 判断是否为空 empty
if(empty($_POST)){
    die('没有表单提交，程序退出');
}

// 提交后的判空
$check_fields = array('username','password','email');
foreach($check_fields as $v){
    if(empty($_POST[$v])){
        die('错误：'.$v.'字段不能为空！');
    }
}

// 转义处理, 防注入
$username = mysql_real_escape_string($username);



```
