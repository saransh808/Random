<?php

class User_model extends CI_Model {

    
    function __construct() {
	
	}
	
    function insert_google_user($user_name,$user_email,$user_id,$user_pic)
    {
				$name = $user_name;
				$username = $user_id;
				$useremail = $user_email;
				$userpassword = 'jw12345google';
				$userimgpath = $user_pic;
				

				$qry = $this->db->get_where('user', array('email' => $useremail));

    			$num = $qry->num_rows();

    			if($num > 0){

    				$justwraveldata = array(
						
						
						'name' => $name,

						'email' => $useremail,
						'google_id' => $username,

						

						'image' => $userimgpath,

					);
					$this->db->where('email', $useremail);
					$this->db->update('user', $justwraveldata);

    				$newdata = array(
		                   'userfullname'  => $name,
		                   'useremail'     => $useremail,
		                   'userlogged_in' => TRUE
               		);

					$this->session->set_userdata($newdata);

					return TRUE;

    			}
    			else{

    				$justwraveldata = array(
						
						'username' => 'google'.$username,

						'name' => $name,

						'email' => $useremail,
						'google_id' => $username,

						'password' => $userpassword,

						'image' => $userimgpath,

					);

								
				
				$this->db->set($justwraveldata);

				$this->db->insert('user');



				if($this->db->affected_rows() > 0){

					$newdata = array(
		                   'userfullname'  => $name,
		                   'useremail'     => $useremail,
		                   'userlogged_in' => TRUE
               		);

					$this->session->set_userdata($newdata);

					return TRUE;
				}
				else{
					return FALSE;

				}

    			}

				
				//$this->db->insert('user',$facebookdata);
			
		
    }
    function insert_facebook_user($user_name,$user_email,$user_id,$user_pic)
    {
				$name = $user_name;
				$username = $user_id;
				$useremail = $user_email;
				$userpassword = 'jw12345fb';
				$userimgpath = $user_pic;

				$qry = $this->db->get_where('user', array('email' => $useremail));

    			$num = $qry->num_rows();
    			
    			if($num > 0){
    				$justwraveldata = array(
						
						
						'name' => $name,

						'email' => $useremail,
						'fb_id' => $username,

						

						'image' => $userimgpath,

					);
					$this->db->where('email', $useremail);
					$this->db->update('user', $justwraveldata); 

    				$newdata = array(
		                   'userfullname'  => $name,
		                   'useremail'     => $useremail,
		                   'userlogged_in' => TRUE
               		);

					$this->session->set_userdata($newdata);

					return TRUE;
				}
				else{

				$justwraveldata = array(
						
						'username' => 'fb'.$username,

						'name' => $name,

						'email' => $useremail,
						'fb_id' => $username,

						'password' => $userpassword,

						'image' => $userimgpath,

					);

								
				
				$this->db->set($justwraveldata);

				$this->db->insert('user');



				if($this->db->affected_rows() > 0){

					$newdata = array(
		                   'userfullname'  => $name,
		                   'useremail'     => $useremail,
		                   'userlogged_in' => TRUE
               		);

					$this->session->set_userdata($newdata);

					return TRUE;
				}
				else{
					return FALSE;

				}
			}
				//$this->db->insert('user',$facebookdata);
			
		
    }

    function insert_user()
    {

    			$name = $this->input->post('fullname');
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');



				$array = array(
						
						'username' => $username,

						'name' => $name,

						'email' => $email,

						'password' => $password

					);

								
				
				$this->db->set($array);

				$this->db->insert('user');



				if($this->db->affected_rows() > 0){

					$newdata = array(
		                   'userfullname'  => $name,
		                   'useremail'     => $email,
		                   'userlogged_in' => TRUE
               		);

					$this->session->set_userdata($newdata);

					return TRUE;
				}
				else{
					return FALSE;

				}

				
			
		
    }

  //justwravel login model
    public function getlogin_user(){

    	$email = $this->input->post('email');
    	$password = $this->input->post('password');
    			
				$query = $this->db->get_where('user', array('email' => $email,'password' => $password));
				if($this->db->count_all_results() > 0){
					$result = $query->result();
					
					foreach($result as $result1){
						$adminsession = array(
									'userfullname'  => $result1->name,
									'useremail'     => $result1->email,
									'userlogged_in' => TRUE
									
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
    public function get_user_detail($email){

    	$qry = $this->db->get_where('user', array('email' => $email));

    	return $qry->result();

    }  

    public function editprofile(){
    	$id = $this->input->post('id');
    	$name = $this->input->post('name');
				$contact = $this->input->post('contact');
				
				$about = $this->input->post('about');
				



				$array = array(
						
						

						'name' => $name,

						

						'phone' => $contact,
						'about' => $about,

					);

								
				
				$this->db->where('id', $id);

				$this->db->update('user',$array);

    } 
	
		
}

?>
