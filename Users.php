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
	
	    $allUserDetails=$this->common_model->getAlluserattendeeDetails();
	   	$data['view'] = "index";
        $data['allUserDetails'] = $allUserDetails;
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
						 echo json_encode( array('status' => 'success','message' => 'Successfully Saved Details') );exit;
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
	    $ticketDetails=$this->common_model->getUserTicketDetails();
        $data['ticketDetails'] = $ticketDetails;
	   $html='';
	   $html.=$this->load->view('admin/users/addattendee', $data,TRUE);
	   echo $html;
	}
    public function editAttendee($order_id,$user_id)
	{
	    $ticketDetails=$this->common_model->getUserTicketDetails();
        $data['ticketDetails'] = $ticketDetails;
        $userAttendeeDetails=$this->common_model->getuserattendeeDetails($order_id,$user_id);
        $userAttendeeDetails=$userAttendeeDetails[0];
        $data['order_id'] = $order_id;
        $data['user_id'] = $user_id;
        $data['userAttendeeDetails'] = $userAttendeeDetails;
	   $html='';
		$html.=$this->load->view('admin/users/editAttendee',$data,TRUE);
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
    public function cancelAttendee($order_id,$user_id)
	{
	   $html='';
		$html.=$this->load->view('admin/users/cancelAttendee','',TRUE);
	   echo $html;
	}

	public function orderView()
	{
	   $html='';
		$html.=$this->load->view('admin/users/orderView','',TRUE);
	   echo $html;
	} 
	public function postAddattendee(){
          $post=$this->input->post();
		  $attendeeInfo =$this->common_model->attendeeInfo(trim($post['user_id']),trim($post['order_id']));
			if(isset($attendeeInfo[0]['U_ID']) &&  !empty($attendeeInfo[0]['U_ID']) && isset($attendeeInfo[0]['ORD_ID']) &&  !empty($attendeeInfo[0]['ORD_ID']))
			{
			    $user_id=$attendeeInfo[0]['U_ID'];
                $order_id=$attendeeInfo[0]['ORD_ID'];
				//update data
				$currGmtDate=date('Y-m-d H:i:s');
				$attendeeUpdateData = array(
				'U_FNAME'=>$post['first_name'],'U_LNAME'=>$post['last_name'],'U_EMAIL'=>$post['email']
				);
                $attendeedetailsUpdateData = array(
				'UD_FNAME'=>$post['first_name'],'UD_LNAME'=>$post['last_name']
				);
				$whereUpdate=array('U_ID'=>$user_id);
				$updateId=$this->common_model->updateData($this->common_model->cs_db,'users',$attendeeUpdateData,$whereUpdate);
                $whereDetailUpdate   =array('UD_UID'=>$user_id);
                $updateId=$this->common_model->updateData($this->common_model->cs_db,'users_details',$attendeedetailsUpdateData,$whereDetailUpdate);

            	$orderUpdateData = array(
				'ORD_T_ID'=>$post['ticket_id']
				);
				$where=array('ORD_U_ID'=>$user_id,'ORD_ID'=>$order_id);
				$updateId=$this->common_model->updateData($this->common_model->cs_db,'order_details',$orderUpdateData,$where);

$attUpdateData = array(
				'ATD_T_ID'=>$post['ticket_id']
				);
				$whereatt=array('ATD_U_ID'=>$user_id,'ATD_ORD_ID'=>$order_id);
				$updateId=$this->common_model->updateData($this->common_model->cs_db,'attendees',$attUpdateData,$whereatt);

				if($updateId > 0)
				{
                    echo json_encode( array('status' => 'success','message' => 'Attenddes Added Succesfully'));
				}else{
                     echo json_encode( array('status' => 'error','message' => 'something worng'));
				}

			}else{
		        //insert users data
			    //$newpassword = random_string('alnum', 8);
                $newpassword='password';
                $currGmtDate=date('Y-m-d H:i:s');
			    $attendeeData = array(
				'U_FNAME' => $post['first_name'],
				'U_LNAME' =>$post['last_name'],
				'U_EMAIL' =>$post['email'],
				'U_PASSWD' =>md5($newpassword),
				'U_ROLE' =>'C',
                'U_CREATED' =>$currGmtDate,
                'U_ADDEDBY_ID' =>$this->user_session['U_ID'],
                'U_ACTIVE' =>'1',
				);
				$insId=$this->common_model->insertData($this->common_model->cs_db,'users',$attendeeData);
				if($insId > 0)
				{

                      //insert users details data
    				$attendeeDetailsData = array(
    				'UD_FNAME' => $post['first_name'],
    				'UD_LNAME' =>$post['last_name'],
    			   'UD_UID' =>$insId,
    				);
				    $deatilsId=$this->common_model->insertData($this->common_model->cs_db,'users_details',$attendeeDetailsData);

                    // Insert Order data  for tickets

                    $ordersData = array(
    				'ORD_U_ID' => $insId,
    				'ORD_EVENT_ID' =>1,
    			    'ORD_TOTAL_AMT' =>0,
                    'ORD_ST_ID'=>1,
                    'ORD_CREATED'=>$currGmtDate,
    				);
				    $orderId=$this->common_model->insertData($this->common_model->cs_db,'orders',$ordersData);
                    if($orderId>0){
                            // Insert Order details data  for tickets
                    $ordersDetailsData = array(
    				'ORD_ID' => $orderId,
    				'ORD_T_ID' =>$post['ticket_id'],
    			    'ORD_DTL_QTY' =>1,
                    'ORD_U_ID' =>$insId,
                    'ORD_DTL_AMT'=>0,
    				);
				    $orderdetailsId=$this->common_model->insertData($this->common_model->cs_db,'order_details',$ordersDetailsData);
                       // Insert Order Attendess per tickets
                    $attendData = array(
                    'ATD_U_ID' =>$insId,
                    'ATD_EVT_ID' =>1,
                    'ATD_T_ID'=>$post['ticket_id'],
                    'ATD_ORD_ID'=>$orderId,
                    'ATD_CREATED'=> $currGmtDate,
                    );
                    $orderId=$this->common_model->insertData($this->common_model->cs_db,'attendees',$attendData);

                    }

                    echo json_encode( array('status' => 'success','message' => 'Attenddes Added Succesfully'));

                }else{
                    echo json_encode( array('status' => 'error','message' => 'something worng'));

                }

           }
    }

	public function postAddMessage(){

		
	}

}