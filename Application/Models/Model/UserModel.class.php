<?php
namespace Models\Model;

use Think\Model;

/**
 * 对应数据表：user
 * 对应数据表：stone_member
 */
class UserModel extends Model
{
//		protected $tablePrefix = 'stone_';
//		protected $tableName = 'member';
    /**
     * ThinkPHP框架会自动的将表名转换成小写
     * 但是linux系统下数据库表的名称是区分大小写的
     * trueTableName会保留数据表的大小写
     */
//		protected $trueTableName = 'stone_AdminUser';

//    protected $fields = array(
//        'id',
//        'username',
//        'password',
//        'email',
//        'create_time',
//        'status',
//        '_pk' => 'id',
//        '_type' => array(
//            'id' => 'int',
//            'username' => 'char',
//            'password' => 'char',
//            'email' => 'varchar',
//            'create_time' => 'int',
//            'status' => 'tinyint'
//        )
//    );

//  查询条件的三种定义方式
    public function sql_1()
    {
        // 字符串
        $conditionString = 'status=1 OR is_vip=1';

        //数组
        $conditionArray = array(
            'status' => 1,
            'is_vip' => 1,
            '_logic' => 'OR'
        );

        //对象
        $conditionClass = new \stdClass();
        $conditionClass->status = 1;
        $conditionClass->is_vip = 1;
        $conditionClass->_logic = 'OR';
    }

    //表达式查询
    public function sql_2()
    {
        //eq:   =
        //neq:  <>
        //gt:   >
        //egt:  >=
        //lt:   <
        //elt:  <=
        //between
        //not between
        //in
        //not in
        $condition = array(
            'username' => array('eq', 'stone'),
            'email' => array('like', '%stone%'),
            'score' => array('egt', 1000),
            'age' => array('between', '20,35'),
            'id' => array('not in', '1,3,5'),
            //表达式，支持sql语法函数
            'score' => array('exp' => 'score+2'),
        );
    }

    //快捷查询
    public function sql_3()
    {
        $condition = array(
            'username|email|mobile' => I('post.account'),
            'password' => md5(I('post.password'))
        );
    }

    //区间查询
    public function sql_4()
    {
        $condition = array(
            'age' => array(
                array('egt', 18),
                array('elt', 35),
            ),
            'score' => array(
                array('elt', 99),
                array('egt', 1000),
                'or'
            ),
        );
    }

    //组合查询
    public function sql_5()
    {
        $subCondition = array(
            'status' => 1,
            'age' => array('egt', 18),
            '_logic' => 'AND'
        );

        $condition = array(
            '_string' => 'status=1 AND age>18',
            '_query' => 'status=1 & age>18 $ _logic=and',
            '_complex' => $subCondition
        );
    }

    //统计查询
    public function sql_6()
    {
        $this->count();
        $this->max('age');
        $this->min('age');
        $this->avg('age');
        $this->sum('age');
    }

    //sql查询
    public function sql_7()
    {
        M()->query('SELECT * FORM stone_user WHERE status=1');

        M()->execute('UPDATE stone_user SET status=0 WHERE id = 1');
    }

    //动态查询
    public function sql_8()
    {
        $this->getFieldByUsername('stone', 'email');
        $this->getByUsername('stone');
    }

    protected $_scope = array(
        'latest' => array(
            'order' => 'create_time desc',
            'limit' => 10
        ),
        'vip' => array(
            'where' => array(
                'is_vip' => 1
            ),
        ),
    );

//  获取最近注册10个用户
    public function getLatestUsers()
    {
//        $result = $this->order('create_time desc')->limit(10)->select();
        $result = $this->scope('latest', array('limit' => 20))->select();

        echo $result;
    }

//    获取最近注册的10个通过VIP认证的用户
    public function getLatestVipUsers()
    {
//        $condition = array(
//            'is_vip' => 1
//        );
//        $result = $this->where($condition)->order('create_time desc')->limit(10)->select();

        $result = $this->vip()->scope('latest')->select();

        echo $result;
    }

//    获取10个VIP认证用户，要求2015年1月1日之前注册，且按照积分score从高到低排序
    public function getSomeUsers()
    {
//        $condition = array(
//            'is_vip' => 1
//        );
//        $result = $this
//            ->where($condition)
//            ->where('create_time < ' . strtotime('2015-1-1'))
//            ->order('score desc')
//            ->limit(10)
//            ->select();

        $result = $this->vip('where', array('create_time < ' => strtotime('2015-1-1')))->scope('latest', array('order' => 'score desc'));

        echo $result;
    }

}

?>