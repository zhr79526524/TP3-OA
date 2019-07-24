<?php
// 声明命名空间
namespace Admin\Controller;
// 引入父类
use Think\Controller;
// 声明类
class OffController extends CommonController{

    public function add(){
        // 接收数据
        if(IS_POST){
            // 接收数据
            $post = I('post.');
            // 实例化模型 自定义
            $model = D('doc');
            // 数据保存  当前自定义模型下的方法 传值处理
            $result = $model -> savedata($post,$_FILES['file']);
            // 判断
            if($result){
                skip('添加成功','./showlist'); 
            }else{
                alert('添加失败');
            }
            // dump($post);
        }else{
            $this -> display();
        }
    }

    public function showlist(){
        // 查询 实例化模型
        $model = M('doc');
        // 
        $count = $model -> count();
        // 
        $this -> assign('count',$count);
        $result = $model ->select();
        // 传值
        $this -> assign('result',$result);
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
        // $this -> assign('list',$list)
		// $sql = "SELECT t1.*,t2.name FROM sp_user as t1,sp_dept as t2 WHERE t1.dept_id = t2.id";
		// 使用table方法 
        $result = $model -> limit($page->firstRow.','.$page->listRows) -> select();
        // 
		$this -> assign("result",$result);
        // 判断
        $this -> display();

    }
    // 下载方法
    public function download(){
        $id = I('get.id');
        // 实例化模型
        $data = M('doc') -> find($id);
        // 路径
        $file = WORK_PATH . $data['filepath'];
        // 输出文件流
        // 常用的值
        header("Content-type: application/octet-stream");
        // 输出位置 下载的文件明
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        // 输出缓冲区
        readfile($file);
    }
    // 查看
    public function showcontent(){
        // 接收
        $id = I('get.id');
        // 查询数据
        $data = M('doc') -> find($id);
        // 还原被转移的字符
        echo  htmlspecialchars_decode($data['content']);
    }

    public function edit(){
        // 获取数据
        if(IS_POST){
            // 处理提交
            $post = I('post.');
            //  自定义处理数据模型
            $model = D('doc');
            //                                 对应的为input name的值 file
            $result = $model -> update($post,$_FILES['file']);
            // dump($result);die;
            // 判断  0 == false 否则影响行数为0  无法进行判断 修改
            if($result == false){
                $this -> success('修改成功',U('showlist'));
            }else{
                alert('修改失败');
            }
        }else{
            $id = I('get.id');
            // 判断Id不能为空
            if(empty($id)){
                $this -> error('错误异常');
            }
            // 
            $data = M('doc') -> select($id);
            // 传值
            $this -> assign('data',$data);
            // dump($data);
            $this -> display();
        }
    }
}
