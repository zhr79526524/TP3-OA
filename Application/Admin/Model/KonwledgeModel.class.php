<?php
//声明命名空间 
namespace Admin\Model;
// 引入父类模型
use Think\Model;
//  
class KonwledgeModel extends Model{
    
    public function  Konwdata($post,$file){

        if($file['error'] == 0){
            // 定义数组 
            $cfg = array(
                'rootPath'  =>   WORK_PATH . UPLOAD_PATH , //保存根路径
            );
            // 处理上传
            $upload = new \Think\Upload($cfg);
            // 开始上传
            $info = $upload -> uploadOne($file);
            // 
            if($info){
                // 补全字段
                $post['picture'] = UPLOAD_PATH . $info['savepath'] . $info['savename'];
                // 
                $image = new \Think\Image(); 
                $image->open(WORK_PATH . $post['picture']);// 生成一个缩放后填充大小150*150的缩略图并保存为thumb.jpg
                // 传值 更改名字
                $image->thumb(150, 150,\Think\Image::IMAGE_THUMB_FILLED)->save(WORK_PATH .UPLOAD_PATH .$info['savepath'] . 'thumb_' .$info['savename']);
                // 补全
                $post['thumb'] = UPLOAD_PATH .$info['savepath'] . 'thumb_' .$info['savename'];
            }else{
                $this -> error($upload -> getError());
                exit;
            }         
        }
        // 时间戳
        $post['addtime'] = time();

        return $this -> add($post);
    }

}