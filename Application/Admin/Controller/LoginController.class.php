<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    // 页面显示
    public function login(){
        $this -> display();
    }
    // 验证码
    public function code(){
        $cog = array(
            'fontSize' => 12, // 验证码字体大小(px)
            'useCurve' => false, // 是否画混淆曲线
            'useNoise' => false, // 是否添加杂点
            'imageH'   => 39, // 验证码图片高度
            'imageW'   => 82, // 验证码图片宽度
            'length'   => 4, // 验证码位数
            'fontttf'  => '4.ttf', // 验证码字体，不设置随机获取
            'bg'       => array(93, 255, 27), // 背景颜色
        );
        // 进行传值
        $verify = new \Think\Verify($cog);
        // 图片输出
        $verify -> entry();
    }
    // 登陆函数
    public function checklogin(){
        // 用I 因为有验证码 不用数据对象
        $post = I('post.');
        // 检测验证码
        $verify = new \Think\Verify();
        //
        $result = $verify -> check($post['code']);
        // 判断
        if($result){
            // 实例化数据
            $model = M('user');
            // 删除验证码
            unset($post['code']);
            // 查询
            $data = $model -> where($post) -> find();
            // 
            if($data){
                // 存在用户 保存信息到session中  跳转到后台首页
                session('id',$data['id']);
                session('username',$data['username']);
                session('role_id',$data['role_id']);
                // 跳转到首页 自己封装的函数
                skip('登陆成功 跳往首页','../Index/index');
            }else{
                alert('用户名或者密码错误');
            }
            // dump($data);
        }else{
            alert('验证码错误 请重新输入');
        }
        // dump($result); 
    }
    // 推出
    public function outs(){
        // 清楚 session
        session(null);
        // 
        skip('退出成功','../Login/login');
    }
}