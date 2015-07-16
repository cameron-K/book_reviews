<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{

	function register($user){
		$query="INSERT INTO users (name,alias,email,password,created_at)
				VALUES (?,?,?,?,NOW())";
		return $this->db->query($query,array($user['name'],$user['alias'],$user['email'],$user['password']));
	}

	function check_password($email){
		// var_dump($email);
		$query="SELECT * FROM users
				WHERE email=?";
		return $this->db->query($query,array($email))->row_array();
	}

	function get_user($id){
		$query="SELECT * FROM users
				WHERE id=?";
		return $this->db->query($query,array($id))->row_array();
	}

	function get_user_reviews($id){
		$query="SELECT * FROM reviews
				LEFT JOIN books
				ON reviews.book_id=books.id
				WHERE user_id=?";
		return $this->db->query($query,array($id))->result_array();
	}

}