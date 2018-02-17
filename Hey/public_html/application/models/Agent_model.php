<?php

class Agent_model extends CI_Model {

    
    function __construct() {
	
	}
	
 

    function insert_agent()
    {

    			$name = $this->input->post('fullname');
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');



				$array = array(
						
						

						'name' => $name,

						'email' => $email,

						'password' => $password

					);

								
				
				$this->db->set($array);

				$this->db->insert('agent');



				if($this->db->affected_rows() > 0){

					$newdata = array(
		                   'agentfullname'  => $name,
		                   'agentemail'     => $email,
		                   'agentlogged_in' => TRUE
               		);

					$this->session->set_userdata($newdata);

					return TRUE;
				}
				else{
					return FALSE;

				}

				
			
		
    }

  //justwravel login model
    public function getlogin_agent(){

    	$email = $this->input->post('email');
    	$password = $this->input->post('password');
    			
				$query = $this->db->get_where('agent', array('email' => $email,'password' => $password));
				if($this->db->count_all_results() > 0){
					$result = $query->result();
					
					foreach($result as $result1){
						$adminsession = array(
									'agentfullname'  => $result1->name,
									'agentemail'     => $result1->email,
									'agentlogged_in' => TRUE
									
									);
						$this->session->set_userdata($adminsession);
						return TRUE;
						}
					//return $result1;
					}
				else{
					return FALSE;
					}
				
			
    }
    public function get_agent_detail($email){

    	$qry = $this->db->get_where('agent', array('email' => $email));

    	return $qry->result();

    } 

   public function editprofile()
   {
   	//print_r($_POST);
   	echo $id = $this->input->post('id');

   	$array = array(
   		'name' => $this->input->post('owner'),
   		'organisation' => $this->input->post('organisation'),
      'url' => $this->input->post('url'),
   		'phone' => $this->input->post('contact'),
   		'state' => $this->input->post('state'),
   		'location' => $this->input->post('location'),
   		'address' => $this->input->post('address')   		

   		);


   	
   	$this->db->where('id', $id);
   	$this->db->update('agent',$array);
   // return $this->db->affected_rows();


   }


   public function change_agent_password()
   {
   	//print_r($_POST);
   	$id = $this->input->post('id');
   $oldpass = $this->input->post('oldPassword');
   $query = $this->db->get_where('agent', array('id' => $id, 'password' => $oldpass));
   if($query->num_rows() > 0){

   	$array = array(
   		'password' => $this->input->post('password'),
   				

   		);
   	$this->db->where('id', $id);
   	$this->db->update('agent',$array);
   	if($this->db->affected_rows() > 0 ){
   		return TRUE;
   	}
   	else{
   		return FALSE;
   	}

   }
   else{
   	return FALSE;
   }
/*
   	

//print_r($array);
   	
   	$this->db->where('id', $id);
   	$this->db->update('agent',$array);
*/

   }
   
		
}

?>
