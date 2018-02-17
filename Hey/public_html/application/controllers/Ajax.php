<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
	}


	public function getstatelistbybycountryid($countryid)
	{
		//echo $stateid;
		
		echo json_encode( $this->front_model->stateList($countryid));
		//$this->load->view('welcome_message');
	}
	public function getcitylistbystateid($stateid)
	{
		//echo $stateid;
		echo json_encode( $this->front_model->locationList($stateid));
		//$this->load->view('welcome_message');
	}
	public function deleteimg_domestic_trip()
	{
		$imgname = $this->input->post('imgname');
		$id = $this->input->post('id');
		$agent_id = $this->input->post('agent_id');
		$locdetail = $this->front_model->find_domesticTrip($agent_id, $id)[0]->images;
		$locarray = unserialize($locdetail);
		
		if(($key = array_search($imgname, $locarray)) !== false) {
		    unset($locarray[$key]);
		}
		
		
		$this->front_model->delete_Trip_image($id, serialize($locarray), 'domestic_trips');
		return TRUE;
	}
	public function deleteimg_international_trip()
	{
		$imgname = $this->input->post('imgname');
		$id = $this->input->post('id');
		$agent_id = $this->input->post('agent_id');
		$locdetail = $this->front_model->find_internationalTrip($agent_id, $id)[0]->images;
		$locarray = unserialize($locdetail);
		
		if(($key = array_search($imgname, $locarray)) !== false) {
		    unset($locarray[$key]);
		}
		
		
		$this->front_model->delete_Trip_image($id, serialize($locarray), 'international_trips');
		return TRUE;
	}

	public function locationslist()
	{
		echo json_encode($this->front_model->originList(1), JSON_PRETTY_PRINT);
		//print_r($data);
		
		
		
	}



}
