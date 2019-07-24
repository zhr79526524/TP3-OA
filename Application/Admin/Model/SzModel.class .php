<?php
//声明命名空间 
namespace Admin\Model;
// 引入父类模型
use Think\Model;
//  
class SzModel extends Model{
        // 实际数据表名（包含表前缀） 输入真实表明
        protected $trueTableName = 'sz';
}