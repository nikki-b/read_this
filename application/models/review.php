<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends CI_Model {

	public function get_authors(){
		$query = "SELECT * from authors";
		return $this->db->query($query)->result_array();
	}

	public function get_books(){
		$query = "SELECT * from books";
		return $this->db->query($query)->result_array();
	}

	public function get_book($id){
		$query = "SELECT books.id, books.title, books.author_id, authors.name  from books JOIN authors ON books.author_id = authors.id WHERE books.id = ?";
		$values = $id;
		return $this->db->query($query,$values)->row_array();
	}

	public function newbook_newauthor($input,$userID){
		// ADD NEW AUTHOR INFO
		$query = "INSERT INTO authors (name, created_at, updated_at) VALUES (?,NOW(),NOW())";
		$values = $input["new_author"];
		$this->db->query($query,$values);
		// GRAB NEW AUTHOR'S ID
		$author_id = $this->db->insert_id();
		// ADD NEW BOOK TO DB WITH AUTHOR ID
		$query = "INSERT INTO books (title, author_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
		$values = array($input["title"],$author_id);
		$this->db->query($query,$values);
		// GRAB NEW BOOK'S ID
		$book_id = $this->db->insert_id();
		// ADD REVIEW AND RATING TO DB
		$query = "INSERT INTO reviews (content, rating, book_id, user_id, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($input["review"], $input["rating"], $book_id, $userID);
		$this->db->query($query,$values);
		return $book_id;
	}

	public function newbook_oldauthor($input,$userID){
		// ADD NEW BOOK TO DB WITH AUTHOR ID
		$query = "INSERT INTO books (title, author_id, created_at, updated_at) VALUES (?,?,NOW(),NOW())";
		$values = array($input["title"],$input["old_author"]);
		$this->db->query($query,$values);
		// GRAB NEW BOOK'S ID
		$book_id = $this->db->insert_id();
		// ADD REVIEW AND RATING TO DB
		$query = "INSERT INTO reviews (content, rating, book_id, user_id, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($input["review"], $input["rating"], $book_id, $userID);
		$this->db->query($query,$values);
		return $book_id;
	}

	public function new_review($bookID,$content,$rating,$userID){
		$query = "INSERT INTO reviews (book_id, content, rating, user_id, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($bookID, $content, $rating, $userID);
		return $this->db->query($query,$values);
	}

	public function get_recent_reviews(){
		$query = "SELECT reviews.content, reviews.rating, reviews.user_id, reviews.created_at, reviews.book_id, books.title, users.alias FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON users.id = reviews.user_id ORDER BY reviews.created_at DESC LIMIT 3";
		return $this->db->query($query)->result_array();
	}

	public function get_user_recent_reviews($id){
		$query = "SELECT reviews.book_id, books.title, users.alias FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON users.id = reviews.user_id WHERE reviews.user_id = ?";
		$values = $id;
		return $this->db->query($query, $values)->result_array();
	}

	public function get_reviews_by_book($id){
		$query = "SELECT reviews.id AS review_id, reviews.book_id, reviews.content, reviews.rating, reviews.created_at, users.alias, users.id FROM reviews JOIN books ON books.id = reviews.book_id JOIN users ON users.id = reviews.user_id WHERE reviews.book_id = ?";
		$values = $id;
		return $this->db->query($query, $values)->result_array();
	}

	public function delete_review($input){
		$query = "DELETE FROM reviews WHERE id = ?";
		$values = $input["bookID"];
		$this->db->query($query,$values);
	}
}

//end of review model