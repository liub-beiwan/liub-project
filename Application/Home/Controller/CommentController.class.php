<?php

namespace Home\Controller;
use Think\Controller;

class CommentController extends CommonController{

	public function pub_comment(){

		self::validate_login();

		if(IS_POST){

			$Comment=new \Home\Model\CommentModel();

			if($Comment->pub_comment($_POST['fid'],$_POST['uid'],$_POST['content'])){

				$this->success('发表评论成功！');

			}else{

				$this->success('发表评论失败！');
			}

		}

	}


}