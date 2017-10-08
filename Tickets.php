<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
        date_default_timezone_set('Asia/Kolkata');
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}
	public function index()
	{
		$sort_array=array('T_CREATED'    => 'Creation date',
						'T_TITLE'         => 'Ticket title',
						'T_QTY_SOLD' => 'Quantity sold',
						'T_SALES_VOLUME'  => 'Sales volume'
						);
		$where="";
		$sort_by="";
			if($this->input->get('q')!=""){
				$where .="T_TITLE like '%".$this->input->get('q')."%'";
			}
			if($this->input->get('sort_by')!=""){
				$sort_by=$this->input->get('sort_by');
			}
		
		$ticketDetails = $this->common_model->selectDataArr($this->common_model->cs_db,"tickets", '*', $where,$sort_by);
		$data['ticketDetails'] = $ticketDetails;
		$data['q'] = $this->input->get('q');
		$data['sort_by'] = $this->input->get('sort_by');
		$data['sort_array'] = $sort_array;
		$data['view'] = "index";
		$this->load->view('admin/content', $data);
	}
	
    public function postPauseTicket()
	{
		if($this->input->post('ticket_id')!=""){

			$inputArr=array();
			$inputArr=array('T_IS_PAUSED'=>'1');
			$where=array('T_ID'=>$this->input->post('ticket_id'));
			$updateId=$this->common_model->updateData($this->common_model->cs_db,"tickets",$inputArr,$where);
			if($updateId==1){
				echo json_encode( array('status' => 'success','message' => "Ticket Successfully Updated",'id'=>$this->input->post('ticket_id')) );exit;
			}

		}else{
			echo json_encode( array('status' => 'error','message' => "Whoops! Looks like something went wrong. Please try again.",'id'=>$this->input->post('ticket_id')) );exit;
		}
	}
    public function postResumeTicket()
	{
	   if($this->input->post('ticket_id')!=""){

			$inputArr=array();
			$inputArr=array('T_IS_PAUSED'=>'0');
			$where=array('T_ID'=>$this->input->post('ticket_id'));
			$updateId=$this->common_model->updateData($this->common_model->cs_db,"tickets",$inputArr,$where);
			if($updateId==1){
				echo json_encode( array('status' => 'success','message' => "Ticket Successfully Updated",'id'=>$this->input->post('ticket_id')) );exit;
			}

		}else{
			echo json_encode( array('status' => 'error','message' => "Whoops! Looks like something went wrong. Please try again.",'id'=>$this->input->post('ticket_id')) );exit;
		}
	}    
}