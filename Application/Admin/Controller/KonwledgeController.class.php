<?php
//  声明空间
namespace Admin\Controller;
// 父类文件
use Think\Controller;
// 
class KonwledgeController extends CommonController{

    public function add(){
        // 判断 
        if(IS_POST){
            // 接收数据
            $post = I('post.');
            // 传值判断 $where自定义的值
            $where = array(
                'title' => $post['title'],
                'author' => $post['author']
            );
            $rs = M('Konwledge') -> where($where) -> find();
            if($rs){
                $this -> error('列表名字相同 失败');
            }
            // 自定义实例化模型
            $model = D('Konwledge');
            // 调用自定义的方法
            $result = $model -> Konwdata($post,$_FILES['thumb']);
            if($result){
                $this -> success('录入成功',U('showlist'));
            }else{
                $this -> error('录入失败 请重试');
            }
            // dump($post);
        }else{
            $this -> display();
        }
    }

    public function showlist(){
        $count = M('Konwledge') -> count();
        // 查询
        $user = M('Konwledge');
        $this -> assign('count',$count);
        $page = new \Think\Page($count,5);// 
        // 改变默认的内容值
        $page -> rollPage = 5;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page -> setConfig('first','首页');
        $page -> setConfig('last','尾页');
        $show = $page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('show',$show);// 
        $list = $user-> limit($page->firstRow.','.$page->listRows)->select();
        $this -> assign('list',$list);
        // 页面
        $this -> display();
    }
    // 下载
    public function download(){
        $id = I('get.id');
        // 实例化模型
        $data = M('Konwledge') -> find($id);
        // 路径
        $file = WORK_PATH . $data['picture'];
        // 输出文件流
        // 常用的值
        header("Content-type: application/octet-stream");
        // 输出位置 下载的文件明
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        // 输出缓冲区
        readfile($file);
    }
}