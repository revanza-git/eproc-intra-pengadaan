<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('user')){
			redirect('dashboard');
		}elseif($this->session->userdata('admin')){
			redirect('admin');
		}else{
			header("Location: ".$this->config->item('vms_url'));
		}
	}
	
	public function login_user($name,$id_user,$id_sbu,$vendor_status,$is_active,$type,$app)
	{
		if($type == 'user'){
			$set_session = array(
				'id_user' 		=> 	$id_user,
				'name'			=>	str_replace('%20', ' ', $name),
				'id_sbu'		=>	$id_sbu,
				'vendor_status'	=>	$vendor_status,
				'is_active'		=>	$data['is_active'],
				'app'			=>	'vms'
			);

			$this->session->set_userdata('user',$set_session);

			$item['content'] 	= $this->load->view('redirect',$data,TRUE);
			$this->load->view('template',$item);
		}
	}

	public function login_admin()
	{
		$key = $this->input->get('key', TRUE);

		if (!$key) {
			header("Location:https://apps.pertamina.com/eproc_nusantararegas");
		}

		$data = $this->db->where('key', $key)->where('deleted_at', NULL)->get('ms_key_value')->row_array();

		if (!$data) {
			header("Location:https://apps.pertamina.com/eproc_nusantararegas");
		}

		$value = json_decode($data['value']);

		$set_session = array(
			'id_user' 		=> 	$value->id_user,
			'name'			=>	$value->name,
			'id_sbu'		=>	$value->id_sbu,
			'id_role'		=>	$value->id_role,
			'role_name'		=>	$value->role_name,
			'sbu_name'		=>	$value->sbu_name,
			'app'			=>	$value->app,
			'division'		=>	$value->division,
			'id_division'	=>	$value->id_division
		);

		$this->session->set_userdata('admin',$set_session);

		$this->db->where('key', $key)->update('ms_key_value', array('deleted_at' => date('Y-m-d H:i:s')));
		
		redirect(site_url('admin'));
	}
	
	public function logout(){
		$this->session->sess_destroy();
		header('Location: '.$this->config->item('vms_url'));
	}
	
	public function showUser()
	{
		$query = " 	SELECT 
						a.name,
						b.username,
						b.password,
						a.vendor_status
					FROM
						ms_vendor a
					JOIN
						ms_login b ON a.id=b.id_user AND type='user'
					WHERE
						a.del=0 AND a.vendor_status = 2
		";
		$get_data_admin = $this->db->query($query)->result_array();

		$admin = '<table border=1>
			<thead>
				<tr>
					<th colspan="5">Daftar User Vendor (DPT)</th>
				</tr>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
				</tr>
			</thead>
			<tbody>';
			$no=1;
		foreach ($get_data_admin as $key => $value) {
			$admin .= '<tr>
				<td>'.$no.'</td>
				<td>'.$value['name'].'</td>
				<td>'.$value['username'].'</td>
				<td>'.$value['password'].'</td>
			</tr>';
			$no++;
		}
				
		$admin .='</tbody>
		</table> <br><br>';

		$query = ' 	SELECT 
						a.name,
						b.username,
						b.password,
						a.vendor_status
					FROM
						ms_vendor a
					JOIN
						ms_login b ON a.id=b.id_user AND type="user"
					WHERE
						a.del=0 AND a.vendor_status = 1
		';

		$get_data_vendor = $this->db->query($query)->result_array();
		$admin .='<table border=1>
			<thead>
				<tr>
					<th colspan="5">Daftar User Vendor (Daftar Tunggu)</th>
				</tr>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
				</tr>
			</thead>
			<tbody>';
		$no_ = 1;
		foreach ($get_data_vendor as $key => $value) {
			$admin .= '<tr>
				<td>'.$no_.'</td>
				<td>'.$value['name'].'</td>
				<td>'.$value['username'].'</td>
				<td>'.$value['password'].'</td>
			</tr>';
			$no_++;
		}
		header('Content-type: application/ms-excel');

    	header('Content-Disposition: attachment; filename=Daftar User VMS.xls');
		echo $admin;
	}

	public function showIzinUsaha($value='')
	{
		$query = $this->db->where('id_vendor',240)->where('del',0)->get('ms_ijin_usaha');
		print_r($query->result_array());
	}

	// public function login__(){


	// 	$this->load->model('main_model');
		
	// 	if($this->input->post('username')&&$this->input->post('password')){
	// 		$is_logged = $this->main_model->cek_login();

	// 		if($is_logged){

	// 			if($this->session->userdata('user')){
	// 				$data = $this->session->userdata('user');

	// 				$item['content'] 	= $this->load->view('redirect',$data,TRUE);
	// 				$this->load->view('template',$item);
	// 			}else if($this->session->userdata('admin')){
	// 				if($this->session->userdata('admin')['id_role']==6){
	// 					// header('Location:https://eproc.nusantararegas.com/eproc');
	// 					redirect(site_url('auction'));
	// 				}else{
	// 					redirect(site_url('admin'));
	// 				}
	// 			}
	// 		}else{
	// 			$this->session->set_flashdata('error_msg','Data tidak dikenal. Silahkan login kembali!');
	// 			redirect(site_url());
	// 		}
	// 	}else{

	// 		$this->session->set_flashdata('error_msg','Isi form dengan benar!');
	// 		redirect(site_url());
	// 	}
	// }
}
