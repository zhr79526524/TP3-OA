<?php
namespace Admin\Controller;

use Think\Controller;

class UserController extends CommonController
{
    public function showlist(){
        //模型化数据库
        $model = M('user');
        // 分页步骤 总记录数
        $count = $model -> count(); 
        $this -> assign('count',$count);
        // 调用实例化模型
        $page = new \Think\Page($count,10);// 
        // 改变默认的内容值
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page -> setConfig('first','首页');
        $page -> setConfig('last','尾页');
        // 分页显示输出
        $show = $page -> show();
        // 分页传递模板
        // 传递模板 
        $this -> assign('show',$show);
        // $this -> assign('list',$list);
		$rows = M();
		// $sql = "SELECT t1.*,t2.name FROM sp_user as t1,sp_dept as t2 WHERE t1.dept_id = t2.id";
		// 使用table方法 
		$result = $rows 
		                 -> field('t1.*,t2.name as detpname')
		                 -> table('sp_user as t1,sp_dept as t2')
		                 -> where('t1.dept_id = t2.id')
						 -> limit($page->firstRow.','.$page->listRows)
		                 -> select();
		$this -> assign("result",$result);
		 // 展示模板
		$this -> display();
		// 传值显示
    }

    public function add(){  
		if(IS_POST){
				// 处理表单提交
				$model = M('user');
				//创建数据对象 
				$result = $model -> create();
				// 对象
				$result['addtime'] = time();
				// 传值
				$data = $model -> add($result);
				// 
				if($data){
					$this -> success('添加成功',U('showlist'),3);
				}else{
					$this -> error('添加失败 请检查');
				}
			}else{
				// 实例化数据
				$model = M('dept');
				//  查询
				$data = $model -> field('id,name') -> select();
				// 传值
				$this -> assign('data',$data);
				// 
				$this -> display();
			} 
    }
	// 统计信息
	public function messager(){
		// 查询表
		$model = M();
		// 		// SELECT t2.name as deptnames,COUNT(*) as count FROM sp_dept as t2,sp_user as t1 WHERE t1.dept_id = t2.id GROUP BY deptnames;
		$data = $model
					-> field('t2.name as deptname,count(*) as count')
					-> table('sp_dept as t2,sp_user as t1')
					-> where('t1.dept_id = t2.id')
					-> group('deptname')	
					-> select();
		// 进行拼接
		// dump($data);
		$str = '[';
		// ['Shanghai', 24.2],
		// [['总裁办','1']['技术部','1']['管理部','56']
		foreach($data as $key => $value){
			$str .= "['".$value['deptname']."',".$value['count']."],";
		}
		// 移除尾部的, 在进行拼接一个]
		$str = rtrim($str,',').']';
		// 模板传值显示
		$this -> assign('str',$str);
		// 页面显示
		$this -> display();	
	}
	
}