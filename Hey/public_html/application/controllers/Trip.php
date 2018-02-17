<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {


	function __construct() {

        parent::__construct();

        $userauth = array(

          'userlogged_in' => $this->session->userdata('userlogged_in'),

          'userfullname' => $this->session->userdata('userfullname'),

          'useremail' => $this->session->userdata('useremail')

          );

      $this->userauth = $userauth;



      $this->load->model('front_model');

	}


	private function set_upload_options()
		{   
		    //upload an image options
		    $config = array();
		    $config['upload_path'] = './uploads/';
		    $config['allowed_types'] = 'png|jpg|gif';
		    $config['max_size']      = '0';
		    $config['overwrite']     = FALSE;

		    return $config;
		}
	
	public function addtrip()
	{
		$data['userauth'] = $this->userauth;
		if(isset($data['userauth']['userlogged_in'])){
			$data['statelist'] = $this->front_model->stateList(1);
			$data['tripcategory'] = $this->front_model->tripcategoryList();

			$userid = $this->user_model->get_user_detail($data['userauth']['useremail'])[0]->id;
			
			//fileupload
			    
								    $this->load->library('upload');
								    if (isset($_FILES['userfile'])) {
								    	//print_r($_FILES['userfile']);
								    
								    $time = time();
								    $files = $_FILES;
								    $cpt = count($_FILES['userfile']['name']);
								    for($i=0; $i<$cpt-1; $i++)
								    {           
								        $_FILES['userfile']['name']= 'Justwravel_'.$time.'_'.$i.$files['userfile']['name'][$i];
								        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
								        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
								        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
								        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

								        $this->upload->initialize($this->set_upload_options());
								        $this->upload->do_upload();
								        $upld1[] = $this->upload->data();
								        
								    }
								    $imagenames = array();
								    foreach ($upld1 as $upld1key => $upld1value) {
								    	array_push($imagenames, $upld1value['orig_name']);
								    }


								    }



			//form validation
			$this->form_validation->set_rules('title', 'Trip Title', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('category', 'Trip Category', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('accommodation', 'Trip Category', 'required');
			$this->form_validation->set_rules('description', 'Trip description', 'required');
			$this->form_validation->set_rules('numofdays', 'Number of Days', 'required');
			$this->form_validation->set_rules('itinerary', 'Trip Itinerary', 'required');
			//$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->run();
			 if ($this->form_validation->run() == FALSE OR $cpt == 0)
                {
                       
						$this->load->view('main/addtrip',$data);
                }
                else{
                	
                	if($this->front_model->addtripdomestic($imagenames, $userid) > 0){
                		echo 'suceeess';
                	}
                	else{
                		echo 'failed';
                	}
                }
			
			
		}
		else{
			redirect('account/signin?redir='.current_url());
		}
		
	}

		public function addtrip_international()
	{
		$data['userauth'] = $this->userauth;
		if(isset($data['userauth']['userlogged_in'])){
			$data['countrylist'] = $this->front_model->countryList();
			$data['tripcategory'] = $this->front_model->tripcategoryList();

			//fileupload
			    
								    $this->load->library('upload');
								    if (isset($_FILES['userfile'])) {
								    	//print_r($_FILES['userfile']);
								    
								    $time = time();
								    $files = $_FILES;
								    $cpt = count($_FILES['userfile']['name']);
								    for($i=0; $i<$cpt-1; $i++)
								    {           
								        $_FILES['userfile']['name']= 'Justwravel_'.$time.'_'.$i.$files['userfile']['name'][$i];
								        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
								        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
								        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
								        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

								        $this->upload->initialize($this->set_upload_options());
								        $this->upload->do_upload();
								        $upld1[] = $this->upload->data();
								        
								    }
								    $imagenames = array();
								    foreach ($upld1 as $upld1key => $upld1value) {
								    	array_push($imagenames, $upld1value['orig_name']);
								    }


								    }



			//form validation
			$this->form_validation->set_rules('title', 'Trip Title', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('category', 'Trip Category', 'required');
			$this->form_validation->set_rules('category', 'Trip Category', 'required');
			$this->form_validation->set_rules('accommodation', 'Trip Category', 'required');
			$this->form_validation->set_rules('description', 'Trip description', 'required');
			$this->form_validation->set_rules('numofdays', 'Number of Days', 'required');
			$this->form_validation->set_rules('itinerary', 'Trip Itinerary', 'required');
			//$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->run();
			 if ($this->form_validation->run() == FALSE OR $cpt == 0)
                {
                       
						$this->load->view('main/addtrip_int',$data);
                }
                else{
                	
                	if($this->front_model->addtripdomestic($imagenames) > 0){
                		echo 'suceeess';
                	}
                	else{
                		echo 'failed';
                	}
                }
			
			
		}
		else{
			redirect('account/signin?redir='.current_url());
		}
		
	}
}
