<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Board extends CI_Model {
	//validation for editing user information
	public function validate_user_information($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', "Email", 'required|valid_email');
		$this->form_validation->set_rules('first_name', "First Name", 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', "Last Name", 'trim|required|alpha');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}
	//validation for changing user password
	public function validate_password($post)
	{
		$this->load->library('form_validation');
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
	//validation for editing description
	public function validate_description($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description', "Description", 'required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}
	//validation for post messages
	public function validate_message($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('message', "Messages", 'required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//validation for post comments
	public function validate_comment($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment', "Comments", 'required');
		if($this->form_validation->run()===FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	// query for getting all registered users 
	public function get_all_users()
	{
		return $this->db->query("SELECT id, email, CONCAT(first_name, ' ', last_name) AS name, created_at  FROM users")->result_array();
	}
	// query for getting a user by id
	public function get_user_by_id($user_id)
	{
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
	}
	// query for deleting a user by id
	public function remove($user_id)
	{
		$this->db->query("DELETE FROM users WHERE id = ?", $user_id);
	}
	// query for editing user information
	public function user_edit_information($id, $user)
	{		
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, updated_at = NOW() WHERE id = ?";
		$values = array($user['email'], $user['first_name'], $user['last_name'], $id);
		$this->db->query($query, $values);
	}
	// query for changing user password
	public function user_edit_password($id, $user)
	{
		$query = "UPDATE users SET password = ? WHERE id =?";
		$values = array($user['password'], $id);
		$this->db->query($query, $values);
	}
	// query for editing user description 
	public function user_edit_description($id, $user)
	{
		$query = "UPDATE users SET description = ? WHERE id =?";
		$values = array($user['description'], $id);
		$this->db->query($query, $values);
	}
	// query for editing user information by admin
	public function admin_edit_information($id, $user)
	{		
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, user_level = ?, updated_at = NOW() WHERE id = ?";
		$values = array($user['email'], $user['first_name'], $user['last_name'],$user['user_level'], $id);
		$this->db->query($query, $values);
	}
	// query for posting message
	public function post($message)
	{
		$query = "INSERT INTO messages (message, created_at, updated_at, user_id, owner_id) VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($message['message'], $this->session->userdata['logged_user']['id'], $message['owner_id']);
		$this->db->query($query, $values);
	}
	// query for getting all messages by user id
	public function get_messages($id)
	{
		$query = "SELECT CONCAT(users.first_name, ' ', users.last_name) AS name, messages.message, messages.created_at, messages.id FROM messages LEFT JOIN users ON messages.user_id = users.id WHERE messages.owner_id = ? ORDER BY messages.created_at DESC";
		return $this->db->query($query, $id)->result_array();
	}
	// query for posting comment
	public function post_comment($comment)
	{
		$query = "INSERT INTO comments (comment, created_at, updated_at, message_id, user_id) 
					VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($comment['comment'], $comment['message_id'], $this->session->userdata['logged_user']['id']);	
		$this->db->query($query, $values);				
	}
	// query for getting all comments by message id
	public function get_comments($message_id)
	{
		$query = "SELECT CONCAT(users.first_name, ' ', users.last_name) AS name, comments.comment, comments.created_at 
					FROM comments
					LEFT JOIN messages ON comments.message_id=messages.id
					LEFT JOIN users ON comments.user_id=users.id
					WHERE comments.message_id = ? ORDER BY comments.created_at ASC";
		return $this->db->query($query, $message_id)->result_array();
	}
}	

//end of main controller