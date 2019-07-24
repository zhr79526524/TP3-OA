<?php
namespace Admin\Controller;

use Think\Controller;

class HomeController extends CommonController
{
    public function add()
    {
        if(IS_POST){
            // 实例化数据库
            $model = D('dept');
            // create方法
            $data = $model -> create();
            // 判断结果
            if(!$data){
                // 检测判断 
                $this -> error($model -> getError());
                exit;
            }
            // // 写入数据
            $result = $model -> add();
            // 判断
            if($result){
                // 进行跳转
                $this -> success('添加成功',U('showlist'));
            }else{
                // 失败跳转
                $this -> error('添加失败');
            }
        }else{
            // 实例化数据库
            $model = M('dept');
            // 查询
            $data = $model -> where('pid = 0') -> select();
            // 传值处理
            $this -> assign('data',$data);
            // 页面模板展示
            $this -> display();
        }
    }
    // 获取到页面的值
    public function showlist(){
        // 实例化模型
        $model = M('dept');
        // 
        $count = M('dept') -> count();
        $this -> assign('count',$count);
        $page = new \Think\Page($count,10);// 
        // 改变默认的内容值
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page -> setConfig('first','首页');
        $page -> setConfig('last','尾页');
        $show = $page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('show',$show);// 
        $result = $model-> limit($page->firstRow.','.$page->listRows)->select();
        // 
        // $result = $model -> order('id asc') -> limit(0,15) -> select();
        // 二次遍历 
        foreach($result as $key => $value){
            if($value['pid'] > 0){
                $info = $model -> find($value['pid']);
                // $value[]
                $result[$key]['dename'] = $info['name'];
            }
        }
        $this -> assign('result',$result);

        $this -> display();
    }
    // 跳转页面的方法
    public function edit(){
        // 
        if(IS_POST){    
            // 接收id
            $post = I('post.');
            dump($post);die;
            // 实例化模型
            $model = M('dept');
            // 
            $result = $model -> save($post);
            // 
            if($result !== false){
                skip('保存成功','./showlist');
            }else{
                alert('保存失败,请检查');
            }
        }else{
            // 接收ID
            $id = I('get.id');
            if(empty($id)){
                $this -> error('错误 进行跳转');
            }
            // 实例化模型
            $model = M('dept');
            // 查询
            $data = $model -> find($id);
            // 查询全部信息 供下拉列表使用
            $info = $model -> where('id !='.$id) -> select();
            // 
            $this -> assign('info',$info);
            // 变量模板传值
            $this -> assign('data',$data);
            // 模板展示
            $this -> display();
        }
    }

    // 修改数据
    public function del(){
        // 接收id
        $id = I('get.id');
        if(empty($id)){
            $this -> error('错误 进行跳转');
        };
        // 实例化
        $model = M('dept');
        // 
        $result = $model -> delete($id);
        // 
        // echo "5655";
        if($result){
            $this -> success('删除成功');
        }else{
            alert('删除失败 异常');
        }
    }
}