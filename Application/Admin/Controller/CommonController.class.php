<?php
// 命名空间
namespace Admin\Controller;
// 引入父类
use Think\Controller;
// 声明类 并且继承父类
class CommonController extends Controller{
    // 构造方法
    // public function __construct(){
    //     // 因为要继承  需要先构造父类
    //     parent::__construct；
    //     // 
    //     echo "666";
    // }

    public function _initialize(){
        // 传值接收
        $id = session('id');
        // 判断
        if(empty($id)){
            // 跳转页面
            $url = U('Login/login');
            // 
            echo "<script>alert('当前用户已过期 请重新登陆');top.location.href='$url';</script>";
        };
        $role_id = session('role_id'); // 获取当前权限分组的ID
        $RBAC_ROLE_AUTHS  = C('RBAC_ROLE_AUTHS');// 获取用户组的权限
        $userRbac = $RBAC_ROLE_AUTHS[$role_id];// 获取用户对应的权限

        // 使用常量获取路由控制器方法
        $controller = strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME);

        // 判断权限
        if($role_id > 1){
            //&& ——> 与，和；如A和B都满足条件才能执行某一结果
            // 取反值  存在 true 当前控制器下所有的                    不存在 fales  存在改正           控制器下的方法
            if(!in_array($controller.'/*',$userRbac) && !in_array($controller.'/'.$action,$userRbac)){
                $this -> error('您没有权限',U('Index/home'));
            }
        }

    }
}