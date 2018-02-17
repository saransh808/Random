<?php
	class Admin extends CI_controller
	{
		

		public function index(){
			$this->load->library('session');
			//$this->load->helper('url');
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$this->load->view('admin/dashbord',$data);
			}
			else{
				redirect('admin/login');
				}
		}

//Authnetication Part Starts
		
		
		public function login(){
			 $this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->run();
			 if ($this->form_validation->run() == FALSE)
                {
                       
						$this->load->view('admin/login_view');
                }
                else
                {
                        //print_r($_POST);
						$username = $this->input->post('username');
						$password = $this->input->post('password');
						$this->load->model('admin_model');
						if($this->admin_model->admin_login($username,$password) == TRUE){
							//echo 'Login Ho GYa';
							$mysessionvalue = $this->session->userdata();
							redirect('admin');
							}
						//redirect('Home');
						
                }
			
			//$this->load->view('admin/login_view');
		}
		public function logout(){
			//$this->load->helper('url');
			
			$this->load->model('admin_model');
			$this->admin_model->admin_logout();
			redirect('admin');
		}

//Authentication Part End




		public function editor($path,$width) {
	    //Loading Library For Ckeditor
	    $this->load->library('ckeditor');
	    $this->load->library('ckFinder');
	    //configure base path of ckeditor folder 
	    $this->ckeditor->basePath = base_url().'js/ckeditor/';
	    $this->ckeditor-> config['toolbar'] = 'Full';
	    $this->ckeditor-> config['language'] = 'en';
	    $this->ckeditor-> config['width'] = $width;
	    //configure ckfinder with ckeditor config 
	    $this->ckfinder->SetupCKEditor($this->ckeditor,$path); 
	  }





		public function addcountry(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$this->form_validation->set_rules('country', 'Country', 'required|alpha_numeric_spaces|is_unique[country.country]');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                       
						$this->load->view('admin/addcountry',$data);
                	}
                	else
                	{
                		if($this->admin_model->addcountry() == TRUE){
							
							
							redirect('admin/managecountry');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function editcountry(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$id = $this->uri->segment(3);
				$data['data'] = $this->admin_model->find_country_by_id($id);

				$this->form_validation->set_rules('country', 'Country', 'required|alpha_numeric_spaces');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                       
						$this->load->view('admin/editcountry',$data);
                	}
                	else
                	{
                		if($this->admin_model->update_country() == TRUE){
							
							
							redirect('admin/managecountry');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function managecountry(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_country();

				$this->load->view('admin/managecountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function deletecountry(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];

				$id = $this->uri->segment(3);
				if($data['data'] = $this->admin_model->delete_country($id) == TRUE){
					redirect('admin/managecountry');
				}

				//$this->load->view('admin/managecountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}







		public function addstate(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('state', 'State', 'required|alpha_numeric_spaces');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                       	$data['country_dropdown'] = $this->admin_model->get_country_dropdown();
                       	
						$this->load->view('admin/addstate',$data);
                	}
                	else
                	{
                		if($this->admin_model->addstate() == TRUE){
							
							
							redirect('admin/managestate');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function managestate(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_state_with_country_name();

				$this->load->view('admin/managestate',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function editstate(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$id = $this->uri->segment(3);
				

				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('state', 'State', 'required|alpha_numeric_spaces');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                		$data['data'] = $this->admin_model->find_state_by_id($id);
                       	$data['country_dropdown'] = $this->admin_model->get_country_dropdown();
						$this->load->view('admin/editstate',$data);
                	}
                	else
                	{
                		if($this->admin_model->update_state() == TRUE){
							
							
							redirect('admin/managestate');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function deletestate(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];

				$id = $this->uri->segment(3);
				if($data['data'] = $this->admin_model->delete_state($id) == TRUE){
					redirect('admin/managestate');
				}

				//$this->load->view('admin/managecountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}












		public function addlocation($country){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('state', 'State', 'required');
				$this->form_validation->set_rules('location', 'Location', 'required|alpha_numeric_spaces|is_unique[location.location]');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                       	$data['country_dropdown'] = $this->admin_model->get_country_dropdown();
                       	$data['state_dropdown'] = $this->admin_model->get_state_dropdown($country);
                       	$data['country'] = $country;
                       	
						$this->load->view('admin/addlocation',$data);
                	}
                	else
                	{
                		if($this->admin_model->addlocation() == TRUE){
							
							
							redirect('admin/managelocation');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function managelocation(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_location_with_state_and_country_name();

				$this->load->view('admin/managelocation',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function editlocation(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$id = $this->uri->segment(3);
				

				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('state', 'State', 'required');
				$this->form_validation->set_rules('location', 'Location', 'required|alpha_numeric_spaces');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                		$data['data'] = $this->admin_model->find_location_by_id($id);
                       	$data['country_dropdown'] = $this->admin_model->get_country_dropdown();
                       	$data['state_dropdown'] = $this->admin_model->get_state_dropdown(1);
						$this->load->view('admin/editlocation',$data);
                	}
                	else
                	{
                		if($this->admin_model->update_location() == TRUE){
							
							
							redirect('admin/managelocation');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function deletelocation(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];

				$id = $this->uri->segment(3);
				if($data['data'] = $this->admin_model->delete_location($id) == TRUE){
					redirect('admin/managelocation');
				}

				//$this->load->view('admin/managecountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}







		public function addcategory(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$this->form_validation->set_rules('category', 'Category', 'required|alpha_numeric_spaces|is_unique[category.category]');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                       
						$this->load->view('admin/addcategory',$data);
                	}
                	else
                	{
                		if($this->admin_model->addcategory() == TRUE){
							
							
							redirect('admin/managecategory');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function editcategory(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$id = $this->uri->segment(3);
				$data['data'] = $this->admin_model->find_category_by_id($id);

				$this->form_validation->set_rules('category', 'Category', 'required|alpha_numeric_spaces');
				
				$this->form_validation->run();
			 		if ($this->form_validation->run() == FALSE)
                	{
                       
						$this->load->view('admin/editcategory',$data);
                	}
                	else
                	{
                		if($this->admin_model->update_category() == TRUE){
							
							
							redirect('admin/managecategory');
							}

                	}


				//$this->load->view('admin/addcountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function managecategory(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_category();

				$this->load->view('admin/managecategory',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function deletecategory(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];

				$id = $this->uri->segment(3);
				if($data['data'] = $this->admin_model->delete_category($id) == TRUE){
					redirect('admin/managecategory');
				}

				//$this->load->view('admin/managecountry',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function manageDomesticTrip(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_domesticTrip();
				//echo '<pre/>';
				//print_r($data['data']);
				$this->load->view('admin/managetrip',$data);
			}
			else{
				redirect('admin/login');
				}
		}

		public function manageInternationalTrip(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_internationalTrip();
				//echo '<pre/>';
				//print_r($data['data']);
				$this->load->view('admin/managetrip_int',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		

		public function activateDomestictrip($id){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				

				
				if($this->admin_model->activate_domesticTrip($id) == TRUE){


					redirect('admin/manageDomesticTrip');


				}
                      

                	

				
			}
			else{
				redirect('admin/login');
				}
		}



		public function deleteDomestictrip($id){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				

				
				if($this->admin_model->delete_domesticTrip($id) == TRUE){


					redirect('admin/manageDomesticTrip');


				}
                      

                	

				
			}
			else{
				redirect('admin/login');
				}
		}


		public function activateInternationaltrip($id){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				

				
				if($this->admin_model->activate_internationalTrip($id) == TRUE){


					redirect('admin/manageInternationalTrip');


				}
                      

                	

				
			}
			else{
				redirect('admin/login');
				}
		}



		public function deleteInternationaltrip($id){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				

				
				if($this->admin_model->delete_internationalTrip($id) == TRUE){


					redirect('admin/manageInternationalTrip');


				}
                      

                	

				
			}
			else{
				redirect('admin/login');
				}
		}



		public function manageAgent(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				$agent = array();
				$a = $this->admin_model->get_Agent();
				$b = $this->admin_model->get_Agent1();
				$c = $this->admin_model->get_Agent2();
				
				foreach ($a as $keya => $valuea) {
					$id = '';
					$id = $valuea->id;
					$valuea->dom = 0;
					$valuea->international = 0;
					foreach ($b as $keyb => $valueb) {
						if($valueb->id == $id){
							$valuea->dom = $valueb->dom;
						}
						
					}
					foreach ($c as $keyc => $valuec) {
						if($valuec->id == $id){
							$valuea->international = $valuec->international;
						}
						
					}
					array_push($agent, $valuea);

				}
				$data['data'] = $agent;
				
				
				$this->load->view('admin/manageagent',$data);
			}
			else{
				redirect('admin/login');
				}
		}



		public function deleteAgent($id){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				

				
				if($this->admin_model->delete_agent($id) == TRUE){


					redirect('admin/manageAgent');


				}
                      

                	

				
			}
			else{
				redirect('admin/login');
				}
		}



		public function manageUser(){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				
				$data['data'] = $this->admin_model->get_User();
				//echo '<pre/>';
				//print_r($data['data']);
				$this->load->view('admin/manageuser',$data);
			}
			else{
				redirect('admin/login');
				}
		}


		public function deleteUser($id){
			
			$data123 = $this->session->all_userdata();
			if(isset($data123['admin123username'])){
				$data['username'] = $data123['admin123username'];
				

				
				if($this->admin_model->delete_user($id) == TRUE){


					redirect('admin/manageUser');


				}
                      

                	

				
			}
			else{
				redirect('admin/login');
				}
		}





	}