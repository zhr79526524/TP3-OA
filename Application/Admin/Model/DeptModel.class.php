<?php
//声明命名空间 
namespace Admin\Model;
// 引入父类模型
use Think\Model;
//  
class DeptModel extends Model{
    // 自动验证定义
    protected $_validate = array(
        // 针对部门名称规则 必填 不能重复
        array('name','require','部门名称不能为空'),
        array('name','','部门名称已经存在 请更换',0,'unique'),
        // array('sort','number','排序必须为数字'),
        // 使用函数来验证
        array('sort','is_numeric','排序必须是数字',0,'function'),
    );
    // 字段映射定义
    protected $_map = array(
        // 字段映射
        'abc' => 'name',
        'sss' => 'sort',
    ); 
}