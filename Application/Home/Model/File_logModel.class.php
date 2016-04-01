<?php

namespace Home\Model;
use Think\Model;

class File_logModel extends Model{

	public function add_log($data){

		$data['fid']=$data['id'];
		unset($data['id']);
		unset($data['pub_time']);
		$data['uid']=$_SESSION['uid'];
		$data['alter_time']=time();

		$File_log=D('File_log');

			if($File_log->add($data)){

				return true;

			}else{

				return false;

			}



	}
/*	public function log_list($uid){

		$

	}*/

}