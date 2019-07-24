<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/thinkphp3.2.3 -/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/thinkphp3.2.3 -/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/thinkphp3.2.3 -/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .id{ width:63px; text-align: center;}
	table tr .name{ width:118px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:17px;}
	table tr .dept_id{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:80px; padding-left:13px;}
	table tr .tel{ width:113px; padding-left:13px;}
	table tr .email{ width:160px; padding-left:13px;}
	table tr .addtime{ width:160px; padding-left:13px;}
	table tr .operate{ padding-left:13px;}
	tbody .file,.author,.content{padding-left: 13px;}
	tbody .file a{vertical-align:65px; margin-left: 10px;color: black;}
	tbody .file a:hover{color: red;}
</style>
</head>

<body>
<div class="title"><h2>知识管理</h2></div>
<div class="table-operate ue-clear">
	<a href="/thinkphp3.2.3 -/index.php/Admin/Konwledge/add" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="id">序号</th>
                <th class="name">标题</th>
				<th class="file">缩略图</th>
                <th class="content">内容</th>
                <th class="author">作者</th>
				<th class="addtime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            	<td class="id"><?php echo ($vol["id"]); ?></td>
                <td class="name"><?php echo ($vol["title"]); ?></td>
				<td class="file"><img src="/thinkphp3.2.3 -<?php echo ($vol["thumb"]); ?>" alt=""><?php if(!empty($vol["thumb"])): ?><a href="/thinkphp3.2.3 -/index.php/Admin/Konwledge/download/id/<?php echo ($vol["id"]); ?>">[下载]</a><?php endif; ?></td>
                <td class="content"><?php echo (msubstr($vol["content"],0,15)); ?></td>
                <td class="author"><?php echo ($vol["author"]); ?></td>
                <td class="addtime"><?php echo (date('Y-m-d H:m:s',$vol["addtime"])); ?></td>
                <td class="operate">
                	<a href ='javascript:;'>查看</a> 
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
	<div class="pagin-list">
		<?php echo ($show); ?>
	</div>
	<div class="pxofy">每页显示 5 条记录，总共<?php echo ($count); ?>条记录</div>
</div>
</body>
<script type="text/javascript" src="/thinkphp3.2.3 -/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/thinkphp3.2.3 -/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/thinkphp3.2.3 -/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>