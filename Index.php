<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$session = $this->session->userdata('user_session');
		if (isset($session['id'])) {
			redirect(base_url()."/admin/dashboard");
		}
		//echo "admin index controller";
		
		//$this->load->view('admin/index/index', $data);
			//$data["view"] = "aboutus";
		$data = array();
		$post = $this->input->post();
		if ($post) {
			$error = array();
			$e_flag=0;
			if(trim($post['userid']) == ''){
				$error['userid'] = 'Please enter email.';
				$e_flag=1;
				/*$response['userid'] = array('status'=>'error','message'=>"Please enter userid.");*/
			}
			if(!valid_email(trim($post['userid'])) && trim($post['userid']) == ''){
				$error['userid'] = 'Please enter email.';
				$e_flag=1;
			}
			if(trim($post['password']) == ''){
				$error['password'] = 'Please enter password.';
				$e_flag=1;
				/*$response['password'] = array('status'=>'error','message'=>"Please enter password.");*/
			}
	
			if ($e_flag == 0) {
				$where = array('U_EMAIL' => $post['userid'],
								'U_PASSWD' => "md5(".$post['password'].")"
							);
				$where = "U_EMAIL = '".$post['userid']."' AND U_PASSWD = md5('".$post['password']."') AND U_ROLE IN('A','S')";
				$admin = $this->common_model->selectDataArr($this->common_model->cs_db,"users", '*', $where);
				//echo "<pre>";print_r($admin);exit;
				if (count($admin) > 0) {
					# create session
					$admin = $admin[0];
					unset($admin['U_PASSWD']);
					$this->session->set_userdata('user_session',$admin);
					
					if(isset($post['remember_me']))
					{
						setcookie('uname',$post['userid'],time() + (86400 * 365));
						setcookie('password',$post['password'],time() + (86400 * 365));
					}

					redirect(base_url()."admin/dashboard");
				}else{
					$error['invalid_login'] = "Invalid email or password";
				}
			}
			$data['error_msg'] = $error;
		}

		$this->load->view('admin/index/index', $data);

		//$this->load->view("content", $data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'/admin/');
	}

	public function forgotpassword()
	{
		$data1 = '';
		$data=array();
		$post = $this->input->post();
		$flash_arr=array();
		if ($post) {
			$error = array();
			$e_flag=0;
			if(!valid_email(trim($post['email'])) && trim($post['email']) == ''){
				$error['email'] = 'Please enter email.';
				$e_flag=1;
			}

			if ($e_flag == 0) {
				$where = array('email' => trim($post['email']));
				$user = $this->common_model->selectData($this->common_model->cs_db,"users", '*', $where);
				if (count($user) > 0) {

					$newpassword = random_string('alnum', 8);
					$data = array('password' => "md5(".$newpassword.")");
					$upid = $this->common_model->updateData($this->common_model->cs_db,"users",$data,$where);

					//					$emailTpl = $this->load->view('user/template', array('email'=>'admin_forgot_password','username'=>$user[0]->fname . " ".$user[0]->lname,'password'=>$newpassword), true);

					$webmTemplatePath=APPPATH."/views/user/forgotPassword.template";
					$fp=fopen($webmTemplatePath ,"r");
					$data1=fread($fp, filesize($webmTemplatePath));
					fclose($fp);
					$httpPrefix = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https://" : "http://";
					$host=$httpPrefix.$_SERVER['HTTP_HOST'];
					$data1=str_replace('{password}',$newpassword,$data1);
					$data1=str_replace('{receiver}',$user[0]->fname . " ".$user[0]->lname,$data1);
					$data1=str_replace('{username}',$user[0]->username,$data1);
					$data1=str_replace('{orgName}','Terabitz',$data1);
					$data1=str_replace('{brokerName}','5 Min Propsite',$data1);
					$data1=str_replace('{host}',$host,$data1);
					

					$ret=sendEmail($user[0]->email, "Forgot Password", $data1, FROM_EMAIL,FROM_NAME);


					if ($ret) {
						$flash_arr = array('flash_type' => 'success',
										'flash_msg' => 'Login details sent successfully.'
									);
					}else{
						$flash_arr = array('flash_type' => 'error',
										'flash_msg' => 'An error occurred while processing.'
									);
					}
					$data['flash_msg'] = $flash_arr;
				}else{
					$error['email'] = "Invalid email address.";
				}
			}
			$data['error_msg'] = $error;
		}
		$this->load->view('admin/index/forgotpassword', $data);
	}


}