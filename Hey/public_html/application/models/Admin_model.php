<?php
	class Admin_model extends CI_model
	{
			public function admin_login($username, $password){
				
				$query = $this->db->get_where('admin', array('username' => $username,'password' => $password));
				if($this->db->count_all_results() > 0){
					$result = $query->result();
					
					foreach($result as $result1){
						$adminsession = array(
									'admin123username'  => $result1->username,
									'admin123id'     => $result1->id
									
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

			// To get Logout from admin Panel
			public function admin_logout(){
				$adminsession = array('admin123username', 'admin123id');
				$this->session->unset_userdata($adminsession);
				
			}

			public function addcountry(){

				$country = ucfirst($this->input->post('country'));
				$status = $this->input->post('status');

				$array = array(
								'country' => $country,
								'status' => $status
							);

				
				
				$this->db->set($array);
				$this->db->insert('country');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}

			public function get_country(){

				
				$query = $this->db->get('country');
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function find_country_by_id($id){

				$query = $this->db->get_where('country', array('id' => $id));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}
			
			public function update_country(){

				$country = ucfirst($this->input->post('country'));
				$id = $this->input->post('id');
				$status = $this->input->post('status');

				$array = array(
								'country' => $country,
								'status' => $status
							);

				
				
				
				$this->db->where('id', $id);
				$this->db->update('country', $array);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}

			public function delete_country($id){

				

				$query = $this->db->delete('country', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

			public function get_country_dropdown(){

				
				$query = $this->db->get('country');
				
				
				if($this->db->count_all_results() > 0){
					$result = $query->result();
					$a = array();
					foreach ($result as $key => $value) {
						$a[$value->id] = $value->country ;
					}
					return $a;
					}
				
			}



			public function addstate(){

				$country_id = $this->input->post('country');
				$state = ucfirst($this->input->post('state'));
				$status = $this->input->post('status');

				$array = array(
								'country_id' => $country_id,
								'state' => $state,
								'status' => $status
							);

				
				
				$this->db->set($array);
				$this->db->insert('state');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}

			public function get_state(){

				
				$query = $this->db->get('state');
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function get_state_with_country_name(){

				$this->db->select('state.*, country.country');
				$this->db->from('state');
				$this->db->join('country', 'country.id = state.country_id');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function find_state_by_id($id){

				$query = $this->db->get_where('state', array('id' => $id));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}
			

			
			public function update_state(){

				$country_id = ucfirst($this->input->post('country'));
				$state = ucfirst($this->input->post('state'));
				$id = $this->input->post('id');
				$status = $this->input->post('status');

				$array = array(
								'country_id' => $country_id,
								'state' => $state,
								'status' => $status
							);

				
				
				
				$this->db->where('id', $id);
				$this->db->update('state', $array);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}


			public function delete_state($id){

				

				$query = $this->db->delete('state', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

			public function get_state_dropdown($country_id){

				$this->db->where('country_id', $country_id);
				$query = $this->db->get('state');
				
				
				if($this->db->count_all_results() > 0){
					$result = $query->result();
					$a = array();
					foreach ($result as $key => $value) {
						$a[$value->id] = $value->state ;
					}
					return $a;
					}
				
			}

			


			public function addlocation(){

				$country_id = $this->input->post('country');
				$state_id = $this->input->post('state');
				$location = ucfirst($this->input->post('location'));
				$status = $this->input->post('status');

				$array = array(
								'country_id' => $country_id,
								'state_id' => $state_id,
								'location' => $location,
								'status' => $status
							);

				
				
				$this->db->set($array);
				$this->db->insert('location');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}



			public function get_location_with_state_and_country_name(){

				$this->db->select('location.*, state.state, country.country');
				$this->db->from('location');
				$this->db->join('country', 'country.id = location.country_id');
				$this->db->join('state', 'state.id = location.state_id');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}


			public function find_location_by_id($id){

				$query = $this->db->get_where('location', array('id' => $id));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}


			public function update_location(){

				$country_id = $this->input->post('country');
				$state_id = $this->input->post('state');
				$location = ucfirst($this->input->post('location'));
				$id = $this->input->post('id');
				$status = $this->input->post('status');

				$array = array(
								'country_id' => $country_id,
								'state_id' => $state_id,
								'location' => $location,
								'status' => $status
							);

				
				
				
				$this->db->where('id', $id);
				$this->db->update('location', $array);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}




			public function delete_location($id){

				

				$query = $this->db->delete('location', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}





			public function addcategory(){

				$category = ucfirst($this->input->post('category'));
				$status = $this->input->post('status');

				$array = array(
								'category' => $category,
								'status' => $status
							);

				
				
				$this->db->set($array);
				$this->db->insert('category');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}

			public function get_category(){

				
				$query = $this->db->get('category');
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function find_category_by_id($id){

				$query = $this->db->get_where('category', array('id' => $id));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}
			
			public function update_category(){

				$category = ucfirst($this->input->post('category'));
				$id = $this->input->post('id');
				$status = $this->input->post('status');

				$array = array(
								'category' => $category,
								'status' => $status
							);

				
				
				
				$this->db->where('id', $id);
				$this->db->update('category', $array);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}

			public function delete_category($id){

				

				$query = $this->db->delete('category', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

			public function get_category_dropdown(){

				
				$query = $this->db->get('country');
				
				
				if($this->db->count_all_results() > 0){
					$result = $query->result();
					$a = array();
					foreach ($result as $key => $value) {
						$a[$value->id] = $value->country ;
					}
					return $a;
					}
				
			}

			

			public function get_domesticTrip(){

				
				//$query = $this->db->get_where('', array('status' => 1));

				$this->db->select('domestic_trips.*, state.state, location.location, agent.email, category.category');
				$this->db->from('domestic_trips');
				//$this->db->where(array('domestic_trips.status' => 1 ));
				
				$this->db->join('agent', 'agent.id = domestic_trips.agent_id');
				$this->db->join('state', 'state.id = domestic_trips.state_id');
				$this->db->join('location', 'location.id = domestic_trips.location_id');
				$this->db->join('category', 'category.id = domestic_trips.category');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
			public function get_internationalTrip(){

				
				//$query = $this->db->get_where('', array('status' => 1));

				$this->db->select('international_trips.*, country.country, agent.email, category.category');
				$this->db->from('international_trips');
				//$this->db->where(array('international_trips.status' => 1 ));
				
				$this->db->join('agent', 'agent.id = international_trips.agent_id');
				$this->db->join('country', 'country.id = international_trips.country_id');
				
				$this->db->join('category', 'category.id = international_trips.category');
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			
			public function activate_domesticTrip($id){

				$array = array(
								
								'status' => 0
							);

				
				
				
				$this->db->where('id', $id);
				$this->db->update('domestic_trips', $array);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}


			}
			public function delete_domesticTrip($id){

				

				$query = $this->db->delete('domestic_trips', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

			public function activate_internationalTrip($id){

				$array = array(
								
								'status' => 0
							);

				
				
				
				$this->db->where('id', $id);
				$this->db->update('international_trips', $array);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}


			}

			public function delete_internationalTrip($id){

				

				$query = $this->db->delete('international_trips', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

			public function delete_agent($id){

				

				$query = $this->db->delete('agent', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

			public function delete_user($id){

				

				$query = $this->db->delete('user', array('id' => $id)); 



				if($query){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}






			

			

			

			






/*			

			public function gettripName()
		    {
		    	$this->db->select('*');
				$this->db->from('triptype');
		        $this->db->order_by('TripName','asc');
				
		        $query = $this->db->get();
		        
		        return $query->result();
			
		    }

		    public function getstateName()
		    {
		    	
				
		        $query = $this->db->query("select distinct state from locations");
		        
		        return $query->result();
			
		    }

		     public function getcityName($state)
		    {
		    	
				
		        $query = $this->db->query("select distinct location, id from locations where state = '".$state."'");
		        
		        return $query->result();
			
		    }





		    // To add the content for location
			public function admin_add_locations($upld,$imagenames){

				
				$state = ucfirst($this->input->post('state'));
				$location = ucfirst($this->input->post('location'));
				$nearbylocation = ucfirst($this->input->post('nearbylocation'));
				$tagline = $this->input->post('tagline');
				$description = $this->input->post('description');
				$triptype = $this->input->post('triptype');
				$wravlersfav = $this->input->post('wravlersfav');
				$sessionsfav = $this->input->post('sessionsfav');
				$status = $this->input->post('status');

					foreach ($triptype as $triptypea) {
						$triptypeIds1 .= $triptypea.',';
					}
					$triptypeIds = rtrim($triptypeIds1, ',');
				
					//finding lat long for location
					$address = str_replace(" ", "+", $location).'+'.str_replace(" ", "+", $state);
					$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					$lat = $response_a->results[0]->geometry->location->lat;
					
					$long = $response_a->results[0]->geometry->location->lng;



					//finding lat long for road head nearbylocation
					$addressh = str_replace(" ", "+", $nearbylocation).'+'.str_replace(" ", "+", $state);
					$urlh = "http://maps.google.com/maps/api/geocode/json?address=$addressh&sensor=false&region=India";
					$chh = curl_init();
					curl_setopt($chh, CURLOPT_URL, $urlh);
					curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($chh, CURLOPT_PROXYPORT, 3128);
					curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, 0);
					$responseh = curl_exec($chh);
					curl_close($chh);
					$response_ah = json_decode($responseh);
					$lath = $response_ah->results[0]->geometry->location->lat;
					
					$longh = $response_ah->results[0]->geometry->location->lng;


				$array = array(
					'location' => $location,
					'state' => $state,
					'latitude' => $lat,
					'longitude' => $long,
					'nearbyroaddhead' => $nearbylocation,
					'nearbyroaddhead_latitude' => $lath,
					'nearbyroaddhead_longitude' => $longh,
					'image' => $upld['orig_name'],
					'banner_images' => $imagenames,
					'tagline' => $tagline,
					'description' => $description,
					'triptypeIds' => $triptypeIds,
					'sessionsfav' => $sessionsfav,
					'wravlersfav' => $wravlersfav,
					'status' => $status);

				
				
				$this->db->set($array);
				$this->db->insert('locations');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}

				public function admin_add_attractions($imagename, $imagetext, $locationid){
					
					foreach ($imagename as $key => $imagename1) {

						if(isset($imagetext[$key])){
							$data = array(
							   
							   'imagename' => $imagename1,

							   'image_text' => $imagetext[$key],
							   'locationid' => $locationid ,
							);
							$this->db->set($data);

							$this->db->insert('attractions'); 
						}
						# code...
					}
				
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}
			
			//To get content from locations
			public function admin_get_locations(){

				
				$query = $this->db->get('locations');
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function admin_get_attraction($locationid){

				
				$query = $this->db->get_where('attractions', array('locationid' => $locationid));
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function gettripnamebyid($tripid){

		    	//$this->db->select('*');
				//$this->db->from('triptype');
		       $query = $this->db->get_where('triptype', array('TrId' => $tripid));
				
		        //$query = $this->db->get();
		        
		        return $query->result();
			
			}

			public function admin_find_location($locid){

				$query = $this->db->get_where('locations', array('id' => $locid));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}





// To update the content for location
			public function admin_update_location($upld,$imagenames){

				
				$state = ucfirst($this->input->post('state'));
				$location = ucfirst($this->input->post('location'));
				$nearbylocation = ucfirst($this->input->post('nearbylocation'));
				$tagline = $this->input->post('tagline');
				$description = $this->input->post('description');
				$triptype = $this->input->post('triptype');
				$wravlersfav = $this->input->post('wravlersfav');
				$sessionsfav = $this->input->post('sessionsfav');
				$status = $this->input->post('status');

					foreach ($triptype as $triptypea) {
						$triptypeIds1 .= $triptypea.',';
					}
					$triptypeIds = rtrim($triptypeIds1, ',');
				
					//finding lat long for location
					$address = str_replace(" ", "+", $location).'+'.str_replace(" ", "+", $state);
					$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					$lat = $response_a->results[0]->geometry->location->lat;
					
					$long = $response_a->results[0]->geometry->location->lng;



					//finding lat long for road head nearbylocation
					$addressh = str_replace(" ", "+", $nearbylocation).'+'.str_replace(" ", "+", $state);
					$urlh = "http://maps.google.com/maps/api/geocode/json?address=$addressh&sensor=false&region=India";
					$chh = curl_init();
					curl_setopt($chh, CURLOPT_URL, $urlh);
					curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($chh, CURLOPT_PROXYPORT, 3128);
					curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, 0);
					$responseh = curl_exec($chh);
					curl_close($chh);
					$response_ah = json_decode($responseh);
					$lath = $response_ah->results[0]->geometry->location->lat;
					
					$longh = $response_ah->results[0]->geometry->location->lng;

					$id = $this->input->post('id');


if($imagenames != '' && $upld != ''){


				$this->db->query("update locations set location = '$location', state = '$state', latitude = '$lat', longitude = '$long', nearbyroaddhead = '$nearbylocation', nearbyroaddhead_latitude = '$lath', nearbyroaddhead_longitude = '$longh', image = '$upld', banner_images = '$imagenames', tagline = '$tagline', description = '$description', triptypeIds = '$triptypeIds', wravlersfav = '$wravlersfav', sessionsfav = '$sessionsfav', status = '$status' where id = '$id'");

				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

}

else if($imagenames == '' && $upld != ''){

	
				$this->db->query("update locations set location = '$location', state = '$state', latitude = '$lat', longitude = '$long', nearbyroaddhead = '$nearbylocation', nearbyroaddhead_latitude = '$lath', nearbyroaddhead_longitude = '$longh', image = '$upld', tagline = '$tagline', description = '$description', triptypeIds = '$triptypeIds', wravlersfav = '$wravlersfav', sessionsfav = '$sessionsfav', status = '$status' where id = '$id'");
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

}

else if($imagenames != '' && $upld == ''){

	$this->db->query("update locations set location = '$location', state = '$state', latitude = '$lat', longitude = '$long', nearbyroaddhead = '$nearbylocation', nearbyroaddhead_latitude = '$lath', nearbyroaddhead_longitude = '$longh', banner_images = '$imagenames', tagline = '$tagline', description = '$description', triptypeIds = '$triptypeIds', wravlersfav = '$wravlersfav', sessionsfav = '$sessionsfav', status = '$status' where id = '$id'");
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}


}

else{

	$this->db->query("update locations set location = '$location', state = '$state', latitude = '$lat', longitude = '$long', nearbyroaddhead = '$nearbylocation', nearbyroaddhead_latitude = '$lath', nearbyroaddhead_longitude = '$longh', tagline = '$tagline', description = '$description', triptypeIds = '$triptypeIds', wravlersfav = '$wravlersfav', sessionsfav = '$sessionsfav', status = '$status' where id = '$id'");
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}
			
						}




		public function admin_delete_location($locid){

				$query1 = $this->db->get_where('locations', array('id' => $locid));
				$result = $query1->row()->image;
				
				$query2 = unlink('./uploads/'.$result);

				

				$query3 = $this->db->delete('locations', array('id' => $locid)); 



				if($query2 && $query3){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}

		public function admin_add_quiz_questions(){

			$question = ucfirst($this->input->post('question'));
			$option1 = $this->input->post('option1');
			$option2 = $this->input->post('option2');
			$option3 = $this->input->post('option3');
			$option4 = $this->input->post('option4');
			$correctanswer = $this->input->post('correctanswer');
			$level = $this->input->post('level');

			$array = array(
					'question' => $question,
					'option1' => $option1,
					'option2' => $option2,
					'option3' => $option3,
					'option4' => $option4,
					'correctanswer' => $correctanswer,
					'level' => $level
					);

				
				
				$this->db->set($array);
				$this->db->insert('quiz_questions');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}



		}

			
		//To get quetions from quiz questions
			public function admin_get_quiz_questions(){

				
				$query = $this->db->get('quiz_questions');
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}




	public function admin_add_quiz_level(){

			
			$startdate = $this->input->post('startdate');
			$lastdate = $this->input->post('lastdate');
			

			$array = array(
					'startdate' => $startdate,
					'lastdate' => $lastdate
					
					);

				
				
				$this->db->set($array);
				$this->db->insert('quiz_level');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}



		}

		//To get quetions from quiz level
			public function admin_get_quiz_level(){

				
				$query = $this->db->get('quiz_level');
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}


		//add gallery cat
			public function addgallerycategory(){

			$category = $this->input->post('category');
			$status = $this->input->post('status');
			

			$array = array(
					'name' => $category,
					'status' => $status
					
					);

				
				
				$this->db->set($array);
				$this->db->insert('gallery_category');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}

			public function admin_get_gallery_cat(){

				
				$query = $this->db->get('gallery_category');
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
			public function admin_find_gallery_cat($locid){

				$query = $this->db->get_where('gallery_category', array('id' => $locid));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}


			public function editgallerycategory(){

			$id = $this->input->post('id');
			$category = $this->input->post('category');
			$status = $this->input->post('status');
			

			$array = array(
					'name' => $category,
					'status' => $status
					
					);

				
				
				$this->db->set($array);
				$this->db->where('id', $id);
				$this->db->update('gallery_category'); 
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

			}


			public function admin_delete_gallery_cat($locid){

				

				$query3 = $this->db->delete('gallery_category', array('id' => $locid)); 



				if($query3){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}




			public function admin_add_gallery_item($upld,$imagenames){

				
				$title = ucfirst($this->input->post('title'));
				$state = ucfirst($this->input->post('state'));
				$location = ucfirst($this->input->post('location'));
				$nearbylocation = ucfirst($this->input->post('nearbylocation'));
				
				$description = $this->input->post('description');
				$gallery_cat_id = $this->input->post('category');
				
				$status = $this->input->post('status');

					foreach ($triptype as $triptypea) {
						$triptypeIds1 .= $triptypea.',';
					}
					$triptypeIds = rtrim($triptypeIds1, ',');
				
					//finding lat long for location
					$address = str_replace(" ", "+", $location).'+'.str_replace(" ", "+", $state);
					$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					$lat = $response_a->results[0]->geometry->location->lat;
					
					$long = $response_a->results[0]->geometry->location->lng;



					//finding lat long for road head nearbylocation
					$addressh = str_replace(" ", "+", $nearbylocation).'+'.str_replace(" ", "+", $state);
					$urlh = "http://maps.google.com/maps/api/geocode/json?address=$addressh&sensor=false&region=India";
					$chh = curl_init();
					curl_setopt($chh, CURLOPT_URL, $urlh);
					curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($chh, CURLOPT_PROXYPORT, 3128);
					curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, 0);
					$responseh = curl_exec($chh);
					curl_close($chh);
					$response_ah = json_decode($responseh);
					$lath = $response_ah->results[0]->geometry->location->lat;
					
					$longh = $response_ah->results[0]->geometry->location->lng;


				$array = array(
					'title' => $title,
					'location' => $location,
					'state' => $state,
					'location_lat' => $lat,
					'location_lon' => $long,
					'nearbyroadhead' => $nearbylocation,
					'nearbyroadhead_lat' => $lath,
					'nearbyroadhead_lon' => $longh,
					'image' => $upld['orig_name'],
					'banner_images' => $imagenames,
					
					'description' => $description,
					'gallery_cat_id' => $gallery_cat_id,
					
					'status' => $status);

				
				
				$this->db->set($array);
				$this->db->insert('gallery_item');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}
		

		public function admin_get_gallery_items(){

				
				$query = $this->db->get('gallery_item');
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

		public function admin_delete_gallery_item($locid){

				$query1 = $this->db->get_where('gallery_item', array('id' => $locid));
				$result = $query1->row()->image;
				
				$query2 = unlink('./uploads/gallery/'.$result);

				

				$query3 = $this->db->delete('gallery_item', array('id' => $locid)); 



				if($query2 && $query3){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}
		public function admin_find_gallery_item($locid){

				$query = $this->db->get_where('gallery_item', array('id' => $locid));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}


		public function admin_update_gallery_item($upld,$imagenames){

				
				$title = ucfirst($this->input->post('title'));
				$state = ucfirst($this->input->post('state'));
				$location = ucfirst($this->input->post('location'));
				$nearbylocation = ucfirst($this->input->post('nearbylocation'));
				
				$description = $this->input->post('description');
				$category = $this->input->post('category');
				
				$status = $this->input->post('status');

					
				
					//finding lat long for location
					$address = str_replace(" ", "+", $location).'+'.str_replace(" ", "+", $state);
					$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					$lat = $response_a->results[0]->geometry->location->lat;
					
					$long = $response_a->results[0]->geometry->location->lng;



					//finding lat long for road head nearbylocation
					$addressh = str_replace(" ", "+", $nearbylocation).'+'.str_replace(" ", "+", $state);
					$urlh = "http://maps.google.com/maps/api/geocode/json?address=$addressh&sensor=false&region=India";
					$chh = curl_init();
					curl_setopt($chh, CURLOPT_URL, $urlh);
					curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($chh, CURLOPT_PROXYPORT, 3128);
					curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, 0);
					$responseh = curl_exec($chh);
					curl_close($chh);
					$response_ah = json_decode($responseh);
					$lath = $response_ah->results[0]->geometry->location->lat;
					
					$longh = $response_ah->results[0]->geometry->location->lng;

					$id = $this->input->post('id');


if($imagenames != '' && $upld != ''){


				$this->db->query("update gallery_item set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', image = '$upld', banner_images = '$imagenames', description = '$description', gallery_cat_id = '$category', status = '$status' where id = '$id'");

				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

}

else if($imagenames == '' && $upld != ''){

	
				$this->db->query("update gallery_item set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', image = '$upld', description = '$description', gallery_cat_id = '$category', status = '$status' where id = '$id'");
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

}

else if($imagenames != '' && $upld == ''){

	$this->db->query("update gallery_item set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', banner_images = '$imagenames', description = '$description', gallery_cat_id = '$category', status = '$status' where id = '$id'");
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}


}

else{

	$this->db->query("update gallery_item set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', description = '$description', gallery_cat_id = '$category', status = '$status' where id = '$id'");
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}
			
						}




public function admin_add_package($upld,$imagenames){

				
				$title = ucfirst($this->input->post('title'));
				$state = ucfirst($this->input->post('state'));
				$location = ucfirst($this->input->post('location'));
				$nearbylocation = ucfirst($this->input->post('nearbylocation'));
				
				$description = $this->input->post('description');
				$triptype = $this->input->post('triptype');
				
				
				$numofdays = $this->input->post('numofdays');
				$staytype = ucwords($this->input->post('staytype'));
				$modeoftransport = ucwords($this->input->post('modeoftransport'));
				$meals = ucwords($this->input->post('meals'));
				$dayiternary1 = $this->input->post('dayiternary');

				$status = $this->input->post('status');


					foreach ($dayiternary1 as $dayiternary11) {
						$dayiternary111 .= $dayiternary11.'##SEPRATEDAYSITERNARY## ';
					}
					$dayiternary = rtrim($dayiternary111, '##SEPRATEDAYSITERNARY## ');
				
					//finding lat long for location
					$address = str_replace(" ", "+", $location).'+'.str_replace(" ", "+", $state);
					$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					$lat = $response_a->results[0]->geometry->location->lat;
					
					$long = $response_a->results[0]->geometry->location->lng;



					//finding lat long for road head nearbylocation
					$addressh = str_replace(" ", "+", $nearbylocation).'+'.str_replace(" ", "+", $state);
					$urlh = "http://maps.google.com/maps/api/geocode/json?address=$addressh&sensor=false&region=India";
					$chh = curl_init();
					curl_setopt($chh, CURLOPT_URL, $urlh);
					curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($chh, CURLOPT_PROXYPORT, 3128);
					curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, 0);
					$responseh = curl_exec($chh);
					curl_close($chh);
					$response_ah = json_decode($responseh);
					$lath = $response_ah->results[0]->geometry->location->lat;
					
					$longh = $response_ah->results[0]->geometry->location->lng;


				$array = array(
					'title' => $title,
					'location' => $location,
					'state' => $state,
					'location_lat' => $lat,
					'location_lon' => $long,
					'nearbyroadhead' => $nearbylocation,
					'nearbyroadhead_lat' => $lath,
					'nearbyroadhead_lon' => $longh,
					'image' => $upld['orig_name'],
					'banner_images' => $imagenames,
					
					'description' => $description,
					'triptype' => $triptype,
					'staytype' => $staytype,
					'modeoftransport' => $modeoftransport,
					'meals' => $meals,
					'numofdays' => $numofdays,
					'dayiternary' => $dayiternary,
					
					'status' => $status);

				
				
				$this->db->set($array);
				$this->db->insert('package');
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}


			public function admin_get_packages(){

				
				$query = $this->db->get('package');
				
				//$query = $this->db->get('locations');
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}

			public function admin_delete_package($locid){

				$query1 = $this->db->get_where('package', array('id' => $locid));
				$result = $query1->row()->image;
				
				$query2 = unlink('./uploads/package/'.$result);

				

				$query3 = $this->db->delete('package', array('id' => $locid)); 



				if($query2 && $query3){
					return TRUE;
					
					}
					else{
						return FALSE;
					}


			}
		public function admin_find_package($locid){

				$query = $this->db->get_where('package', array('id' => $locid));
				if($this->db->count_all_results() > 0){
					return $result = $query->row();
					
					}


			}

			




		public function admin_update_package($upld,$imagenames){

				
				$title = ucfirst($this->input->post('title'));
				$state = ucfirst($this->input->post('state'));
				$location = ucfirst($this->input->post('location'));
				$nearbylocation = ucfirst($this->input->post('nearbylocation'));
				
				$description = $this->input->post('description');
				$triptype = $this->input->post('triptype');
				
				
				$numofdays = $this->input->post('numofdays');
				$staytype = ucwords($this->input->post('staytype'));
				$modeoftransport = ucwords($this->input->post('modeoftransport'));
				$meals = ucwords($this->input->post('meals'));
				$dayiternary1 = $this->input->post('dayiternary');

				$status = $this->input->post('status');


					foreach ($dayiternary1 as $dayiternary11) {
						$dayiternary111 .= $dayiternary11.'##SEPRATEDAYSITERNARY## ';
					}
					$dayiternary = rtrim($dayiternary111, '##SEPRATEDAYSITERNARY## ');

					
				
					//finding lat long for location
					$address = str_replace(" ", "+", $location).'+'.str_replace(" ", "+", $state);
					$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=India";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					$response = curl_exec($ch);
					curl_close($ch);
					$response_a = json_decode($response);
					$lat = $response_a->results[0]->geometry->location->lat;
					
					$long = $response_a->results[0]->geometry->location->lng;



					//finding lat long for road head nearbylocation
					$addressh = str_replace(" ", "+", $nearbylocation).'+'.str_replace(" ", "+", $state);
					$urlh = "http://maps.google.com/maps/api/geocode/json?address=$addressh&sensor=false&region=India";
					$chh = curl_init();
					curl_setopt($chh, CURLOPT_URL, $urlh);
					curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($chh, CURLOPT_PROXYPORT, 3128);
					curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, 0);
					$responseh = curl_exec($chh);
					curl_close($chh);
					$response_ah = json_decode($responseh);
					$lath = $response_ah->results[0]->geometry->location->lat;
					
					$longh = $response_ah->results[0]->geometry->location->lng;

					$id = $this->input->post('id');


if($imagenames != '' && $upld != ''){


				$this->db->query("update package set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', image = '$upld', banner_images = '$imagenames', description = '$description', triptype = '$triptype', staytype = '$staytype', modeoftransport = '$modeoftransport', meals = '$meals', numofdays = '$numofdays', dayiternary = '$dayiternary', status = '$status' where id = '$id'");

				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

}

else if($imagenames == '' && $upld != ''){

	
				$this->db->query("update package set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', image = '$upld', description = '$description', triptype = '$triptype', staytype = '$staytype', modeoftransport = '$modeoftransport', meals = '$meals', numofdays = '$numofdays', dayiternary = '$dayiternary', status = '$status' where id = '$id'");
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}

}

else if($imagenames != '' && $upld == ''){

	$this->db->query("update package set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', banner_images = '$imagenames', description = '$description', triptype = '$triptype', staytype = '$staytype', modeoftransport = '$modeoftransport', meals = '$meals', numofdays = '$numofdays', dayiternary = '$dayiternary', status = '$status' where id = '$id'");
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}


}

else{

	$this->db->query("update package set title = '$title', location = '$location', state = '$state', location_lat = '$lat', location_lon = '$long', nearbyroadhead = '$nearbylocation', nearbyroadhead_lat = '$lath', nearbyroadhead_lon = '$longh', description = '$description', triptype = '$triptype', staytype = '$staytype', modeoftransport = '$modeoftransport', meals = '$meals', numofdays = '$numofdays', dayiternary = '$dayiternary', status = '$status' where id = '$id'");
				
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;

				}
			}
			
						}




*/
		public function get_Agent(){

				
				$query = $this->db->get('agent');
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
		public function get_Agent1(){

				$this->db->select('agent.*, count(domestic_trips.agent_id) as dom');
				$this->db->from('agent');
				//$this->db->where(array('count(domestic_trips.agent_id)' => '0'));
				$this->db->join('domestic_trips', 'agent.id = domestic_trips.agent_id');
				$this->db->group_by('agent.id', 'dom');

				
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
			public function get_Agent2(){

				$this->db->select('agent.*, count(international_trips.agent_id) as international');
				$this->db->from('agent');
				//$this->db->where(array('count(domestic_trips.agent_id)' => '0'));
				$this->db->join('international_trips', 'agent.id = international_trips.agent_id');
				$this->db->group_by('agent.id', 'international');

				
				$query = $this->db->get();
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
		public function get_User(){

				
				$query = $this->db->get('user');
				
				
				if($this->db->count_all_results() > 0){
					return $result = $query->result();
					
					}
				
			}
	}