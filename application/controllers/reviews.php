<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('review');
	}

	public function index()
	{
		echo "Welcome to CodeIgniter. The default Controller is Main.php";
	}

	public function home(){
		$reviews=$this->review->get_reviews();
		$booklist=$this->review->get_book_list();
		$this->load->view('nav');
		$this->load->view('home',array('reviews'=>$reviews,'books'=>$booklist));

	}


	public function direct_show_book($id){
		$reviews=$this->review->get_reviews_for_book($id);
		$this->load->view('nav');
		$this->load->view('review',array('reviews'=>$reviews));
	}

	public function delete_review($id){
		$this->review->delete_review($id);
		redirect('books');
	}



	public function direct_new_review(){	//add author and review
		$authors=$this->review->get_authors();
		$this->load->view('nav');
		$this->load->view('new_review',array('authors'=>$authors));
	}

	public function add_review(){
		// $post=$this->input->post(NULL,TRUE);
		foreach ($this->input->post() as $key => $value) {
			$post[$key]=htmlspecialchars($this->input->post($key,TRUE));
		}
		// var_dump($this->input->post());
		if(isset($post['add_author'])&&$post['add_author']!==""){
			$post['author_id']=$this->review->add_author($post['add_author']);
		}
		//check for title in DB, if exists, assign its id to book_id else, add book to db and return its id
		$book_exists=$this->review->get_book_id($post['title'],$post['author_id']);

		if($book_exists){
			$post['book_id']=$book_exists['id'];
		}
		else{
			$post['book_id']=$this->review->add_book($post);
		}

		$post['user_id']=$this->session->userdata('user_id');
		$this->review->add_review($post);
		redirect("/books/{$post['book_id']}");

	}



}

//end of main controller
