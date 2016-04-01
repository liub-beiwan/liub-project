<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>注册页</title>
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
	<form action ='<?php echo U("Public/regist");?>'  method='post' >
		<h3>会员注册</h3>
		<div>用户名：<input type='text' name='username' value=''/></div>
		<div>密&nbsp;&nbsp;&nbsp;码：<input type='password' name='password' value=''/></div>
		<div>确认密码：<input type='password' name='repass' value=''/></div>
		<div>email：<input type='text' name='email' value=''/></div>
		<div>手机：<input type='text' name='phone' value=''/></div>
		<div><input class='button'  type='submit'  value='注册'/></div>
		
	
	</form>
</body>
</html>