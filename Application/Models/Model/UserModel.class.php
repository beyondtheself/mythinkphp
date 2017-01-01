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

    protected $fields = array(
        'id',
        'username',
        'password',
        'email',
        'create_time',
        'status',
        '_pk' => 'id',
        '_type' => array(
            'id' => 'int',
            'username' => 'char',
            'password' => 'char',
            'email' => 'varchar',
            'create_time' => 'int',
            'status' => 'tinyint'
        )
    );
}

?>