<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard class.
 * 
 * @extends CI_Controller
 */
class Dashboard extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('news_model');
	}
	
	
	public function index() {
		
		
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			$id = $_SESSION['user_id'];
	
			$data['query'] = $this->news_model->get_mynews($id);


			$this->load->view('header');
			$this->load->view('news/mynews', $data);
			$this->load->view('footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
}

