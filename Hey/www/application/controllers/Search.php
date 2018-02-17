<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	 
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

		
		$data['userauth'] = $this->userauth;
		
		$data['category'] = $this->front_model->tripcategoryList();
		
		if($_GET['options'] == 'domestic'){

			$origin = $this->front_model->get_location_by_name($_GET['origin'])[0];

			$destination = $this->front_model->get_location_by_name($_GET['destination'])[0];
			if($origin == null || $destination == null){
				$data['error'] = 'loc';
			}
			else{

				$search = $this->front_model->get_trips_domestic($origin->id, $destination->id, $_GET['pricesort'], $_GET['daysort'], $_GET['minprice'], $_GET['maxprice']);
			if(empty($search)){
				$data['error'] = 'serch';
			}


			}

			
			

		}
		else if($_GET['options'] == 'international'){
			$origin = $this->front_model->get_location_by_name($_GET['origin'])[0];
			$dest = explode(' - ', $_GET['destination'])[0];
			$destination = $this->front_model->get_location_by_name($dest)[0];
			if($origin == null || $destination == null){
				$data['error'] = 'loc';
			}
			else{

			$search = $this->front_model->get_trips_international($origin->id, $destination->id, $_GET['pricesort'], $_GET['daysort'], $_GET['minprice'], $_GET['maxprice']);
				if(empty($search)){
					$data['error'] = 'serch';
				}
			}
		}
		else{
			redirect(404);
		}
		
		
		$data['result'] = $search;

		

		
		$data[] = '';
		$this->load->view('main/listing',$data);
	}
}
