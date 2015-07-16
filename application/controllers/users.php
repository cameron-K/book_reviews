<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		//destroy session
		$this->session->unset_userdata();
		$this->load->view('welcome');
	}

	public function register(){
		$this->load->library('form_validation');
		// $post=$this->input->post(NULL,TRUE);
		foreach ($this->input->post() as $key => $value) {
			$post[$key]=htmlspecialchars($this->input->post($key,TRUE));
		}
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('alias','Alias','required|is_unique[users.alias]');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|min_length[8]');
		$this->form_validation->set_rules('cpassword','Confirm PW','required|matches[password]');

		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('errors[0]',form_error('name'));
			$this->session->set_flashdata('errors[1]',form_error('alias'));
			$this->session->set_flashdata('errors[2]',form_error('email'));
			$this->session->set_flashdata('errors[3]',form_error('password'));
			$this->session->set_flashdata('errors[4]',form_error('cpassword'));
			redirect('');
		}

		else{
			$this->user->register($post);
			redirect('');
		}
	}

	public function login(){
		foreach ($this->input->post() as $key => $value) {
			$post[$key]=htmlspecialchars($this->input->post($key,TRUE));
		}
		$user=$this->user->check_password($post['email']);
		if(isset($user['password'])&&$user['password']===$post['password']){
			$this->session->set_userdata('user_id',$user['id']);
			$this->session->set_userdata('alias',$user['alias']);
			redirect('/books');
		}
		else{
			$this->session->set_flashdata('errors[5]','Incorrect email and/or password');
			redirect('');
		}
	}

	public function show_user($id){	//show user info
		$user=$this->user->get_user($id);
		$reviews=$this->user->get_user_reviews($id);
		$this->load->view('nav');
		$this->load->view('user',array('user'=>$user,'reviews'=>$reviews));
	}
}

//end of main controller
