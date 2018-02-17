<?php

class Front_model extends CI_Model {

    
    function __construct() {
	
	}

	public function originList($country){

		$query = $this->db->get_where('location', array('country_id' => $country));
		return $query->result();

	}


	//state list by countryid for domestic location i.e. from India only.
	public function stateList($country){

		$query = $this->db->get_where('state', array('country_id' => $country));
		return $query->result();

	}

	public function locationList($state){

		$query = $this->db->get_where('location', array('state_id' => $state));
		return $query->result();

	}


	public function tripcategoryList(){

		$query = $this->db->get_where('category', array('status' => 0 ));
		return $query->result();

	}

	public function countryList(){

		$query = $this->db->get_where('country');
		return $query->result();

	}


	public function internationaldestinations($country){

		$this->db->select('location.location, country.country');
		$this->db->from('location');

		$this->db->join('country', 'country.id = location.country_id');

		$this->db->where('country_id !=', '1');
		
		$query = $this->db->get();
		return $query->result();


	}
	
	public function get_location_by_name($loc){

		$query = $this->db->get_where('location', array('location' => $loc));
		return $query->result();

	}
	public function get_country_by_name($country){

		$query = $this->db->get_where('country', array('country' => $country));
		return $query->result();

	}

	public function get_trips_domestic($orginid, $destinationid, $pricesort, $daysort, $minprice, $maxprice){

		$this->db->select('domestic_trips.*, agent.organisation, agent.url, agent.phone, state.state, location.location, category.category as categoryname');
		$this->db->from('domestic_trips');
		$this->db->where(array('agent_location_id' => $orginid, 'location_id' => $destinationid, 'domestic_trips.status' => 0, 'price >=' => $minprice, 'price <=' => $maxprice));
		//$this->db->order_by('price', $pricesort);
		$this->db->order_by('price ' .$pricesort. ', numofdays ' .$daysort);
		$this->db->join('agent', 'agent.id = domestic_trips.agent_id');
				$this->db->join('state', 'state.id = domestic_trips.state_id');
				$this->db->join('location', 'location.id = domestic_trips.location_id');
				$this->db->join('category', 'category.id = domestic_trips.category');
		$query = $this->db->get();
		return $query->result();

	}
		public function get_trips_international($orginid, $destinationid, $pricesort, $daysort, $minprice, $maxprice){
			

		$this->db->select('international_trips.*, agent.organisation, agent.url, agent.phone, state.state, location.location, category.category as categoryname');
		$this->db->from('international_trips');
		$this->db->where(array('agent_location_id' => $orginid, 'location_id' => $destinationid, 'international_trips.status' => 0, 'price >=' => $minprice, 'price <=' => $maxprice));
		//$this->db->order_by('price', $pricesort);
		$this->db->order_by('price ' .$pricesort. ', numofdays ' .$daysort);
		$this->db->join('agent', 'agent.id = international_trips.agent_id');
				$this->db->join('state', 'state.id = international_trips.state_id');
				$this->db->join('location', 'location.id = international_trips.location_id');
				$this->db->join('category', 'category.id = international_trips.category');
		$query = $this->db->get();
		return $query->result();

	}

	/*public function get_trips_international($orginid, $destinationid){

		$query = $this->db->get_where('international_trips', array('agent_country_id' => $orginid, 'country_id' => $destinationid));
		return $query->result();

	}*/


	public function addtripdomestic($imagenames, $user){
		$title = $this->input->post('title');
		$state = $this->input->post('state');
		$location = $this->input->post('location');
		$category = $this->input->post('category');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$accommodation = $this->input->post('accommodation');
		$transportation = $this->input->post('transportation');
		$food = serialize($this->input->post('food'));
		$numofdays = $this->input->post('numofdays');
		$itinerary = $this->input->post('itinerary');

		$array = array(

				'agent_id' => $user->id,
				'agent_state_id' => $user->state,
				'agent_location_id' => $user->location,
				'title' => $title,
				'state_id' => $state,
				'location_id' => $location,
				'category' => $category,
				'description' => $description,
				'price' => $price,
				'accommodation' => $accommodation,
				'transportation' => $transportation,
				'food' => $food,
				'numofdays' => $numofdays,
				'itinerary' => $itinerary,
				'status' => 1,
				'time' => time(),
				'images' => serialize($imagenames) 

			);
		$this->db->insert('domestic_trips', $array);
		return $this->db->affected_rows();
	}


	public function edit_tripdomestic($imagenames, $id, $user){
		$title = $this->input->post('title');
		$state = $this->input->post('state');
		$location = $this->input->post('location');
		$category = $this->input->post('category');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$accommodation = $this->input->post('accommodation');

$transportation= $this->input->post('transportation');

		$food = serialize($this->input->post('food'));
		$numofdays = $this->input->post('numofdays');
		$itinerary = $this->input->post('itinerary');

		
		$array = array(

				'agent_id' => $user->id,
				'agent_state_id' => $user->state,
				'agent_location_id' => $user->location,
				'title' => $title,
				'state_id' => $state,
				'location_id' => $location,
				'category' => $category,
				'description' => $description,
				'price' => $price,
				'accommodation' => $accommodation,
'transportation' => $transportation,
				'food' => $food,
				'numofdays' => $numofdays,
				'itinerary' => $itinerary,
				'status' => 2,
				'time' => time(),
				'images' => serialize($imagenames) 

			);
		$this->db->where('id',$id);
		$this->db->update('domestic_trips', $array);
		return $this->db->affected_rows();
	}

