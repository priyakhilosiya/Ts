<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
	}

	public function index()
	{
		echo "Dashboard index";
		///pr($this->user_session['id']);exit;
		$data['view'] = "index";
		$this->load->view('admin/content', $data);
	}
}