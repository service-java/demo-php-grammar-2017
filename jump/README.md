#### PHP框架

* 说明

```
主要是 各种框架的简单演示
```

* 模板引擎smarty

```
// 左右结束符号
<{}> {##} {//}

// 在tpl中的注释 以此类推
{#*  
#}

// section循环语句

// 设置缓存
```

* cakePHP

```
// 安装

// php.ini intl扩展

// 数据库
config/app.php // app.default.php 相当于备份 而app.php不能上传泄露

cd cakephp/bin
cake bake all students // 将自动生成数据表MVC、测试等等 注意更新
http://localhost/hello-php/jump/cakephp/students

接着修改
cakephp/src/Model/Entity/Student.php

protected function _setPassword($value)
{
  $hasher = new DEfaultPasswordHasher();
  return $hasher->hash($value);
}

当然,这个密码加密只是对于之后的增改才有效
之前的数据当然还是一样的
```

* cakePHP使用

```
// 1. 命名方法
控制器 StudentsController

NewStudents 对应数据库表名为 New_Students
字段 new_friend
外键 score_id

文件和类的命名遵循PSR-0/PSR-4规范

// 2. 语言本地化 config/bootstrap.php
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));
// ini_set('intl.default_locale', 'cn');

在src 新增Locale\cn\default.po

msgid "Are you sure you want to delete record {0} ?"
msgstr "你是否确定删除记录 {} ?"

PHP调用 echo __('New Student');


// 3.路由设置 cake/config/routes.php
对应位置新增 // 可以不指定action
// $routes->connect('/students/*', ['controller' => 'Students', 'action' => 'view']);

eg. $routes->connect('/pups/:actions/*', ['controller' => 'Students']);
http://localhost/hello-php/jump/cakephp/pups/:action

// 快速完成URL的书写 view.ctp /src/Template/Students
use Cake\Routing\Router;
echo Router::url(['controller' => 'Students', 'action' => 'view', 'id' => 2]);

echo $this->Html->link('查看', [
  'controller' => 'Students',
  'action' => 'view',
  'id' => 3,
  'classid' => '5'
]);
// 路由元素
# 允许设置URL的散列片段
_ssl 将生成的URL转化成HTTPS

// 4. 控制器的使用
use App\Controller\AppController; // 继承

public function action()
{
  $view = '/abc';
  $this->render($view); // 放在方法的最后

  // $this->set('name','kitty');  // 传值给视图
  // return $this->redirect(['controller'=>'Success', 'action'=>'login']); // 转向其他页面
}

// 5. 视图的使用
在src\Controller 新建UsersController.php
新建 src\Template\Users\index.ctp

访问 http://localhost/hello-php/jump/cakephp/users
```

* cakePHP 数据库操作

```php
$result = $students
  -> find()
  -> where(['id IN' => $idArray])
  -> count(); // 返回记录的总数


// 也可以直接SQL 语句
// 安全传参
绑定参数处理传递数组，还可以索引方式、名称方式
$stmt->bindValue(1, 'tom', 'string');
$stmt->bindValue(2, 'M', 'string');

$stmt = $connection->prepare('SELECT * FROM students WHERE name = :name');
$stmt->bindValue('name', 'tom', 'string');   
```

* CodeIgniter

```php
// Atom安装codeIgniter的插件先

// 配置数据库
// sql文件和cakephp 是同一个
application/config database.php $db['default']
'db_debug' => true

// New application/models/Studentmodel.php
// New application/views/showstudent.php
// New application/controllers/Student.php
访问 http://localhost/hello-php/jump/ci-demo/index.php/Student


// 设置网站地址
application/config/config.php
$config['base_url'] = 'http://www.abc.com' // 没有则ci自行猜测

// 修改网站的默认配置
application/config/routes.php
$route['default_controller'] = 'student'

// 数据库配置
$active_group
$autoload['libraries'] = array('database');

// 路由配置
:num
:array_change_key_case

// 取消URL中的index.php httpd.conf  
#LoadModule rewrite_module modules/mod_rewrite.so
AllowOverride None -> AllowOverride ALL

.htaccess
```

* CodeIgniter 使用技巧

```
// URL辅助函数
// Form辅助函数
// HTML辅助函数
// 数据库操作

$result = $this->db->get('student')

$this->db->from('students');
$this->db->select('name, gender');
$this->db->order_by('name');
$this->db->where('name', 'tom');
$result = $this->db->get();
```
