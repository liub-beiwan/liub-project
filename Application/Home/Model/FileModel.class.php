<?php

namespace Home\Model;

use Think\Model;

class FileModel extends Model{


	public function change($id,$data){

		$file=D('File');

		$map['id']=$id;
	
		if(!$file->where($map)->save($data)){
			
			return false;

		}else{

			return true;
		}


	}

	public function get_cate_list(){

		$file=D('File');

		$map['pid']=array('eq','0');

		$re=$file->where($map)->select();

		return $re;

	}



}