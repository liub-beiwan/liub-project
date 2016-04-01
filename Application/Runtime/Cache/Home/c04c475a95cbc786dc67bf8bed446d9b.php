<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录页</title>
</head>
<style type='text/css'>

	div{
	 margin-top:20px;
	 background-color:#eee;
	 }
	div, h3{
	 text-align:left;
	 margin-top:10px;
	 }
	 .button{
	 width:100px;
	 }
	 
</style>
<body>
	<div>欢迎<?php echo session('username');?>回来！<a href='<?php echo U("Public/logout");?>'>退出</a></div>
	<a href='<?php echo U("File/pub");?>'>发布文档</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo U("File/index");?>'>文档列表</a>
	<h3>发表文档</h3>
	<form action='<?php echo U("File/pub");?>' method='post'>
	<div>
		<select name='cates'>
			<option value='0'>添加分类</option>
			<?php if(is_array($pcates)): foreach($pcates as $key=>$cate): ?><option value='<?php echo ($cate["id"]); ?>'><?php echo ($cate['title']); ?></option><?php endforeach; endif; ?>
		</select>
	</div>

	<div>
	标题：<input type='text' name='title' value=''/>
	</div>
	<div>
	内容：<textarea name='content'>
	 </textarea>
	</div>
	<div>
		<select name='attr'>
			<option value='0'>私有</option>
			<option value='1'>公共</option>
		</select>
	</div>
	<div>
		<input type='submit' value='发表'/>
	</div>
</form>
</body>
</html>