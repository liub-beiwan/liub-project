<?php
namespace Home\Controller;

use Think\Controller;

//use Home\Model;

class FileController extends CommonController{

	/**
 	 *  file index
	 */
	public function index(){

		self::validate_login();

		$file=M('File');

		$map['pid']=array('neq',0);

		$map['attr']='1';

		if(IS_POST){

			$map['title']=array('like','%'.I('post.title').'%');

		}
		if(I('get.belong')=='My' || I('post.belong')=='My'){

			unset($map);
			$map['uid']=$_SESSION['uid'];
			$map['pid']=array('neq',0);
			$map['title']=array('like','%'.I('post.title').'%');
			
		}
		$cates= $file->where($map)->select();

		$this->assign('cates',$cates);

		$this->assign('belong',I('get.belong'));
		
		$this->display();
	}

	public function pub(){

		self::validate_login();

		if(IS_POST){

			if(!I('post.title')){

				$this->error('标题不能为空！');

			}

			$file=M('File');

				$data['title']=trim(I('post.title'));

				$data['uid']=$_SESSION['uid'];

				$data['content']=I('post.content');

				$data['attr']=I('post.attr');

				$data['pid']=I('post.cates');

				$data['pub_time']=time();

				if($file->add($data)){
					if($data['pid']==0){
					$this->success('分类添加成功！');
					}else{
					$this->success('文档发布成功！');
					}

				}else{

					$this->error('添加分类失败！');
				}


		}

		$file=M('File');

		$pcates=$file->field('id,title')->where(array('pid'=>0))->select();

		$this->assign('pcates',$pcates);
		
		$this->display();
	}

		public function info(){

			self::validate_login();

			$action=I('get.action')?I('get.action'):I('post.action');

			$file=M('File');

			//获取所有顶级分类
			$FileModel=new \Home\Model\FileModel();

				$cates=$FileModel->get_cate_list();

				$map["f.id"]=array('eq',I('get.id'));

				$info=$file->alias('f')->field('f.id,f.title,u.username,f.pub_time,f.pid,f.content,attr')->join('cds_user as u on f.uid=u.id ')->where($map)->find();

				$ptitle=$file->field('id,pid,title')->where(array('id'=>$info['pid']))->select();

				$this->assign('cates',$cates);

				$this->assign('ptitle',$ptitle[0]);

				$this->assign('info',$info);
			//获取文档下评论列表
				$CommentModel=new \Home\Model\CommentModel();

				$comments=$CommentModel->get_comment_list(I('get.id'),true);

				//var_dump($comments);



				$this->assign('comments',$comments);

			if(IS_POST){

					$id=I('post.id');
					$data=I('post.');

					$File_logModel=new \Home\Model\File_logModel();

				if($FileModel->change($id,$data) && $File_logModel->add_log($data)){

					$this->success('修改成功！');

				}else{

					$this->error('修改失败！');

				}




			}
		

			$this->display();


		}



}