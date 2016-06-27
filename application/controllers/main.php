<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function index()
	{
		$this->load->view('header_view');
		$this->load->view('main_view');		
		$this->load->view('tz_message_view');
		$this->load->view('footer_view');
	}

	function login($id)
	{
		$this->load->model('users_model');
		$data['users'] = $this->users_model->get_user($id);
		if(isset($data['users']))
		{
			$user_data = array(
				'username' => $data['users'][0]['name'],
				'userId' => $data['users'][0]['id'],
				'userTimeZone' => $data['users'][0]['time_zone'],
				'user_remind_changes' => $data['users'][0]['remind_changes'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata( $user_data );
		}	
		$this->index();
	}
	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}

	function users()
	{
		$this->load->model('users_model');
		$data['users'] = $this->users_model->get_users();
		$this->load->view('header_view');
		$this->load->view('users_view', $data);
		$this->load->view('footer_view');
	}

	function timezone()
	{		
		$user_id = $_GET['id'];
		$user_time_zone =  $_GET['time_zone'];
		$this->load->model('users_model');
		$data = $this->users_model->edit_user_timezone($user_id,$user_time_zone);

		print_r($data[0]['time_zone']);
	}
	function invert_remind_tz() 
	{	
		$user_id = $_GET['id'];
		$this->load->model('users_model');
		$data = $this->users_model->edit_user_remind_timezone($user_id);
	}
}