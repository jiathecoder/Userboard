<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	//validation for registration
	public function validate_reg($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', "Email", 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('first_name', "First Name", 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', "Last Name", 'trim|required|alpha');
		$this->form_validation->set_rules('password', "Password", 'trim|required|min_length[6]|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', "Confirm Password", 'trim|required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//validation for login
	public function validate_login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', "Email", 'required|valid_email');
		$this->form_validation->set_rules('password', "Password", 'trim|required|md5');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//query for adding a new user to the database.
	public function create($userinfo)
	{	
		$query = "INSERT INTO users (email, first_name, last_name, password, user_level, created_at, updated_at) VALUES (?, ?, ?, ?, 'Normal', NOW(), NOW())";
		$this->db->query($query, $userinfo);
	}
	//query for getting information of logged-in user.
	public function find_user($userinfo)
	{
		$query = "SELECT * FROM users WHERE email=? AND password =?";
		$values= array($userinfo['email'], $userinfo['password']);
		return $this->db->query($query, $values)->row_array();
	}
}