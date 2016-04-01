<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录页</title>
</head>
<style type='text/css'>
	p{margin:0;
	  padding:0;
		}

	 a{
	  font-size:14px;
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
<?php if($_GET['action']== 'read'): ?><h3>查看文档</h3>

		<div>
			发布人：<?php echo ($info["username"]); ?>
		</div>
			<div>
			发布时间：<?php echo (date("Y-m-d H:i:s",$info["pub_time"])); ?>
		</div>
		<div>
			所属分类：<select name='cates'>
				<?php if( $ptitle["title"] == NULL ): ?><option value="<?php echo ($ptitle['id']); ?>">顶级分类</option>
				<?php else: ?>	
				<option value="<?php echo ($ptitle['id']); ?>"><?php echo ($ptitle['title']); ?></option><?php endif; ?>
			</select>
		</div>

		<div>
		发布标题：<input type='text' name='title' value="<?php echo ($info['title']); ?>"/>
		</div>
		<div>
		发布内容：<textarea name='content'><?php echo ($info['content']); ?>
		 </textarea>
		</div>
		<div>

			文档属性：<select name='attr'>
					<?php if($info['attr'] == 1): ?><option value='1'>公共</option>
					<?php else: ?>
					<option value='0'>私有</option><?php endif; ?>
				</select>
			</div>
		<div>----------------------------------------------------------------------------------------</div>
		<div>
			<form action='<?php echo U("Comment/pub_comment");?>' method='post'>
				我要评论：<textarea name='content'>
				      </textarea>
				      <input type='hidden' name='uid' value="<?php echo session('uid');?>"/>
				      <input type='hidden' name='fid' value="<?php echo ($info['id']); ?>"/>
				      <input type='submit' value='评论'/>
			</form>	      
			
		</div>
		<div style='margin-right:30%;text-align:left'>
			
				<span style='color:red;'>网友评论：</span>
	      			<?php if(is_array($comments)): foreach($comments as $key=>$comment): ?><p style='margin-left:10%;margin-top:5px'><span style='color:#bbb'><?php echo ($comment["username"]); ?>:&nbsp;&nbsp;</span><span><?php echo ($comment["content"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size:12px'><?php echo (date('Y-m-d H:i',$comment["date"])); ?></span></p><?php endforeach; endif; ?>

			
		</div>
<?php elseif($_GET['action']== 'edit'): ?>


			<h3>编辑文档</h3>

	<!-- 	<div>
			发布人：<?php echo ($info["username"]); ?>
		</div>
			<div>
			发布时间：<?php echo (date("Y-m-d H:i:s",$info["pub_time"])); ?>
		</div> -->
		<div>

		   <form action="<?php echo U('File/info');?>" method="post">
					分类：<select name='pid'>

					<?php if( $ptitle["id"] == 0): ?><option value="<?php echo ($ptitle['id']); ?>" selected='selected'>顶级分类</option><?php endif; ?>		
					

 							<?php if(is_array($cates)): foreach($cates as $key=>$cate): ?><option value="<?php echo ($cate["id"]); ?>" <?php if($cate["id"] == $info['pid']): ?>selected='selected'<?php endif; ?>><?php echo ($cate["title"]); ?></option><?php endforeach; endif; ?>
						</select>
				</div>

				<div>
				标题：<input type='text' name='title' value="<?php echo ($info['title']); ?>"/>
				</div>
				<div>
				内容：<textarea name='content'><?php echo ($info['content']); ?>
				 </textarea>
				</div>
				<div>

					属性：<select name='attr'>
							
							<option value='1' <?php if($info['attr'] == '1'): ?>selected='selected'<?php endif; ?>>公共</option>
							<option value='0' <?php if($info['attr'] == '0'): ?>selected='selected'<?php endif; ?> >私有</option><?php endif; ?>
						 </select>
				</div>

				<div>
		
					<input type='hidden' name='id' value="<?php echo ($info['id']); ?>"/>
					<input type='hidden' name='action' value='edit'/>
					<?php if($_GET['action']== 'edit'): ?><input type="submit" value='修改'/><?php endif; ?>

				</div>

			</form>	
		</div>

</if>

</body>
</html>