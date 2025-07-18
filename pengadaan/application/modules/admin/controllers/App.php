<?php
/**
 * 
 */
class App extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_model','mm');
		$this->load->helper('string');
		$this->load->helper('url');
	}

	public function index()
	{		
		$admin = $this->session->userdata('admin');

		$getUser = $this->mm->to_app($admin['id_user']);
		
		$this->session->sess_destroy();

		$data = array(
			'name' 			=> $getUser['name'],
			'id_user' 		=> $getUser['id'],
			'id_role' 		=> $getUser['id_role_app2'],
			'id_division'	=> $getUser['id_division'],
			'app_type'		=> 1,
			'email'	 		=> $getUser['email'],
			'photo_profile' => $getUser['photo_profile'],
		);

		$key = random_string('unique').random_string('unique').random_string('unique').random_string('unique');
		$this->db->insert('ms_key_value', array(
			'key' => $key,
			'value'=> json_encode($data),
		));

		// Redirect to main application with proper URL structure
		$main_base_url = "http://local.eproc.intra.com/main/";
		$redirect_url = $main_base_url . "index.php/main/from_eks?key=".$key;
		header("Location: ".$redirect_url);
	}
}