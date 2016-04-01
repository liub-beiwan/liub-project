<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller {
	

	 public function regist(){

	 	 if(IS_POST){

	 	 	if(!I('post.username')){
				$this->error('用户名不能为空！',U('Public/regist'));
			}
			if(!I('post.password')){
				$this->error('密码不能为空！',U('Public/regist'));
			}
			if(!I('post.repass')){
				$this->error('确认密码不能为空！',U('Public/regist'));
			}
			if(I('post.repass')!=I('post.password')){
				$this->error('两次密码不一致！',U('Public/regist'));
			}
			if(!I('post.email')){
				$this->error('email不能为空！',U('Public/regist'));
			}

			$exp='/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+)+$/';
			preg_match($exp,I('post.email'),$re);
			if(empty($re)){
				$this->error('邮箱格式不正确！',U('Public/regist'));
			}
			if(!I('post.phone')){
				$this->error('手机不能为空！',U('Public/regist'));
			}
			$exp='/^1[358][0-9]{9}$/';
			preg_match($exp,I('post.phone'),$res);
			if(empty($res)){
				$this->error('手机格式不正确！',U('Public/regist'));
			}

			$data=$_POST;
			$data['password']=md5(I('post.password'));
			$data['login_date']=time();
			$data['login_ip']=$_SERVER['REMOTE_ADDR'];
			$user=M('user');

			if($user->where(array('username'=>$data['username']))->find()){

				$this->error('用户名已存在！',U('Public/regist'));

			}

			if($user->where(array('email'=>$data['email']))->find()){

				$this->error('邮箱已被注册！',U('Public/regist'));

			}

			if($user->where(array('phone'=>$data['phone']))->find()){

				$this->error('手机已被注册！',U('Public/regist'));

			}
			

			if($user->add($data)){

				$this->success('注册成功',U('Public/login'));

			}else{

				$this->error('注册成功',U('Public/regist'));

			}

	 	 }



	 $this->display();


	}

	public function login(){

		if(IS_POST){

			if(!I('post.username')){

				$this->error('用户名不能为空！',U('Public/login'));

			}

			if(!I('post.password')){

				$this->error('密码不能为空！',U('Public/login'));

			}
			if(!I('post.captha')){

				$this->error('验证码不能为空！',U('Public/login'));

			}
			$code=trim(I('post.captha'));
			if(!self::captha($code)){

				$this->error('验证码不正确！',U('Public/login'));

			}
			$map['username']=trim(I('post.username'));
			$map['password']=md5(trim(I('post.password')));
			$user=M('User');
			if($info=$user->where($map)->find()){
				
				session('username',$map['username']);
				session('uid',$info['id']);

				$this->success('登录成功！',U('File/index'));

			}else{

				$this->error('用户名或者密码不正确！',U('Public/login'));

			}



		}

		$this->display('login');

	}

	public function logout(){

		session('[destroy]');

		$this->success('退出成功！',U('Public/login'));

	}
	public function captha($code=''){
		ob_clean();

		$Verify = new \Think\Verify(array(
			'fontSize'  =>  15,
			'imageH'    =>  30,               // 验证码图片高度
            'imageW'    =>  100, 
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,
             'reset'     =>  true, 
              'length'    =>  4,


			));

				if(!$code){

					 $Verify->entry();

				}else{

					if($Verify->check($code)){
						return true;
					}
						
				}

	}

}
