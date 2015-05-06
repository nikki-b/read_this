<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function new_user()
	{
		$user = $this->input->post();
		$this->form_validation->set_rules("name", "Name", "required|min_length[2]");
		$this->form_validation->set_rules("alias", "Alias", "required|min_length[2]");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirmPassword", "Password Confirmation", "required|matches[password]");
		if($this->form_validation->run()=== false){
			$this->session->set_flashdata("register_errors", validation_errors());
			redirect("/");
		}
		else{
			$result = $this->user->new_user($user);
			if ($result === true){
				$user_id = $this->db->insert_id();
				$this->session->set_userdata(array(
				"user" => $user_id,
				"logged_in" => "true"
				)
			);
			redirect("/dashboard");
			}
			else{
				$this->session->set_flashdata("register_errors", "Unable to register, please contact the website administrator.");
				redirect("/");
			}
		}
	}

	public function login_user()
	{
		$input = $this->input->post();
		$user_id = $this->user->get_user($input);
		if($user_id){
			$this->session->set_userdata(array(
				"user" => $user_id["id"],
				"logged_in" => "true"
				)
			);
			redirect("/dashboard");
		}
		else{
			$this->session->set_flashdata("login_errors", "Invalid email and/or password.");
				redirect("/");
		}
	}

	public function log_off(){
		$this->session->sess_destroy();
		redirect("/");
	}

	public function dashboard(){
		$userID = $this->session->userdata("user");
		$user = $this->user->get_user_all($userID);
		$reviews = $this->review->get_recent_reviews();
		$books = $this->review->get_books();
		$this->load->view("dashboard", array(
			"user" => $user,
			"books" => $books,
			"reviews" => $reviews
			)
		);
	}

	public function view_user($id){
		$profile = $this->user->get_user_all($id);
		$reviews = $this->review->get_user_recent_reviews($id);
		$count = count($reviews);
		$this->load->view("user", array(
			"profile" => $profile,
			"reviews" => $reviews,
			"count" => $count
			)
		);
	}
}

//end of users controller