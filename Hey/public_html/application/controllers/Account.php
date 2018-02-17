<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	function __construct() {

        parent::__construct();
        $this->load->library('HybridAuthLib');
        $userauth = array(

          'userlogged_in' => $this->session->userdata('userlogged_in'),

          'userfullname' => $this->session->userdata('userfullname'),

          'useremail' => $this->session->userdata('useremail')

          );

      $this->userauth = $userauth;



      $this->load->model('front_model');

	}
	
	public function index()
	{
		$data['userauth'] = $this->userauth;

		if($data['userauth']['userlogged_in'] == TRUE){
		$data['user'] = $this->user_model->get_user_detail($data['userauth']['useremail']);

			
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('contact', 'Conatact', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            
            $this->form_validation->set_rules('about', 'About', 'required');
            
            //$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                	
                       
                        $this->load->view('main/profile', $data);
                }
                else{
                    //print_r($_POST);
                    if($this->user_model->editprofile()){
                        
                    }
                    redirect('account');
                    
                }

		
		}
		else{
			redirect('account/signin');
		}//echo 'Will come soon';
	}
	public function signin()
	{
		 $redurl = $this->input->post('url');
           
            $this->form_validation->set_rules('url', 'url', 'trim');
            //$this->form_validation->set_rules('fullname', 'Name', 'trim|required|regex_match[/^[a-zA-Z ]+$/]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            //$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('main/login');

                }
                else
                {
                     
                	if($this->user_model->getlogin_user() == TRUE){
                		if($redurl){
                			redirect($redurl);
                		}
                		else{
                			redirect();
                		}
                		
                 	}
                 	else{
                 	$data['login_error'] = TRUE;
                 	//print_r($data);
                 	$this->load->view('main/login', $data);

                 	}
                }

		
		
	}
	public function signup()
	{

        $redurl = $this->input->post('url');
           
            $this->form_validation->set_rules('url', 'url', 'trim|required');
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required|regex_match[/^[a-zA-Z ]+$/]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('main/signup');

                }
                else
                {
                     //print_r($_POST);
                	if($this->user_model->insert_user() == TRUE){
                		redirect($redurl);
                 }
                    }

		
		
	}
	public function signout()
	{
		
        $redurl = $_GET['redir'];
           
             $newdata = array('userfullname', 'useremail', 'userlogged_in');
            
                    $this->session->unset_userdata($newdata);
                    	redirect($redurl);
                   

                
		
	}




	public function login($provider)
	{
		

		try
		{
			
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					

					$user_profile = $service->getUserProfile();

					
					$data['user_profile'] = $user_profile;

					echo '<pre/>';
					print_r($user_profile); 
					$red = $_GET['redir'];
					
					if($provider == 'Facebook'){
						if($this->user_model->insert_facebook_user($user_profile->displayName,$user_profile->email,$user_profile->identifier,$user_profile->photoURL) == TRUE){
							redirect($red);
						}
					}
					else if($provider == 'Google'){
						if($this->user_model->insert_google_user($user_profile->displayName,$user_profile->email,$user_profile->identifier,$user_profile->photoURL) == TRUE){
							redirect($red);
						}
					}
					

					//$this->load->view('hauth/done',$data);
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			

			if (isset($service))
			{
				$service->logout();
			}

			
			show_error('Error authenticating user.');
		}
	}


	public function logout($provider)
	{
		

		try
		{
			
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				
				$service = $this->hybridauthlib->authenticate($provider);

				if ($service->isUserConnected())
				{
					
					$service->logout();
					
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			

			if (isset($service))
			{
				$service->logout();
			}

			
			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{


		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			
			$_GET = $_REQUEST;
		}

		
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}

}
