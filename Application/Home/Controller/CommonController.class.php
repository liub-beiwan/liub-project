<?php

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{

	public function validate_login(){

		if(!$_SESSION['username'] || !$_SESSION['uid']){
			$this->error('请先登录！',U('Public/login'));
		}

	}

}