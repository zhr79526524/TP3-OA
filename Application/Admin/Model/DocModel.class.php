<?php
// 声明命名空间
namespace Admin\Model;
// 引入父类
use Think\Model;
// 声明并且继承父类
class DocModel extends Model{
    // 编写方法
    public function savedata($post,$file){
        // 判断是否提交文件
        if($file['size'] > 0){
            // 定义数组 
            $cfg = array(
                'rootPath'  =>   WORK_PATH . UPLOAD_PATH , //保存根路径
            );
            // 处理上传
            $upload = new \Think\Upload($cfg);
            // 开始上传
            $info = $upload -> uploadOne($file);
            if($info){
                $post['filepath'] = UPLOAD_PATH . $info['savepath'] . $info['savename'];
                $post['filename'] = $info['name'];
                $post['hasfile'] = 1;
            }else{
                $this -> error($upload -> getError());
                exit;
            }
        }
        $post['addtime'] = time();
        //返回值  
        return $this -> add($post);
    }
    // 修改数据
    public function update($post,$file){
        if($file['size'] > 0){
            // 定义数组 
            $cfg = array(
                'rootPath'  =>   WORK_PATH . UPLOAD_PATH , //保存根路径
            );
            // 处理上传
            $upload = new \Think\Upload($cfg);
            // 开始上传
            $info = $upload -> uploadOne($file);
            if($info){
                $post['filepath'] = UPLOAD_PATH . $info['savepath'] . $info['savename'];
                $post['filename'] = $info['name'];
                $post['hasfile'] = 1;
            }            
        }  
        // dump($post);die;
        return $this -> save($post);
    }
}
