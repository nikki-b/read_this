<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function add_new()
	{
		// ADDING NEW BOOK AND REVIEW
		if($this->input->post("action") === "new_book"){
			// CHECKING THE FORM
			$this->form_validation->set_rules("title", "Title", "required");
			$this->form_validation->set_rules("review", "Review", "required");
			$this->form_validation->set_message("greater_than", "Please choose a rating.");
			$this->form_validation->set_rules("rating", "Rating", "required|greater_than[0]");
			if($this->form_validation->run() === false){
				$this->session->set_flashdata("book_errors", validation_errors());
				redirect("/reviews/add_new");
			}
			else{
				$input = $this->input->post();
				$userID = $this->session->userdata("user");
				// ADDING WITH NEW AUTHOR
				if(strlen($input["old_author"]) === 0 && strlen($input["new_author"]) !== 0){
					$bookID = $this->review->newbook_newauthor($input,$userID);
				}
				// ADDING WITH EXISTING AUTHOR
				else if(strlen($input["old_author"]) !== 0 && strlen($input["new_author"]) === 0){
					$bookID = $this->review->newbook_oldauthor($input,$userID);
				}
				// IF TWO AUTHOR FIELDS POSTED
				else if(strlen($input["old_author"]) !== 0 && strlen($input["new_author"]) !== 0){
					$this->session->set_flashdata("author_errors", "Please choose either an existing author OR enter a new author's name.");
					redirect("/reviews/add_new");
				}
				// IF NO AUTHOR FIELDS POSTED
				else{
					$this->session->set_flashdata("author_errors", "Please add an author.");
					redirect("/reviews/add_new");
				}
				// IF BOOK IS ADDED, GO TO BOOK PAGE WITH THE ID
				if($bookID){
					$book = $this->review->get_book($bookID);
					$reviews = $this->review->get_reviews_by_book($bookID);
					$this->load->view("book", array(
						"book" => $book,
						"reviews" => $reviews
						)
					);
				}
			}
		}
		// ADDING REVIEW FROM THE BOOK PAGE
		else if ($this->input->post("action") === "new_review"){
			$userID = $this->session->userdata("user");
			$input = $this->input->post();
			$this->review->new_review($input["book_id"],$input["review"],$input["rating"],$userID);
			$book = $this->review->get_book($input["book_id"]);
			$reviews = $this->review->get_reviews_by_book($input["book_id"]);
			$this->load->view("book", array(
				"book" => $book,
				"reviews" => $reviews
				)
			);
		}
		else{ // just viewing add book/review page
			$authors = $this->review->get_authors();
			$this->load->view("add", array(
				"authors" => $authors
				)
			);
		}
	}

	public function view_book($id){
		$book = $this->review->get_book($id);
		$reviews = $this->review->get_reviews_by_book($id);
		$this->load->view("book", array(
			"book" => $book,
			"reviews" => $reviews
			)
		);
	}

	public function delete_review(){
		$input = $this->input->post();
		$this->review->delete_review($input);
		$book = $this->review->get_book($input["bookID"]);
		$reviews = $this->review->get_reviews_by_book($input["bookID"]);
		$this->load->view("book", array(
			"book" => $book,
			"reviews" => $reviews
			)
		);
	}
}

//end of reviews controller