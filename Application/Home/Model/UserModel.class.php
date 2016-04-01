<?php

namespace Home\Model;
use Think\Model;

class UserModel extends Model {

	funciton add($username, $password, $email, $phone){
		// 数据验证

		if( !$this->format_username($username) ){
			return false;
		}

		if( !$this->format_email($email) ){
			return false;
		}

		if( !$this->format_phone($phone) ){
			return false;
		}

		// 数据库操作


	}

	function format_username($username){
		if( preg_match('/^\w+$/', $username) ){
			return true;
		}else{
			return false;
		}
	}

}

