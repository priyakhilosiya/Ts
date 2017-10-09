<?php
class common_model extends CI_Model{

	public $commentsEnable=false;

	public function  __construct(){
		parent::__construct();
		
		$this->cs_db = $this->load->database("default",true);
	}
	/*
	| -------------------------------------------------------------------
	| Select data
	| -------------------------------------------------------------------
	|
	| general function to get result by passing nesessary parameters
	|
	*/
	public function selectDataArr($db,$table, $fields='*', $where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='')
	{
		$siteConf = $this->config->item("siteConf");
		$db->select($fields);
		$db->from($table);
		if ($where != "") {
			$db->where($where);
		}

		if ($order_by != '') {
			$db->order_by($order_by,$order_type);
		}

		if ($group_by != '') {
			$db->group_by($group_by);
		}

		if ($limit > 0 && $rows == "") {
			$db->limit($limit);
		}
		if ($rows > 0) {
			$db->limit($rows, $limit);
		}
		$query = $db->get();
		//echo $db->last_query();exit;
		if ($type == "rowcount") {
			$data = $query->num_rows();
		}else{
			$data = $query->result_array();
		}
		
		$query->free_result();

		return $data;
	}

	public function getUserDetails($id)
	{
		
		$data=array();
		$fromtable="users";
		$fields='*';
		$orderby='U_ID';

		$this->db->select('*');
		$this->db->from($fromtable);
		$this->db->where('U_ID',$id);
	    $query = $this->db->get();
		$data = $query->result_array();
        if(count($data) > 0)
			{
					$data=$data[0];
			}
       	return $data;
	}

	public function getAlluserattendeeDetails(){

        $data=array();
		$fromtable="users u";
		$orderby='u.U_CREATED';
		$orderType='DESC';
        $this->db->where('u.U_ROLE=','C');
        $this->db->select('*');
		$this->db->from($fromtable);
		$this->db->join('order_details od', 'u.U_ID=od.ORD_U_ID');
        //$this->db->join('tickets tc', 'od.ORD_T_ID=tc.T_ID');
        $this->db->join('orders ord', 'ord.ORD_U_ID=u.U_ID');
		 $this->db->join('attendees ad', 'ad.ATD_ORD_ID=ord.ORD_ID');
        $this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;

		$data = $query->result_array();
		return $data;
	}

