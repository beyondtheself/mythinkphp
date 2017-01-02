<?php
namespace Models\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $user = D('User');
////        dump($user->select());
//        dump($user->getDbFields());
//        $this->creteUserAR();
        $this->creteUser();

//        $this->deleteUser(4);
//        $this->updateUserStatusAR(7);
        $this->listUsers();
//        $this->showUser(5);

//        $userModel = D('User');


//        $condition = array(
//            'username' => array('EQ', 'stone'),
//            'status' => 1
//        );
//
//        $result = $userModel
//            ->where($condition)
//            ->order('create_time desc')
////            ->limit(2)
//            ->page(6, 5)
//            ->fetchSql(true)
//            ->select();
//        echo($userModel->getLastSql());
//        echo '<hr/>';
//        echo $result;
    }

//    新增用户
    private function creteUser()
    {
        $userAttribute = array(
            'username' => 'tom',
            'password' => md5('111'),
            'email' => 'tom@redpass.com',
            'create_time' => time(),
            'status' => 1
        );
        $userAttribute2 = array(
            'zhanghao' => 'tom2',
            'word' => md5('111'),
            'youjian' => 'tom2@redpass.com',
            'zhuceshijian' => time(),
            'zhuangtai' => 0
        );

        $userModel=D('User');

        $userModel->create($userAttribute2);
        $userModel->add();

//        D('User')->add($userAttribute);
    }

    private function creteUserAR()
    {
        $user = D('User');

        $user->username = 'stone';
        $user->password = md5('123');
        $user->email = 'stone@redpass.com';
        $user->create_time = time();
        $user->status = 1;

        $user->add();
    }

//    读取全部用户
    private function listUsers()
    {
        dump(D('User')->select());
    }

    //更新用户
    private function updateUserStatus($userId)
    {
        $userUpdateAttribute = array(
            'id' => $userId,
            'status' => 0
        );
        D('User')->save($userUpdateAttribute);
    }

    private function updateUserStatusAR($userId)
    {
        $user = D('User');
        $user->id = $userId;
        $user->status = 0;

        D('User')->save();
    }

//    删除用户
    private function deleteUser($userId)
    {
        D('User')->delete($userId);
    }

    private function showUser($userId)
    {
        dump(D('User')->find($userId));
    }

    private function lesson_1()
    {
        //new
        $user_model = new \Models\Model\UserModel();

        //M
        $user_m_model = M('User');

        //D
        $user_d_model = D('User');

        $empty_model = new \Think\Model();

        $empty_m_model = M();

        $empty_d_model = D();
    }
}