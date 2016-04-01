<?php

namespace Home\Model;
use Think\Model;

class CommentModel extends Model{


	public function pub_comment($fid,$uid,$content,$pid=0){

		$data[fid]=$fid;
		$data['uid']=$uid;
		$data['content']=$content;
		$data['pid']=$pid;
		$data['date']=time();

		$Comment=D('Comment');

			if($Comment->add($data)){
				return true;
			}else{
				return false;
			}


	}
	public function get_comment_list($fid,$get_username=true,$pid=0){

		$map['fid']=$fid;
		$map['pid']=$pid;

		$Comment=D('Comment');

		if(!$get_username){
			$result=$Comment->where($map)->select();

		}else{
			
			$result=$Comment->alias('c')->join('cds_user as u on c.uid=u.id')->where($map)->select();
		}

		 return $result;

	}



}