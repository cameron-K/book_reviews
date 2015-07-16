<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends CI_Model{

	function add_author($name){
		$query="INSERT INTO authors (name)
				VALUES (?)";
		$this->db->query($query,array($name));
		return $this->db->insert_id();
	}

	function add_book($book){
		$query="INSERT INTO books (title,author_id,created_at)
				VALUES (?,?,NOW())";
		$this->db->query($query,array($book['title'],$book['author_id']));
		return $this->db->insert_id();
	}

	function get_book_id($title,$author){
		$query="SELECT id FROM books
				WHERE title=? AND author_id=?";
		return $this->db->query($query,array($title,$author))->row_array();
	}

	function get_book_list(){
		$query="SELECT *,books.id AS book_id FROM reviews
				LEFT JOIN books
				ON reviews.book_id=books.id
				LEFT JOIN authors
				ON books.author_id=authors.id
				GROUP BY books.id";
		return $this->db->query($query)->result_array();
	}

	function add_review($review){
		$query="INSERT INTO reviews (review,rating,user_id,book_id,created_at)
				VALUES (?,?,?,?,NOW())";
		return $this->db->query($query,array($review['review'],$review['rating'],$review['user_id'],$review['book_id']));
	}

	function get_reviews_for_book($id){
		$query="SELECT *, authors.name AS author_name, reviews.id AS review_id FROM reviews
				LEFT JOIN books
				ON reviews.book_id=books.id
				LEFT JOIN authors
				ON books.author_id=authors.id
				LEFT JOIN users
				ON reviews.user_id=users.id
				WHERE reviews.book_id=?
				GROUP BY reviews.id";

		return $this->db->query($query,array($id))->result_array();
	}

	function get_reviews(){
		$query="SELECT *, authors.name AS author_name,reviews.created_at AS review_created_at,reviews.id AS review_id FROM reviews
				LEFT JOIN books
				ON reviews.book_id=books.id
				LEFT JOIN authors
				ON books.author_id=authors.id
				LEFT JOIN users
				ON reviews.user_id=users.id
				ORDER BY reviews.id DESC";

		return $this->db->query($query)->result_array();
	}
	function get_authors(){
		$query="SELECT * FROM authors";
		return $this->db->query($query)->result_array();
	}

	function delete_review($id){
		$query="DELETE FROM reviews
				WHERE id=?";
		return $this->db->query($query,array($id));
	}

}