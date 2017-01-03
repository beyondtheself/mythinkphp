<?php
namespace Views\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$username = 'stone';
    	$email = 'stone@redpass.com';
    	$age = 18;
    	$birthday_year='2016';

    	$user = array(
    		'user' => $username,
    		'mail' => $email,
    		'age'  => $age
    	);

    	$this->assign('user',$user);
    	$this->assign('birthday_year',$birthday_year);

    	//好友数据变量赋值
    	$this->assign('friends',get_user_friends());

    	// $fetchContent = $this->fetch();
    	// $fetchContent = str_replace('stone', 'stone.php', $fetchContent);

    	// $this->show($fetchContent);


    	// $this->assign('user',$username);
    	// $this->assign('mail',$email);
    	// $this->assign('age',$age);

        $this->display();
    }

	public function friends(){
		//好友数据变量赋值
		$this->assign('friends',get_user_friends());
		$this->display();
	}
}