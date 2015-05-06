<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function new_user($user){
		$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
		$values = array($user["name"], $user["alias"], $user["email"], $user["password"]);
		return $this->db->query($query,$values);

	}

	public function get_user($input){
		$query = "SELECT id FROM users WHERE email = ? AND password = ?";
		$values = array($input["email"], $input["password"]);
		return $this->db->query($query,$values)->row_array();
	}

	public function get_user_all($id){
		$query = "SELECT * FROM users WHERE id = ?";
		$values = $id;
		return $this->db->query($query,$values)->row_array();
	}

}

//end of user model