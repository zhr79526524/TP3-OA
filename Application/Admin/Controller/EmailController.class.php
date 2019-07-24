<?php
// 命名空间
namespace Admin\Controller;
// 父类
use Think\Controller;
// 声明累
class EmailController extends CommonController{

    public function send(){
        if(IS_POST){
            $post = I('post.');
            $row = M('email') -> where($post['to_id'] .'= 0') -> select();
            if($row){
                $this -> error('请选择收件人');
            }
            // 自定义方法
            $model = D('email');
            // 
            $result = $model -> senddata($post,$_FILES['file']);
            // 

            // 
            if($result){
                // 成功
                $this -> success('邮件发送成功',U('sendbox'));
            }else{
                $this -> error('邮件发送失败');
            }
        }else{
            // 查询数据 下拉菜单
            $data = M('user') -> field('id,truename') -> where('id != '.session('id')) -> select();
            // 传值
            $this -> assign('data',$data);
            // 显示
            $this -> display();
        }

    }

    public function sendbox(){
        // SELECT t1.*,t2.truename FROM sp_email as t1,sp_user t2 WHERE t1.to_id = t2.id
        // 实例化模型
        //SELECT t1.*,t2.truename FROM sp_email as t1 left join sp_user as t2 on t1.to_id = t2.id where t1.from_id = 
        $count = M('email') -> field('t1.*,t2.truename') -> alias('t1') -> join('left join sp_user as t2 on t1.to_id = t2.id') -> where('t1.from_id =' .session('id')) -> count();
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
        $data = M('email') -> field('t1.*,t2.truename') -> alias('t1') -> join('left join sp_user as t2 on t1.to_id = t2.id') -> where('t1.from_id =' .session('id')) -> limit($page->firstRow.','.$page->listRows) -> select();
        // 传值
        $this -> assign('data',$data);
        // 显示
        $this -> display();

    }

    public function download(){
        $id = I('get.id');
        // 实例化模型
        $data = M('email') -> find($id);
        // 路径
        $file = WORK_PATH . $data['file'];
        // 输出文件流
        // 常用的值
        header("Content-type: application/octet-stream");
        // 输出位置 下载的文件明
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        // 输出缓冲区
        readfile($file);
    }
    public function recbox(){
        // SELECT t1.*,t2.truename FROM sp_email as t1 left join sp_user as t2 on t1.from_id = t2.id where t1.to_id = 
        $count =  M('email') -> field('t1.*,t2.truename') -> alias('t1') -> join('left join sp_user as t2 on t1.from_id = t2.id') -> where('t1.to_id =' .session('id')) -> count();
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
        // 传值
        $data = M('email') -> field('t1.*,t2.truename') -> alias('t1') -> join('left join sp_user as t2 on t1.from_id = t2.id') -> where('t1.to_id =' .session('id')) -> limit($page->firstRow.','.$page->listRows) -> select();
        $this -> assign('data',$data);
        $this -> display();

    }

    public function showcontent(){
                // 接收
        $id = I('get.id');
        // 查询数据
        $data = M('email') -> where('id = '.$id.' and to_id =' . session('id')) -> find();
        if($data['isread'] == '0'){
            $data['isread'] = '1';
            $mode = M('email') -> save($data);
        }
        // 还原被转移的字符
        echo  $data['content'];
    }

    public function getEmail(){
        if(IS_AJAX){
            // 实例化模型
            $model  = M('email') -> where('isread = 0 and to_id = '.session('id')) -> count();
            // 输出值 ajax进行接受
            echo $model;
        }   
    }
}