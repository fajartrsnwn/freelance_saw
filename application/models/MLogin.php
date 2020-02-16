<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MLogin extends CI_model {
	var $table = 'PENGGUNA';
	
	public function get_by_username($username)
	{
		$users = $this->db->get_where($this->table,array('USERNAME' => $username))->result_array();
		return $users;
	}

	public function login($data) {
		$username_input = $data['username'];
		$password_input = $data['password'];
		$check_username = $this->db->get_where('PENGGUNA',array('USERNAME' => $username_input))->first_row();
		if($check_username){
			$password_db = $check_username->PASSWORD;
			if(password_verify($password_input,$password_db)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

		public function login_backoffice($data) {

		$condition = "USERNAME =" . "'" . $data['user_username'] . "' AND " . "PASSWORD =" . "'" . $data['user_password'] . "'";
		$this->db->select('*');
		$this->db->from('PENGGUNA');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function read_user_information($username) {

		$condition = "USERNAME =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('PENGGUNA');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}