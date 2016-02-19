<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * News class.
 * 
 * @extends CI_Controller
 */

class News extends CI_Controller {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News archive';
		
		//pass data and load view
		$this->load->view('header');
		$this->load->view('news/index', $data);
		$this->load->view('footer');
	}

	public function view($slug)
	{
		$data['news_item'] = $this->news_model->get_news($slug);

		if (empty($data['news_item']))
		{
			show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this->load->view('header');
		$this->load->view('news/view', $data);
		$this->load->view('footer');
	}
	
	
	public function mynews()
	{   
		$id = $_SESSION['user_id'];
	
		$data['query'] = $this->news_model->get_mynews($id);


		$this->load->view('header');
		$this->load->view('news/mynews', $data);
		$this->load->view('footer');
	}
	
	public function deletenews($nid)
	{   
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
		$id = $_SESSION['user_id'];
	
		$this->news_model->deletenews($nid, $id);

		$data['query'] = $this->news_model->get_mynews($id);

			redirect('/dashboard');
		}
		

		
	}
	
	
	
	
}