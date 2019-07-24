<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/thinkphp3.2.3 -/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/thinkphp3.2.3 -/Public/Admin/css/login.css" />
	<title>移动办公自动化系统</title>
	<style>
	.yzm cite {
    position: absolute;
    right: 164px;
    font-size: 16px;
    color: #fff;
	}
	.yzm cite img{
		border-radius: 0px 5px 5px 0px;
	}
	</style>
</head>
<body>
	<div id="container">
		<form action="<?php echo U('checklogin');?>" method="post">
			<div id="bd">
				<div class="login1">
					<div class="login-top"><h1 class="logo"></h1></div>
					<div class="login-input">
						<p class="user ue-clear">
							<label>用户名</label>
							<input type="text" name="username"/>
						</p>
						<p class="password ue-clear">
							<label>密&nbsp;&nbsp;&nbsp;码</label>
							<input type="password" name="password" />
						</p>
						<p class="yzm ue-clear">
							<label>验证码</label>
							<input type="text"  maxlength="4" name="code"/>
							<cite><img  style="padding-left: 30px" src="/thinkphp3.2.3 -/index.php/Admin/Login/code" alt="" onclick="this.src='/thinkphp3.2.3 -/index.php/Admin/Login/code/r'+Math.random()"></cite>
						</p>
					</div>
					<div class="login-btn ue-clear">
						<a href="javascript:;" class="btn">登录</a>
						<div class="remember ue-clear">
							<input type="checkbox" id="remember" />
							<em></em>
							<label for="remember">记住密码</label>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
    <div id="ft">CopyRight&nbsp;2014&nbsp;&nbsp;版权所有&nbsp;&nbsp;uimaker.com专注于ui设计&nbsp;&nbsp;苏ICP备09003079号</div>
</body>
<script type="text/javascript" src="/thinkphp3.2.3 -/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/thinkphp3.2.3 -/Public/Admin/js/common.js"></script>
<script type="text/javascript">
var height = $(window).height();
$("#container").height(height);

$("#bd").css("padding-top",height/2 - $("#bd").height()/2);

$(window).resize(function(){
	var height = $(window).height();
	$("#bd").css("padding-top",$(window).height()/2 - $("#bd").height()/2);
	$("#container").height(height);
	
});

$('#remember').focus(function(){
   $(this).blur();
});

$('#remember').click(function(e) {
	checkRemember($(this));
});

function checkRemember($this){
	if(!-[1,]){
		 if($this.prop("checked")){
			$this.parent().addClass('checked');
		}else{
			$this.parent().removeClass('checked');
		}
	}
}
//  jq代码
$(function(){
	// 获取from
	$('.btn').on('click',function(){
		// 事件处理
		$('form').submit();
	})
})
</script>
</html>