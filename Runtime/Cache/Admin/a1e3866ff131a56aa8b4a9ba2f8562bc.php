<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/thinkphp3.2.3/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/thinkphp3.2.3/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息修改</h2></div>
<form action="<?php echo U('edit');?>" method="post">
	<div class="main">
	    <p class="short-input ue-clear">
	    	<label>部门名称：</label>
	        <input type="text" name="name" value="<?php echo ($data["name"]); ?>" placeholder="部门名称" />
		</p>
		<!-- 隐藏域添加 -->
		<input type="hidden" value="<?php echo ($data["id"]); ?>" name="id">
	    <div class="short-input select ue-clear">
	    	<label>上级部门：</label>
	        <div class="select-wrap">
	        	<select name="pid">
					<option value="0">顶级部门</option>
					<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["pid"]); ?>}" <?php if( $vol["id"] == $data["pid"] ): ?>selected="selected"<?php endif; ?>><?php echo ($vol["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	            </select>
	        </div>
	    </div>
	    <p class="short-input ue-clear">
	    	<label>排序：</label>
	        <input type="text" name="sort" placeholder="排序"  value="<?php echo ($data["sort"]); ?>"/>
	    </p>
	    <p class="short-input ue-clear">
	    	<label>备注：</label>
	        <textarea placeholder="备注" name="remark"><?php echo ($data["remark"]); ?></textarea>
	    </p>
	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" id="btnsubmit" class="confirm">确定</a>
	    <a href="javascript:;" id="btncancel" class="clear">清空内容</a>
	</div>
</form>
</body>
<script type="text/javascript" src="/thinkphp3.2.3/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/thinkphp3.2.3/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/thinkphp3.2.3/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

showRemind('input[type=text], textarea','placeholder');

$(function(){

	$('.confirm').on('click',function(){
		$('form').submit();
	})

	// 清空内容绑定事件
	$('.clear').on('click',function(){
		// 重置表单
		$('form')[0].reset();
	})
})
</script>
</html>