<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}	

	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function create()
	{
		$this->load->model('user');

		if($this->user->validate_reg($this->input->post()) === FALSE)
		{
			//$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('errors', 'Ooops! Error. Try again ');
			redirect('/register');
		}
		else 
		{
			$this->user->create($this->input->post());
			$this->session->set_flashdata('success', 'Success! Please Log In');
			redirect('/login');
		}
	}
	public function loginProcess()
	{
		$this->load->model('user');
		if($this->user->validate_login($this->input->post())===FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		
		$user = $this->user->find_user($this->input->post());
		$this->session->set_userdata('logged_user', $user);

		if($user)
		{
			$this->session->set_flashdata('homepage', "you made it!");
			if($user['user_level'] === 'Normal')
			{
				$this->session->set_userdata('user_id', $user['id']);

				redirect('/dashboard');
			}
			
			if($user['user_level'] === 'Admin')
			{
				$this->session->set_userdata('user_id', $user['id']);
				redirect('/admin');
			}
		}

		$this->session->set_flashdata('errors', 'Ooops! Error.  Try again');
		redirect('/login');	
	}
}

//end of main controller