	public function addtripinternational($imagenames, $user){
		$title = $this->input->post('title');
		$country = $this->input->post('country');
		$state = $this->input->post('state');
		$location = $this->input->post('location');
		$category = $this->input->post('category');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$accommodation = $this->input->post('accommodation');
		$transportation = $this->input->post('transportation');
		$food = serialize($this->input->post('food'));
		$numofdays = $this->input->post('numofdays');
		$itinerary = $this->input->post('itinerary');

		$array = array(

				'agent_id' => $user->id,
				'agent_country_id' => $user->country,
				'agent_state_id' => $user->state,
				'agent_location_id' => $user->location,
				'title' => $title,
				'country_id' => $country,
				'state_id' => $state,
				'location_id' => $location,
				'category' => $category,
				'description' => $description,
				'price' => $price,
				'accommodation' => $accommodation,
				'transportation' => $transportation,
				'food' => $food,
				'numofdays' => $numofdays,
				'itinerary' => $itinerary,
				'status' => 1,
				'time' => time(),
				'images' => serialize($imagenames) 

			);
		$this->db->insert('international_trips', $array);
		return $this->db->affected_rows();
	}



	public function edit_tripinternational($imagenames, $id, $user){
		$title = $this->input->post('title');
		$country = $this->input->post('country');
		
		$category = $this->input->post('category');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$accommodation = $this->input->post('accommodation');
		$food = serialize($this->input->post('food'));
		$numofdays = $this->input->post('numofdays');
		$itinerary = $this->input->post('itinerary');

		$array = array(

				'agent_id' => $user->id,
				'agent_country_id' => $user->country,
				'agent_state_id' => $user->state,
				'agent_location_id' => $user->location,
				'title' => $title,
				'country_id' => $country,
				
				'category' => $category,
				'description' => $description,
				'price' => $price,
				'accommodation' => $accommodation,
				'food' => $food,
				'numofdays' => $numofdays,
				'itinerary' => $itinerary,
				'status' => 1,
				'time' => time(),
				'images' => serialize($imagenames) 

			);

		$this->db->where('id', $id);
		$this->db->update('international_trips', $array);
		return $this->db->affected_rows();
	}


	public function get_domesticTrip($agentid){

				
				//$query = $this->db->get_where('', array('status' => 1));

				$this->db->select('domestic_trips.*, state.state, location.location, agent.email, category.category');
				$this->db->from('domestic_trips');
				$this->db->where(array('domestic_trips.agent_id' => $agentid ));
				
				$this->db->join('agent', 'agent.id = domestic_trips.agent_id');
				$this->db->join('state', 'state.id = domestic_trips.state_id');
				$this->db->join('location', 'location.id = domestic_trips.location_id');
				$this->db->join('category', 'category.id = domestic_trips.category');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
			public function find_domesticTrip($agentid, $id){

				
				//$query = $this->db->get_where('', array('status' => 1));

				$this->db->select('domestic_trips.*, state.state, location.location, agent.email, domestic_trips.category as categoryid, category.category');
				$this->db->from('domestic_trips');
				$this->db->where(array('domestic_trips.agent_id' => $agentid, 'domestic_trips.id' => $id ));
				
				$this->db->join('agent', 'agent.id = domestic_trips.agent_id');
				$this->db->join('state', 'state.id = domestic_trips.state_id');
				$this->db->join('location', 'location.id = domestic_trips.location_id');
				$this->db->join('category', 'category.id = domestic_trips.category');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
			public function get_internationalTrip($userid){

				
				//$query = $this->db->get_where('', array('status' => 1));

				$this->db->select('international_trips.*, country.country, agent.email, category.category');
				$this->db->from('international_trips');
				$this->db->where(array('international_trips.agent_id' => $userid ));
				
				$this->db->join('agent', 'agent.id = international_trips.agent_id');
				$this->db->join('country', 'country.id = international_trips.country_id');
				
				$this->db->join('category', 'category.id = international_trips.category');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}


			public function find_internationalTrip($userid, $id){

				
				//$query = $this->db->get_where('', array('status' => 1));

				$this->db->select('international_trips.*, country.country, agent.email, international_trips.category as categoryid, category.category');
				$this->db->from('international_trips');
				$this->db->where(array('international_trips.agent_id' => $userid, 'international_trips.id' => $id  ));
				
				$this->db->join('agent', 'agent.id = international_trips.agent_id');
				$this->db->join('country', 'country.id = international_trips.country_id');
				
				$this->db->join('category', 'category.id = international_trips.category');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function delete_domesticTrip($id){

				
				//$query = $this->db->get_where('', array('status' => 1));

				
				
				
				
				$query = $this->db->get_where('domestic_trips',array('id' => $id ));
				
				
				if($this->db->count_all_results() > 0){
					$result = $query->result()[0];
					$res = unserialize($result->images);
					foreach ($res as $img) {
						unlink("./uploads/".$img);
					}

					}
				$this->db->delete('domestic_trips', array('id' => $id));
				return TRUE;
				
			}


			public function delete_Trip_image($id, $images, $trip){

				
				//$query = $this->db->get_where('', array('status' => 1));
				$array = array(
						'images' => $images
					);
				$this->db->where('id', $id);
				$this->db->update($trip, $array);
				return TRUE;
			
				
			}


			public function delete_internationalTrip($id){

				
				//$query = $this->db->get_where('', array('status' => 1));

				
				
				
				
				$query = $this->db->get_where('international_trips',array('id' => $id ));
				
				
				if($this->db->count_all_results() > 0){
					$result = $query->result()[0];
					$res = unserialize($result->images);
					foreach ($res as $img) {
						unlink("./uploads/".$img);
					}

					}
				$this->db->delete('international_trips', array('id' => $id));
				return TRUE;
				
			}






}
