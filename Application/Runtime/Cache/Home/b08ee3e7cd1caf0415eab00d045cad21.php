<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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

	 
</style>
<body>
	<div>欢迎<?php echo session('username');?>回来！<a href='<?php echo U("Public/logout");?>'>退出</a></div>
<a href='<?php echo U("File/pub");?>'>发布文档</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo U("File/index");?>'>文档列表</a>
	<h4><a href='<?php echo U("File/index",array("belong"=>"All"));?>'>所有文档列表</a></h4>
	<h4><a href='<?php echo U("File/index",array("belong"=>"My"));?>'>我的文档列表</a></h4>
	<form action='<?php echo U("File/index");?>' method='post'>
	<div>
	<?php if($belong == 'My'): ?><h3>我的文档列表</h3>
		<input type='hidden' name='belong' value='My'/>
		搜索我的文档：<input type='text' name='title' value='' style='width:80px;'/><input type='submit' value='搜索'/>
	<?php else: ?>
		<h3>所有文档列表</h3>
		搜索公共文档：<input type='text' name='title' value='' style='width:80px;'/><input type='submit' value='搜索'/><?php endif; ?>	
		
	</div>
	<?php if(is_array($cates)): foreach($cates as $key=>$cate): ?><div>
			<?php echo ($cate['title']); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if($belong == 'My'): ?><a href="<?php echo U('File/info',array('id'=>$cate['id'],'action'=>'edit'));?>">
				编辑</a>
			<?php else: ?>
				<a href="<?php echo U('File/info',array('id'=>$cate['id'],'action'=>'read'));?>">
				查看</a><?php endif; ?>

		</div><?php endforeach; endif; ?>
</form>
</body>
</html>