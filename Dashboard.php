<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
		$userDetails=$this->common_model->getUserDetails($this->user_session['U_ID']);
		//echo "PRIYA";print_r($userDetails);

	}

	public function index()
	{
		/*$this->user_session = $this->session->userdata('user_session');
		$userDetails=$this->common_model->getUserDetails($this->user_session['U_ID']);*/
		///pr($this->user_session['id']);exit;
		$data['view'] = "index";
		//$data['userDetails'] = $userDetails;
		$this->load->view('admin/content', $data);
	}

	public function ajax_list()
	{
		//pr($this->user_session);exit;
		$lastActivityFaq=$this->common_model->lastActivityFaq();
		$data['lastActivityUI'] = $lastActivityFaq;
		$html='';
		$html.=$this->load->view('admin/dashboard/lastActivityUI', $data,TRUE);
		//echo "<pre>";print_r($lastActivityFaq);exit;
		echo $html;
	}

	public function getstats()
	{

		$faqstats=$this->common_model->getFaqstats();
		//echo "<pre>";print_r($faqstats);exit;
		$data['faqstats'] = $faqstats;
		$html='';
		$html.=$this->load->view('admin/dashboard/stats', $data,TRUE);
		echo $html;
	}

}