<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller {

	public function __construct()
	{
		// Constructor to auto-load HybridAuthLib
		parent::__construct();
		$this->load->library('HybridAuthLib');
	}

	public function index()
	{
		// Send to the view all permitted services as a user profile if authenticated
		$login_data['providers'] = $this->hybridauthlib->getProviders();
		foreach($login_data['providers'] as $provider=>$d) {
			if ($d['connected'] == 1) {
				$login_data['providers'][$provider]['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
			}
		}

		$this->load->view('hauth/home', $login_data);
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

					$this->load->view('hauth/done',$data);
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

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
