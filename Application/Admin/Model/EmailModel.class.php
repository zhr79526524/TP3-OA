<?php
// 声明命名空间
namespace Admin\Model;
//  父类
use Think\Model;
// 自定义
class EmailModel extends Model{

    public function senddata($post,$file){
        if($file['error'] == 0){
            // 定义数组 
            $cfg = array(
                'rootPath'  =>   WORK_PATH . UPLOAD_PATH , //保存根路径
            );
            // 
            $upload = new \Think\Upload($cfg);// 实例化上传类
            // 开始上传
            $info = $upload -> uploadOne($file);
            if($info){
               $post['file']  = UPLOAD_PATH . $info['savepath'] . $info['savename'];
               $post['hasfile'] = '1'; // 0 没有文件 1有文件
               $post['filename'] = $info['name'];
            }
        }
        $post['from_id'] = session('id');
        $post['addtime'] = time();
        return $this -> add($post);
    }
}