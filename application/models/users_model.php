<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	function get_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}

	function get_user($id)
	{	
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	function edit_user_timezone($id,$timezone){
		$data = array('time_zone' => $timezone);		
		$this->db->where('id',$id);
		$this->db->update('users',$data);

		$this->db->select('time_zone');
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	function edit_user_remind_timezone($id){
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		$user = $query->result_array();
		if($user[0]['remind_changes'] == '1')
		{
			$data = array('remind_changes' => '0');
		}
		else
		{
			$data = array('remind_changes' => '1');
		}
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}
}