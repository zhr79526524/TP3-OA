<?php
//
namespace Admin\Controller;
// 引入父类
use Think\Controller;
// 声明类并且继承父类
class EmptyController extends Controller{
	
	public function _empty(){
		$this -> display('Empty/error');
	}
}