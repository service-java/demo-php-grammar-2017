<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
  public function index()
  {
    $user = array(
      'name' => 'Tom',
      'gender' => '男',
      'grade' => '2',
      'favorite' => 'PingPeng'
    );

    $this->set($user); // view会用h(gender)方式接


    $students = TableRegistry::get('Students');
    // $result = $students -> find();
    $result = $students
      -> find()
      -> select(['id', 'name', 'gender', 'favorite'])
      -> where(['id > ' => 1])
      -> order(['created' => 'ASC'])
      -> limit(10)
      -> page(1); // 当前显示页
    $this->set('result', $result); // 传参给view

    // $this->layout = 'index'; // 使用src/Template/Layout/index 视图
    $this->viewBuilder()->layout('index'); // 新方法
  }

  public function sqlview()
  {
    $this->viewBuilder()->layout('index'); // 新方法
  }
}
