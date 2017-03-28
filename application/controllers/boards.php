<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Boards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function users_edit()
	{
		$this->load->view('users_edit');
	}
	public function add_new()
	{
		$this->load->view('new');
	}
	public function dashboard()
	{	
		$this->load->model('board');
		$user_list = array('user_list'=>$this->board->get_all_users());
		$this->load->view('dashboard', $user_list);
	}
	public function dashboard_admin()
	{
		$this->load->model('board');
		$user_list = array('user_list'=>$this->board->get_all_users());
		$this->load->view('admin', $user_list);
	}
	public function user_edit_information()
	{
		$this->load->model('board');
		if($this->board->validate_user_information($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/users_edit');
		}
		else {
			$this->board->user_edit_information($this->session->userdata('user_id'), $this->input->post());
			$this->session->set_flashdata('success', 'User details updated ! Please Login !');
			redirect('/login');
		}
	}
	

	public function user_edit_password()
	{
		$this->load->model('board');
		if($this->board->validate_password($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/users_edit');
		}
		else 
		{
			$this->board->user_edit_password($this->session->userdata('user_id'), $this->input->post());
			$this->session->set_flashdata('success', 'Password updated! Please Login.');
			redirect('/login');
		}
	}
	public function user_edit_description()
	{
		$this->load->model('board');
		if($this->board->validate_description($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/users_edit');
		}
		else {
			$this->board->user_edit_description($this->session->userdata('user_id'), $this->input->post());
			$this->session->set_flashdata('success', 'User description was updated successfully!');
			redirect('/dashboard');
		}
	}
	public function show($id)
	{
		$this->load->model('board');
		$user = $this->board->get_user_by_id($id);
		$messages = array('messages'=> $this->board->get_messages($id));


		for($i=0; $i<count($messages['messages']); $i++)
		{
			$messages['messages'][$i]['comments'] = $this->board->get_comments($messages['messages'][$i]['id']);
		}

		$data = $user + $messages;
		$this->load->view('show', $data);
	}
	public function admin_edit($id)
	{
		$this->load->model('board');
		$user = $this->board->get_user_by_id($id);
		$this->session->set_userdata('user_info', $user);
		$this->load->view('admin_edit', $user);
	}
	public function remove($id)
	{
		$this->load->model('board');
		$this->board->remove($id);
		redirect('/admin');
	}
	public function admin_edit_information($id)
	{
		$this->load->model('board');
		$user = $this->board->get_user_by_id($id);

		if($this->board->validate_user_information($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/admin_edit/'.$id);
		}
		else 
		{
			$this->board->admin_edit_information($id, $this->input->post());
			redirect('/admin');
		}
	}
	public function admin_edit_password($id)
	{
		$this->load->model('board');
		$user = $this->board->get_user_by_id($id);
		$this->session->set_flashdata('errors', 'Admin cannot update the password');
		redirect('/admin_edit/'.$id);
	}
	public function post($id)
	{
		$this->load->model('board');
		$user = $this->board->get_user_by_id($id);

		if($this->board->validate_message($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/show/'.$id);
		}
		else 
		{
			$this->board->post($this->input->post());
			redirect('/show/'.$id);
		}
	}
	public function comment($id)
	{
		$this->load->model('board');
		$user=$this->board->get_user_by_id($id);

		if($this->board->validate_comment($this->input->post()) === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/show/'.$id);
		}
		else
		{
			$this->board->post_comment($this->input->post());
			redirect('/show/'.$id);
		}
	}
	public function destroy()
	{
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('/');
	}
}
//end of main controller