	public function getAllRegisteredUserDetails(){

        $data=array();
		$fromtable="users u";
		$orderby='u.U_CREATED';
		$orderType='DESC';
        $this->db->where('u.U_ROLE=','C');
        $this->db->select('*');
		$this->db->from($fromtable);
		$this->db->join('order_details od', 'u.U_ID=od.ORD_U_ID', 'left');
        $this->db->join('tickets tc', 'od.ORD_T_ID=tc.T_ID', 'left');
        $this->db->join('orders ord', 'ord.ORD_U_ID=u.U_ID', 'left');
		$this->db->where('u.U_PASSWD!=','');
        $this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

    public function getuserattendeeDetails($order_id,$user_id){

        $data=array();
		$fromtable="users u";
		$orderby='u.U_CREATED';
		$orderType='DESC';
        $this->db->where('u.U_ROLE=','C');
        $this->db->select('*');
		$this->db->from($fromtable);
        $this->db->join('order_details od', 'u.U_ID=od.ORD_U_ID');
        //$this->db->join('tickets tc', 'od.ORD_T_ID=tc.T_ID');
        $this->db->join('orders ord', 'ord.ORD_U_ID=u.U_ID');
		 $this->db->join('attendees ad', 'ad.ATD_ORD_ID=ord.ORD_ID');
       $this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$data = $query->result_array();
		return $data;
	}
	
	public function getUserTicketDetails()
	{
		$data=array();
		$fromtable="tickets tc";
		$orderby='tc.T_CREATED';
		$orderType='DESC';
        $this->db->where('tc.T_U_ID',$this->user_session['U_ID']);
		$this->db->select('*');
		$this->db->from($fromtable);
		$this->db->join('ticket_status ts', 'tc.T_ST_ID=ts.ST_ID', 'left');
		$this->db->where('tc.T_DELETED !=','1');
        $this->db->where('tc.T_ST_ID =','4');
		$this->db->where('tc.T_IS_PAUSED =','0');
		$this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

    public function getTicketDetails()
	{
		$data=array();
		$fromtable="tickets tc";
		$orderby='tc.T_CREATED';
		$orderType='DESC';
        $this->db->where('tc.T_U_ID',$this->user_session['U_ID']);
		$this->db->select('*');
		$this->db->from($fromtable);
		$this->db->join('ticket_status ts', 'tc.T_ST_ID=ts.ST_ID', 'left');
		$this->db->where('tc.T_DELETED !=','1');
        $this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

     public function attendeeInfo($user_id,$order_id)
	{
		$data=array();
		$fromtable="users u";
		$orderby='u.U_CREATED';
		$orderType='DESC';
        $this->db->where('u.U_ID',$user_id);
        $this->db->where('od.ORD_ID',$order_id);
		$this->db->select('*');
		$this->db->from($fromtable);
		$this->db->join('order_details od', 'u.U_ID=od.ORD_U_ID', 'left');
		$this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}

	public function faqInfo($questionId)
	{
		$data=array();
		$fromtable="faq_questions fq";
		$orderby='fq.Q_ID';
		$orderType='DESC';
		$this->db->select('*');
		$this->db->from($fromtable);
		$this->db->join('faq_category fc', 'fq.Q_CATID = fc.cat_id', 'left');
		$this->db->join('faq_answers fa', 'fq.Q_ID = fa.AW_QID', 'left');
		$this->db->where('fq.Q_ID',$questionId);
		$this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$data = $query->result_array();
		
		if(!empty($this->commentsEnable)){
			//get Question Comments
			$where['CM_QID']=$questionId;
			$orderbyComments="CM_ID"; 
			$orderTypeComments="ASC";
			$commentsinfo=$this->selectDataArr($this->db,'faq_comments','*',$where,$orderbyComments,$orderTypeComments);
			if(count($commentsinfo) > 0)
			{
					$data[0]['comments']=$commentsinfo;	
			}
			//get Question Comments
		}
		return $data;
	}
	
	public function searchFaqs($searchCriteria)
	{
		//echo "<pre>";print_r($searchCriteria);exit;
		$data=array();
		$fromtable="faq_questions fq";
		$orderby='fq.Q_ID';
		$orderType='DESC';
		$this->db->select('fq.Q_ID,fq.Q_TITLE,fa.AW_ANSWER,fq.Q_ARTICAL,fq.Q_UID,fq.Q_AUTHOR_NAME,fq.Q_THEME,fq.Q_REPLIED,fq.Q_CATID,fc.cat_title,fq.Q_CREATEDATE,(SELECT COUNT(*) FROM faq_comments fqc WHERE fqc.CM_QID=fq.Q_ID GROUP BY fqc.CM_QID) AS TotalComments');
		$this->db->from($fromtable);
		$this->db->join('faq_category fc', 'fq.Q_CATID = fc.cat_id', 'left');
		$this->db->join('faq_answers fa', 'fq.Q_ID = fa.AW_QID', 'left');
		$this->db->where('fq.Q_DELETED !=','1');
		if(!empty($searchCriteria['Q_CATID']) && $searchCriteria['Q_CATID'] != 'all')
			$this->db->where('fq.Q_CATID',$searchCriteria['Q_CATID']);
		if(!empty($searchCriteria['Q_THEME']) && $searchCriteria['Q_THEME'] != 'all')
			$this->db->where('fq.Q_THEME',$searchCriteria['Q_THEME']);
		if(!empty($searchCriteria['KEYWORDS']))
		{
			$this->db->where('(fq.Q_TITLE like "%'.$searchCriteria['KEYWORDS'].'%" OR fa.AW_ANSWER like "%'.$searchCriteria['KEYWORDS'].'%")');
			//$this->db->like('fq.Q_TITLE',$searchCriteria['KEYWORDS'], 'both'); 
			//$this->db->or_like('fa.AW_ANSWER',$searchCriteria['KEYWORDS'], 'both');
		}
		
		if(isset($searchCriteria['Q_REPLIED']) && $searchCriteria['Q_REPLIED'] != '')
			$this->db->where('fq.Q_REPLIED',$searchCriteria['Q_REPLIED']);			

		if(isset($searchCriteria['Q_SHOW_TO_ALL']) && $searchCriteria['Q_SHOW_TO_ALL'] != '')
			$this->db->where('fq.Q_SHOW_TO_ALL',$searchCriteria['Q_SHOW_TO_ALL']);			

		$this->db->order_by($orderby,$orderType);
		if ($searchCriteria['limit'] > 0 && $searchCriteria['page'] == 0) {
			$this->db->limit($searchCriteria['limit']);
		}
		if ($searchCriteria['page'] > 0) {
			$this->db->limit($searchCriteria['limit'],$searchCriteria['page']);
		}
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$data['result'] = $query->result_array();
		$data['totalrecord']=$this->searchFaqsCount($searchCriteria);
		return $data;
	}

	public function searchFaqsCount($searchCriteria)
	{
		//echo "<pre>";print_r($searchCriteria);exit;
		$data=array();
		$fromtable="faq_questions fq";
		$orderby='fq.Q_ID';
		$orderType='DESC';
		$this->db->select('fq.Q_ID');
		$this->db->from($fromtable);
		$this->db->join('faq_category fc', 'fq.Q_CATID = fc.cat_id', 'left');
		$this->db->join('faq_answers fa', 'fq.Q_ID = fa.AW_QID', 'left');
		$this->db->where('fq.Q_DELETED !=','1');
		if(!empty($searchCriteria['Q_CATID']) && $searchCriteria['Q_CATID'] != 'all')
			$this->db->where('fq.Q_CATID',$searchCriteria['Q_CATID']);
		if(!empty($searchCriteria['Q_THEME']) && $searchCriteria['Q_THEME'] != 'all')
			$this->db->where('fq.Q_THEME',$searchCriteria['Q_THEME']);
		if(!empty($searchCriteria['KEYWORDS']))
		{
			$this->db->where('(fq.Q_TITLE like "%'.$searchCriteria['KEYWORDS'].'%" OR fa.AW_ANSWER like "%'.$searchCriteria['KEYWORDS'].'%")');
			//$this->db->like('fq.Q_TITLE',$searchCriteria['KEYWORDS'], 'both'); 
			//$this->db->or_like('fa.AW_ANSWER',$searchCriteria['KEYWORDS'], 'both');
		}
		if(isset($searchCriteria['Q_REPLIED']) && $searchCriteria['Q_REPLIED'] != '')
			$this->db->where('fq.Q_REPLIED',$searchCriteria['Q_REPLIED']);			
	
		if(isset($searchCriteria['Q_SHOW_TO_ALL']) && $searchCriteria['Q_SHOW_TO_ALL'] != '')
			$this->db->where('fq.Q_SHOW_TO_ALL',$searchCriteria['Q_SHOW_TO_ALL']);	

		$this->db->order_by($orderby,$orderType);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$data=$query->num_rows;
		return $data;
	}
	
	public function lastActivityFaq()
	{
		 $sql='SELECT * FROM (SELECT *,IF(CM_DATE IS NOT NULL,CM_DATE,Q_CREATEDATE) AS orderdate FROM '.$this->db->database.'.faq_questions AS fq LEFT JOIN '.$this->db->database.'.faq_category fcat ON fq.Q_CATID=fcat.cat_id LEFT JOIN '.$this->db->database.'.faq_comments fc ON fq.Q_ID=fc.CM_QID  ORDER BY orderdate DESC) st  WHERE Q_DELETED != "1" GROUP BY Q_id ORDER BY orderdate DESC LIMIT 10';
		$query = $this->db->query($sql);
		$res=$query->result_array();
		return $res;
	}

	public function getFaqstats()
	{
		$sql='SELECT fq.Q_THEME AS THEME ,COUNT(*) AS TOTAL,(SELECT COUNT(*) FROM '.$this->db->database.'.faq_questions fq1 WHERE fq1.Q_REPLIED="1" AND fq1.Q_DELETED != "1" AND fq1.Q_THEME=THEME) AS REPLIED,(SELECT COUNT(*) FROM '.$this->db->database.'.faq_questions fq2 WHERE fq2.Q_REPLIED="0" AND fq2.Q_DELETED != "1" AND fq2.Q_THEME=THEME) AS UNREPLIED FROM '.$this->db->database.'.faq_questions fq  WHERE fq.Q_DELETED != "1" GROUP BY fq.Q_THEME ORDER BY fq.Q_THEME DESC';
		$query = $this->db->query($sql);
		$res=$query->result_array();
		return $res;
	}

	public function selectData($db,$table, $fields='*', $where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='')
	{
		$db->select($fields,false);
		$db->from($table);
		if ($where != "") {
			$db->where($where);
		}

		if ($order_by != '') {
			$db->order_by($order_by,$order_type);
		}

		if ($group_by != '') {
			$db->group_by($group_by);
		}

		if ($limit > 0 && $rows == "") {
			$db->limit($limit);
		}
		if ($rows > 0) {
			$db->limit($rows, $limit);
		}


		$query = $db->get();

		if ($type == "rowcount") {
			$data = $query->num_rows();
		}else{
			$data = $query->result();
		}

		#echo "<pre>"; print_r($db->queries); exit;
		$query->free_result();

		return $data;
	}

	public function getCount($db,$table,$where=""){
		$data = $this->selectData($db,$table, '*', $where, "", "", "", "", "", 'rowcount');
		return $data;
	}


	/*
	| -------------------------------------------------------------------
	| Insert data
	| -------------------------------------------------------------------
	|
	| general function to insert data in table
	|
	*/
	public function insertData($db,$table, $data)
	{
		$result = $db->insert($table, $data);
		if($result == 1){
			return $db->insert_id();
		}else{
			return false;
		}
	}


	/*
	| -------------------------------------------------------------------
	| Update data
	| -------------------------------------------------------------------
	|
	| general function to update data
	|
	*/
	public function updateData($db,$table, $data, $where, $flag =true)
	{
		$db->where($where);
		
		foreach ($data as $key=>$val) {
			$db->set($key, $val, $flag);
		}

		if($db->update($table)){
			return 1;
		}else{
			return 0;
		}
	}

	/*
	| -------------------------------------------------------------------
	| Delere data
	| -------------------------------------------------------------------
	|
	| general function to delete the records
	|
	*/
	public function deleteData($db,$table, $data)
	{
		if($db->delete($table, $data)){
			return 1;
		}else{
			return 0;
		}
	}

	/*
	| -------------------------------------------------------------------
	| check unique fields
	| -------------------------------------------------------------------
	|
	*/
	public function isUnique($db,$table, $field, $value,$where = "")
	{
		$db->select('*');
		$db->from($table);
		$db->where($field,$value);
		if ($where != "")
			$db->where($where);
		$query = $db->get();
		$data = $query->num_rows();
		$query->free_result();
		return ($data > 0)?FALSE:TRUE;
	}

}
?>
