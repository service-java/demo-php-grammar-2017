<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index() {
        if ($admin_name = session('admin_name')) {
            $this->assign('admin_name', $admin_name);
            $this->display();
        } else {
            $this->error('非法用户，请先登录！', U('login'));
 	    }
 	}


    public function login() {
        if (IS_POST) {
            $adminModel = M('admin');
            $adminInfo = $adminModel->create();
            $where = array(
                    'aname' => $adminInfo['aname'],
            );
            if ($realPwd = $adminModel->where($where)->getField('apwd')) {
                if ($realPwd == md5($adminInfo['apwd'])) {
                    session('admin_name', $adminInfo['aname']);
                    $this->success('用户合法，登录中，请稍候...', U('index'));
                    return;
                }
            }
            $this->error('用户名或密码不正确，请重试！');
            return;
        }
        $this->display();
    }

	public function logout(){
		session(null);
		$this->success('退出成功。',U('login'));
	}
}