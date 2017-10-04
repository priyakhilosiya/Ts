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
	{
		    $flash_arr=array();
            $error = array();
			$post=$this->input->post();
			//echo "<pre>";print_r($post);exit;
            $inputArr=array();
			$inputArr=array('U_FNAME'=>$post['first_name'],'U_LNAME'=>$post['last_name'],'U_EMAIL'=>$post['email']);
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('U_EMAIL', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('id="new_password_confirmation"', 'Confirm Password', 'required|matches[new_password]');

            if($this->form_validation->run() == FALSE)
			{
				//$data["view"] = "registration";
				//$this->load->view("content", $data);
			}   else{
                        if(isset($post['password']) &&  $post['password']!=''){
                            $where = array('U_PASSWD' => md5($this->input->post('password')));
    			        	$user = $this->common_model->selectData($this->common_model->cs_db,"users", '*', $where);
    				        if (count($user) > 0) {
    				            if(isset($post['new_password']) &&  $post['new_password']!=''){
                                $newPass=$post['new_password'];
                                $Pssdata = array('U_PASSWD' => md5($this->input->post('new_password')));
                                    $inputArr= array_merge($inputArr,$Pssdata) ;
                                }
                                }
                        } else{
                         $error['pasword'] = "Invalid Password.";
                        }
                			$where=array('U_ID'=>$post['user_id']);
                			$updateId=$this->common_model->updateData($this->common_model->cs_db,"users",$inputArr,$where);
                			if($updateId > 0)
                			{
                				$data['update'] = 1;
                			}else{
                				$data['update'] = 0;
                			}
                            if ($data['update']==1) {
        						$flash_arr = array('flash_type' => 'success',
        										'flash_msg' => 'Profile Details has been successfully update.'
        									);
        					}else{
        						$flash_arr = array('flash_type' => 'error',
        										'flash_msg' => 'An error occurred while processing.'
        									);
        					}
        					$data['flash_msg'] = $flash_arr;
                           redirect(admin_path().'category?update='.$data['update']);

                            //$data['error_msg'] = $error;

                         }

	}

	/*public function delcategory()
	{
		$post=$this->input->post();
		$where=array('cat_id'=>$post['catid']);
		$deleteRes=$this->common_model->deleteData($this->common_model->cs_db,"faq_category",$where);
		echo $deleteRes;exit;
	}
	*/
}