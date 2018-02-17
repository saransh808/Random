<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {
	function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $agentauth = array(

          'agentlogged_in' => $this->session->userdata('agentlogged_in'),

          'agentfullname' => $this->session->userdata('agentfullname'),

          'agentemail' => $this->session->userdata('agentemail')

          );

      $this->agentauth = $agentauth;



      $this->load->model('front_model');

	}
	
	public function index()
	{
		$data['agentauth'] = $this->agentauth;
		if($data['agentauth']['agentlogged_in'] == TRUE){

			$data['agent'] = $agent = $this->agent_model->get_agent_detail($data['agentauth']['agentemail']);

			//print_r($agent);
			$data['statelist'] = $this->front_model->stateList(1);
            $this->form_validation->set_rules('owner', 'Owner Name', 'required');
            $this->form_validation->set_rules('organisation', 'Organisation Name', 'required');
            $this->form_validation->set_rules('contact', 'Conatact', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            
            //$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('agent/profile',$data);
                }
                else{
                    //print_r($_POST);
                    $this->agent_model->editprofile();
                        redirect('agent');
                    
                    
                }
			//$this->load->view('main/profile', $data);
		//echo 'Will come soon';

		}
		else{
			redirect('agent/signin?redir='.current_url());
		}
		
	}
	public function signin()
	{
		 $redurl = $this->input->post('url');
           
            //$this->form_validation->set_rules('url', 'url', 'trim');
            //$this->form_validation->set_rules('fullname', 'Name', 'trim|required|regex_match[/^[a-zA-Z ]+$/]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            //$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('agent/login');

                }
                else
                {
                	//print_r($_post);
                     
                	if($this->agent_model->getlogin_agent() == TRUE){
                		if($redurl){
                			redirect($redurl);
                		}
                		else{
                			redirect('agent');
                		}
                		
                 	}
                 	else{
                 	$data['login_error'] = TRUE;
                 	//print_r($data);
                 	$this->load->view('agent/login', $data);

                 	}
                }

		
		
	}
	public function signup()
	{

        $redurl = $this->input->post('url');
           
            //$this->form_validation->set_rules('url', 'url', 'trim|required');
            $this->form_validation->set_rules('fullname', 'Name', 'trim|required|regex_match[/^[a-zA-Z ]+$/]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[agent.email]');
            
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('agent/signup');

                }
                else
                {
                     //print_r($_POST);

    
    

       $message = 'Hi ' .$_POST["fullname"]. ', <br/>
                    Thankyou for registering with Simpifytrips.com <br/>
                    You are allowed to List 10 Domestic Trips and 10 International Trip. For more option contact Simpifytrips. <br/>
                    Thankyou<br/>
                    Simplifytrips.com<br/>
                    e-mail : contact@simplifytrips.com<br/>
                    phone : +91 999 999 9999 <br/>';

                  $to = $_POST["email"];
                  $subject = 'Signup Notification Simplifytrips';
                  $headers = "From: Simplifytrips <info@simplifytrips.com>" . "\r\n";




                	if($this->agent_model->insert_agent() == TRUE){
                    mail($to, $subject, $message, $headers);
                    if($redurl){
                      redirect($redurl);
                    }
                    else{
                      redirect('agent');
                    }
                		
                 }
                    }



		
		
	}
  public function forgot()
  {

        $redurl = $this->input->post('url');
           
            //$this->form_validation->set_rules('url', 'url', 'trim|required');
            
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            
            
            
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('agent/forgot-your-password');

                }
                else
                {
                     //print_r($_POST);

    
    $a = $this->agent_model->get_agent_detail($this->input->post('email'));

    
    $name = $a[0]->name;
    $email = $a[0]->email;
    $password = $a[0]->password;
    

       $message = 'Hi ' .$name. ', <br/>
                    This mail is regarding password recovery with Simpifytrips.com <br/>

                    Your Agent Login details are follows:
                    

                    your email id : '.$email.'

                    your Pasword : '.$password.'
                    
                    Thankyou<br/>
                    Simplifytrips.com<br/>
                    e-mail : contact@simplifytrips.com<br/>
                    phone : +91 756 794 9606 <br/>';

                  $to = $email;
                  $subject = 'Signup Notification Simplifytrips';
                  $headers = "From: Simplifytrips <info@simplifytrips.com>" . "\r\n";




                  
                    mail($to, $subject, $message, $headers);
                    if($redurl){
                      redirect($redurl);
                    }
                    else{
                      redirect('agent');
                    }
                    
                 
                    }



    
    
  }
	public function signout()
	{

        $redurl = $_GET['redir'];
           
             $newdata = array('agentfullname', 'agentemail', 'agentlogged_in');
             	

                    $this->session->unset_userdata($newdata);
                    	redirect($redurl);
                   

                
		
	}

    public function changepassword()
    {


            $this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
            $this->form_validation->set_rules('password', 'New Password', 'required');
            $this->form_validation->set_rules('confirmPass', 'Confirm Password', 'required|matches[password]
');
            $data['userid'] = $this->input->post('id');
            //$this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->run();
             if ($this->form_validation->run() == FALSE)
                {
                       
                        $this->load->view('agent/change_password');
                }
                else{
                    if($this->agent_model->change_agent_password() == TRUE){
                        redirect('agent');
                    }
                     else
                        $data['errormsg'] = 'Password Change Failed! Try Again.';

                        $this->load->view('agent/change_password', $data);
                     }
                
        
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
    $data['agentauth'] = $this->agentauth;
    if(isset($data['agentauth']['agentlogged_in'])){
      $data['statelist'] = $this->front_model->stateList(1);
      $data['tripcategory'] = $this->front_model->tripcategoryList();

      $user = $this->agent_model->get_agent_detail($data['agentauth']['agentemail'])[0];
      
      //fileupload
          
                    $this->load->library('upload');
                    if (isset($_FILES['userfile'])) {
                      //print_r($_FILES['userfile']);
                    $upld1 = '';
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
                    if(is_array($upld1)){
                      foreach ($upld1 as $upld1key => $upld1value) {
                          //$this->load->library('image_lib'); 
                          $ghans['image_library'] = 'gd2';
                      $ghans['source_image']  = './uploads/'.$upld1value['orig_name'];

                      $ghans['maintain_ratio'] = FALSE;
                      $ghans['width'] = 272;
                      $ghans['height']  = 250;
                      $this->image_lib->clear();
                      $this->image_lib->initialize($ghans);

                      $this->image_lib->resize();
                      
                          array_push($imagenames, $upld1value['orig_name']);
                        }
                    }
                    
                    
                    

                    


                    }



      //form validation
      $this->form_validation->set_rules('title', 'Trip Title', 'required');
      $this->form_validation->set_rules('state', 'State', 'required');
      $this->form_validation->set_rules('location', 'Location', 'required');
      $this->form_validation->set_rules('category', 'Trip Category', 'required');
      $this->form_validation->set_rules('price', 'Price', 'required');
      $this->form_validation->set_rules('accommodation', 'Accommodation Type', 'required');
      $this->form_validation->set_rules('transportation', 'Transportation Type', 'required');
      $this->form_validation->set_rules('description', 'Trip description', 'required');
      $this->form_validation->set_rules('numofdays', 'Number of Days', 'required');
      $this->form_validation->set_rules('itinerary', 'Trip Itinerary', 'required');
      //$this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->run();
       if ($this->form_validation->run() == FALSE OR $cpt == 0)
                {
                       
            $this->load->view('agent/addtrip',$data);
                }
                else{
                  
                  if($this->front_model->addtripdomestic($imagenames, $user) > 0){
                    redirect('agent/domestic_trip');
                  }
                  else{
                    echo 'failed';
                  }
                }
      
      
    }
    else{
      redirect('agent');
    }
    
  }


  public function addtrip_international()
  {
    $data['agentauth'] = $this->agentauth;
    if(isset($data['agentauth']['agentlogged_in'])){
      $data['countrylist'] = $this->front_model->countryList();
      $data['tripcategory'] = $this->front_model->tripcategoryList();

      $user = $this->agent_model->get_agent_detail($data['agentauth']['agentemail'])[0];
      
      //fileupload
          
                    $this->load->library('upload');
                    if (isset($_FILES['userfile'])) {
                      //print_r($_FILES['userfile']);
                    $upld1 = '';
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
                    if(is_array($upld1)){
                      foreach ($upld1 as $upld1key => $upld1value) {
                          //$this->load->library('image_lib'); 
                          $ghans['image_library'] = 'gd2';
                      $ghans['source_image']  = './uploads/'.$upld1value['orig_name'];

                      $ghans['maintain_ratio'] = FALSE;
                      $ghans['width'] = 272;
                      $ghans['height']  = 250;
                      $this->image_lib->clear();
                      $this->image_lib->initialize($ghans);

                      $this->image_lib->resize();
                      
                          array_push($imagenames, $upld1value['orig_name']);
                        }
                    }
                    
                    
                    

                    


                    }



      //form validation
      $this->form_validation->set_rules('title', 'Trip Title', 'required');
      $this->form_validation->set_rules('country', 'Country', 'required');
      $this->form_validation->set_rules('state', 'State', 'required');
      $this->form_validation->set_rules('location', 'Location', 'required');
      
      $this->form_validation->set_rules('category', 'Trip Category', 'required');
      $this->form_validation->set_rules('price', 'Price', 'required');
      $this->form_validation->set_rules('accommodation', 'Trip Category', 'required');
      $this->form_validation->set_rules('transportation', 'Transportation Type', 'required');
      $this->form_validation->set_rules('description', 'Trip description', 'required');
      $this->form_validation->set_rules('numofdays', 'Number of Days', 'required');
      $this->form_validation->set_rules('itinerary', 'Trip Itinerary', 'required');
      //$this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->run();
       if ($this->form_validation->run() == FALSE OR $cpt == 0)
                {
                      
            $this->load->view('agent/addtrip_int',$data);
                }
                else{
                  
                  if($this->front_model->addtripinternational($imagenames, $user) > 0){
                    redirect('agent/international_trip');
                  }
                  else{
                    echo 'failed';
                  }
                }
      
      
    }
    else{
      redirect('agent');
    }
    
  }


  public function international_trip()
  {
    $data['agentauth'] = $this->agentauth;
    if(isset($data['agentauth']['agentlogged_in'])){
      $data['countrylist'] = $this->front_model->countryList();
      $data['tripcategory'] = $this->front_model->tripcategoryList();

      $user = $this->agent_model->get_agent_detail($data['agentauth']['agentemail'])[0];
      $data['agent'] = $user;
      $data['trip'] = $this->front_model->get_internationalTrip($user->id);

      //print_r($trip);
      
      
      
            $this->load->view('agent/international_trip',$data);
                
      
      
    }
    else{
      redirect('agent');
    }
    
  }


  public function domestic_trip()
  {
    $data['agentauth'] = $this->agentauth;
    if(isset($data['agentauth']['agentlogged_in'])){
      $data['countrylist'] = $this->front_model->countryList();
      $data['tripcategory'] = $this->front_model->tripcategoryList();

      $user = $this->agent_model->get_agent_detail($data['agentauth']['agentemail'])[0];

      $data['agent'] = $user;

      $data['trip'] = $this->front_model->get_domesticTrip($user->id);

      //print_r($trip);
      
     
        $this->load->view('agent/domestic_trip',$data);
      


      
            
                
      
      
    }
    else{
      redirect('agent');
    }
    
  }


  public function domestic($action, $id)
  {
    $data['agentauth'] = $this->agentauth;
    if(isset($data['agentauth']['agentlogged_in'])){
      $data['statelist'] = $this->front_model->stateList(1);
      $data['tripcategory'] = $this->front_model->tripcategoryList();



      $user = $this->agent_model->get_agent_detail($data['agentauth']['agentemail'])[0];

      $data['trip'] = $this->front_model->find_domesticTrip($user->id, $id);

      //print_r($trip);
      
     
        //$this->load->view('agent/domestic_trip',$data);
      if($action == 'view'){

       // print_r($data);

      }
      else if($action == 'edit'){

        //for edit domestic

      $oldimagenames = unserialize($data['trip'][0]->images);
      
      $id = $data['trip'][0]->id;
      //fileupload
          
                    $this->load->library('upload');
                    if (isset($_FILES['userfile'])) {
                      //print_r($_FILES['userfile']);
                    $upld1 = '';
                    $time = time();
                    $files = $_FILES;
                    $cpt = count($_FILES['userfile']['name']);
                    
                      for($i=0; $i<$cpt-1; $i++)
                    {           
                        $_FILES['userfile']['name']= 'SimpliFytrips_'.$time.'_'.$i.$files['userfile']['name'][$i];
                        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload();
                        $upld1[] = $this->upload->data();
                        
                    }
                    $imagenames = $oldimagenames;
                    if(is_array($upld1)){
                      foreach ($upld1 as $upld1key => $upld1value) {
                          //$this->load->library('image_lib'); 
                          $ghans['image_library'] = 'gd2';
                      $ghans['source_image']  = './uploads/'.$upld1value['orig_name'];

                      $ghans['maintain_ratio'] = FALSE;
                      $ghans['width'] = 272;
                      $ghans['height']  = 250;
                      $this->image_lib->clear();
                      $this->image_lib->initialize($ghans);

                      $this->image_lib->resize();
                      
                          array_push($imagenames, $upld1value['orig_name']);
                        }
                    }
                    //print_r($imagenames);
                    
                    
                    

                    


                    }



      //form validation
      $this->form_validation->set_rules('title', 'Trip Title', 'required');
      $this->form_validation->set_rules('state', 'State', 'required');
      $this->form_validation->set_rules('location', 'Location', 'required');
      $this->form_validation->set_rules('category', 'Trip Category', 'required');
      $this->form_validation->set_rules('price', 'Price', 'required');
      $this->form_validation->set_rules('accommodation', 'Trip Category', 'required');
      $this->form_validation->set_rules('transportation', 'Transportation Type', 'required');
      $this->form_validation->set_rules('description', 'Trip description', 'required');
      $this->form_validation->set_rules('numofdays', 'Number of Days', 'required');
      $this->form_validation->set_rules('itinerary', 'Trip Itinerary', 'required');
      //$this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->run();
       if ($this->form_validation->run() == FALSE OR $cpt == 0)
                {
                       
            $this->load->view('agent/edit_domestic_trip',$data);
                }
                else{
                  //print_r($_POST);
                  
                  if($this->front_model->edit_tripdomestic($imagenames, $id, $user) > 0){
                    redirect('agent/domestic_trip');
                  }
                  else{
                    echo 'failed';
                  }
                }
      
      
    
    
    








      }
      else if($action == 'delete'){

        $this->front_model->delete_domesticTrip($id);
        redirect('agent/domestic_trip');

      }
      


      
            
                
      
      
    }
    else{
      redirect('agent');
    }
    
  }


    public function international($action, $id)
  {
    $data['agentauth'] = $this->agentauth;
    if(isset($data['agentauth']['agentlogged_in'])){
      $data['countrylist'] = $this->front_model->countryList();
      $data['tripcategory'] = $this->front_model->tripcategoryList();



      $user = $this->agent_model->get_agent_detail($data['agentauth']['agentemail'])[0];



      $data['trip'] = $this->front_model->find_internationalTrip($user->id, $id);

      //print_r($data['trip']);
      
     
        //$this->load->view('agent/domestic_trip',$data);
      if($action == 'view'){

       // print_r($data);

      }
      else if($action == 'edit'){

        //for edit domestic

      $oldimagenames = unserialize($data['trip'][0]->images);

      //print_r($oldimagenames);
      
      //$id = $data['trip'][0]->id;
      //fileupload
          
                    $this->load->library('upload');
                    if (isset($_FILES['userfile'])) {
                      //print_r($_FILES['userfile']);
                    $upld1 = '';
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
                    $imagenames = $oldimagenames;
                    if(is_array($upld1)){
                      foreach ($upld1 as $upld1key => $upld1value) {
                          //$this->load->library('image_lib'); 
                          $ghans['image_library'] = 'gd2';
                      $ghans['source_image']  = './uploads/'.$upld1value['orig_name'];

                      $ghans['maintain_ratio'] = FALSE;
                      $ghans['width'] = 272;
                      $ghans['height']  = 250;
                      $this->image_lib->clear();
                      $this->image_lib->initialize($ghans);

                      $this->image_lib->resize();
                      
                          array_push($imagenames, $upld1value['orig_name']);
                        }
                    }
                   // print_r($imagenames);
                    
                    
                    

                    


                    }



      //form validation
      $this->form_validation->set_rules('title', 'Trip Title', 'required');
      $this->form_validation->set_rules('country', 'Country', 'required');
      
      $this->form_validation->set_rules('category', 'Trip Category', 'required');
      $this->form_validation->set_rules('price', 'Price', 'required');
      $this->form_validation->set_rules('accommodation', 'Trip Category', 'required');
      $this->form_validation->set_rules('transportation', 'Transportation Type', 'required');
      $this->form_validation->set_rules('description', 'Trip description', 'required');
      $this->form_validation->set_rules('numofdays', 'Number of Days', 'required');
      $this->form_validation->set_rules('itinerary', 'Trip Itinerary', 'required');
      //$this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->run();
       if ($this->form_validation->run() == FALSE OR $cpt == 0)
                {
                       
            $this->load->view('agent/edit_international_trip',$data);
                }
                else{
                  //print_r($_POST);
                  
                  if($this->front_model->edit_tripinternational($imagenames, $id, $user) > 0){
                    redirect('agent/international_trip');
                  }
                  else{
                    echo 'failed';
                  }
                  
                }
      
      
    
    
    








      }
      else if($action == 'delete'){

        $this->front_model->delete_internationalTrip($id);
        redirect('agent/international_trip');

      }
      


      
            
                
      
      
    }
    else{
      redirect('agent');
    }
    
  }




}
