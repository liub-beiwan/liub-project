<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录页</title>
</head>
<style type='text/css'>
	 form{	
	  margin:auto;
	  margin-top:60px;
	  background-color:#999;
	  width:250px;
	 }
	 a{
	  font-size:14px;
	 }
	div, h3{
	 text-align:center;
	 margin-top:10px;
	 }
	 .button{
	 width:100px;
	 }
	 
</style>
<body>
	<form action ='<?php echo U("Public/login");?>'  method='post' >
		<h3>会员登录</h3>
		<div>用户名：<input type='text' name='username' value=''/></div>
		<div>密&nbsp;&nbsp;&nbsp;码：<input type='password' name='password' value=''/></div>
		<div>验证码：<input style='width:50px' type='text' name='captha' value=''/><a style='line-height:-10px;' href='<?php echo U('Public/login');?>'><img  style='line-height:50px;' src="<?php echo U('Public/captha');?>" alt="verify_code"></a></div>
		<div><input class='button'  type='submit'  value='登录'/></div>
		<div><a href='<?php echo U("Public/regist");?>'>注册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo U("Public/repass");?>'>忘记密码?</a></div>
	
	</form>
</body>
</html>