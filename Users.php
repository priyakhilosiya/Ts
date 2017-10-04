<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
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
		
			$post=$this->input->post();
			//echo "<pre>";print_r($post);exit;
			$inputArr=array('U_FNAME'=>$post['first_name'],'U_LNAME'=>$post['last_name'],'U_EMAIL'=>$post['email'],);
			$where=array('U_ID'=>$post['user_id']);
			$updateId=$this->common_model->updateData($this->common_model->cs_db,"users",$inputArr,$where);	
			if($updateId > 0)
			{
				$data['update'] = 1;
			}else{
				$data['update'] = 0;
			}
			//redirect(admin_path().'category?update='.$data['update']);
		
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