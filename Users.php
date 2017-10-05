<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
        date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}
	public function index()
	{
	
		$updatedRecord=$this->input->get('update', TRUE);	
		if($updatedRecord != '')
		{
			$data['updatedRecord'] = $updatedRecord;
		}
		$data['view'] = "index";
		$this->load->view('admin/content', $data);
	}

	public function ajax_list($limit=0)
	{
		$post = $this->input->post();
		$i = 0;
		$columns = array(
			array( 'db' => 'c.cat_name',  'dt' => $i++ ),
			array( 'db' => 'c.cat_title',  'dt' => $i++ ),
			array( 'db' => 'c.cat_theme',  'dt' => $i++ ),
			array( 'db' => 'c.cat_id',
					'dt' => $i++,
					'formatter' => function( $d, $row ) {
						$op = array();
						if (hasAccess("category","details"))
							$op[] = '<a href="category/edit/'.$d.'" onclick="editCategory('.$d.');">Edit</a>';
							$op[] = '<a href="javascript:void(0);" onclick="deleteCategory('.$d.');">Delete</a>';
						return implode(" | ",$op);
					})
			);
		//echo "<pre>";print_r($columns);exit;
		$join = array();
		$where = array();
	//	$where["u.role"] = "B";
		echo json_encode( SSP::simple( $post, "faq_category c", "c.cat_id", $columns,$join,$where ) );exit;
	}

	
	public function edit($id = NULL)
	{		$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$post=$this->input->post();
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if($this->input->post('password')){
				$this->form_validation->set_rules('password', 'Password', 'trim|oldpassword_check');
			}
			if($this->input->post('new_password_confirmation')){
				$this->form_validation->set_rules('new_password_confirmation', 'Confirm Password', 'matches[new_password]');
			}
			$errors=$this->form_validation->error_array();
				
			 if($this->form_validation->run() == FALSE)
			{
				 echo json_encode( array('status' => 'error','messages' => $this->form_validation->error_array()) );exit;
				
		   
			}else{
				$inputArr=array();
				$inputArr=array('U_FNAME'=>$post['first_name'],'U_LNAME'=>$post['last_name'],'U_EMAIL'=>$post['email']);
					if(isset($post['new_password']) &&  $post['new_password']!=''){
						$Pssdata = array('U_PASSWD' => md5($this->input->post('new_password')));
						$inputArr= array_merge($inputArr,$Pssdata) ;
					}
					$where=array('U_ID'=>$post['user_id']);
					$updateId=$this->common_model->updateData($this->common_model->cs_db,"users",$inputArr,$where);
					if($updateId > 0)
					{
						 echo json_encode( array('status' => 'success','messages' => 'Successfully Saved Details') );exit;
					}
			}
	}

	public function oldpassword_check($old_password){
		   $old_password_hash = md5($old_password);
		   $where = array('email' => trim($post['email']));
			$user = $this->common_model->selectData($this->common_model->cs_db,"users", '*', $where);
			$user=$user[0];
		    $old_password_db_hash = $user['U_PASSWD'];

		   if($old_password_hash != $old_password_db_hash)
		   {
			  $this->form_validation->set_message('oldpassword_check', 'Old password not match');
			  //$errors=$this->form_validation->error_array();
			//	print_r($errors);exit;
			  return FALSE;
		   } 
		   return TRUE;
		}

    public function addattendee()
	{
	   $html='';
		$html.=$this->load->view('admin/users/addattendee','',TRUE);
	   echo $html;
	}
    public function editAttendee()
	{
	   $html='';
		$html.=$this->load->view('admin/users/editAttendee','',TRUE);
	   echo $html;
	}

    public function inviteAttendees()
	{
	   $html='';
		$html.=$this->load->view('admin/users/inviteAttendees','',TRUE);
	   echo $html;
	}
    public function messageAll()
	{
	   $html='';
		$html.=$this->load->view('admin/users/messageAll','',TRUE);
	   echo $html;
	}
    public function messageAttendee()
	{
	   $html='';
		$html.=$this->load->view('admin/users/messageAttendee','',TRUE);
	   echo $html;
	}
    public function resendTicket()
	{
	   $html='';
		$html.=$this->load->view('admin/users/resendTicket','',TRUE);
	   echo $html;
	}
    public function cancelAttendee()
	{
	   $html='';
		$html.=$this->load->view('admin/users/cancelAttendee','',TRUE);
	   echo $html;
	} 
}