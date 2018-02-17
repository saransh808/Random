<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


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



	
	public function index()
	{
		$data['origin'] = $this->front_model->originList(1);
		$data['destination'] = $this->front_model->originList(1);
		$data['origin_country'] = $this->front_model->internationaldestinations(1);
		//$data['destination_country'] = $this->front_model->countryList();
		//print_r($data['origin_country']);
		$data['userauth'] = $this->userauth;
		$this->load->view('main/index',$data);
	}

	public function privacy()
	{
		$data['userauth'] = $this->userauth;
		$this->load->view('main/privacy',$data);
	}

	public function terms()
	{
		$data['userauth'] = $this->userauth;
		$this->load->view('main/terms',$data);
	}
	public function about()
	{
		$data['userauth'] = $this->userauth;
		$this->load->view('main/about',$data);
	}
	public function contact ()
	{
		$data['userauth'] = $this->userauth;
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE)
                {
                        echo validation_errors();
                        $this->load->view('main/contact',$data);
                }
                else
                {
                       // print_r($_POST);
                $subject = 'New Enquiry from Contact Us Page';
                $message = 'New Query has been raised from contact page'.
                			'First name : '.$this->input->post('fname').'
               				Last name : '.$this->input->post('lname').'
                			email : '.$this->input->post('email').'
                			phone : '.$this->input->post('phone').'
                			message : '.$this->input->post('message').'
                ';
                $headers = "From: Contact Inquiry <info@simplifytrips.com>" . "\r\n";

               $a =  mail('info@simplifytrips.com, contact@simplifytrips.com', $subject, $message, $header);
               if($a){
               	echo 'your request has been recorded. You will be contacted soon.';
               	redirect(current_page());
               }
                 

                
               }
		//$this->load->view('main/contact',$data);
	}
	public function meet_team ()
	{
		$data['userauth'] = $this->userauth;
		$this->load->view('main/meet-agents',$data);
	}
	public function customize ()
	{
		$data['userauth'] = $this->userauth;
		$this->form_validation->set_rules('name', 'First Name', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE)
                {
                        //echo validation_errors();
                        $this->load->view('main/customize',$data);
                        //print_r($_POST);
                }
                else
                {
                       // print_r($_POST);
                $subject = 'New Trip Enquiry from '.$this->input->post('email');
                $message = 'New Query has been raised from contact page'.
                			'Name : '.$this->input->post('name').'
               				
                			Email : '.$this->input->post('email').'
                			Phone : '.$this->input->post('phone').'
                			Origin : '.$this->input->post('origin').'
                			Destinition : '.$this->input->post('destinition').'
                			Number of Travelers : '.$this->input->post('numoftravelers').'
                			number of days : '.$this->input->post('numofdays').'
                			intermediate place : '.$this->input->post('intermediateplace').'
                			triptype : '.$this->input->post('triptype').'
                			
                			about : '.$this->input->post('about').'
                ';
                $headers = "From: Contact Inquiry <info@simplifytrips.com>" . "\r\n";

               $a =  mail('info@simplifytrips.com, contact@simplifytrips.com', $subject, $message, $header);
               if($a){
               	echo 'your request has been recorded. You will be contacted soon.';
               	redirect(current_page());
               }
                 

                
               }
		//$this->load->view('main/customize',$data);
	}
	public function compare ()
	{
		$data['userauth'] = $this->userauth;
		$this->load->view('main/compare',$data);
	}
	public function testimonial ()
	{
		$data['userauth'] = $this->userauth;
		$this->load->view('main/testimonial',$data);
	}
}
