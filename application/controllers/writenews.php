<?php

class Writenews extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('news_model');
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{	
	
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			$this->load->view('header');
			$this->load->view('news/writenews', array('error' => ' '));
			$this->load->view('footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
	/**
	 * do_upload function.
	 * 
	 * @access public
	 * @param mixed $id
	 * @param mixed $tile
	 * @param mixed $file_name
	 * @return bool true on success, false on failure and redirec
	 */
	
	function do_upload()
	{	
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2024';
		$config['max_width']  = '2024';
		$config['max_height']  = '2768';
        

		$this->load->library('upload', $config);
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
    	$this->form_validation->set_rules('description', 'Description', 'trim|required');

		
	   if ( $this->form_validation->run() == FALSE)
    	{   
        	// failed validation
			$this->load->view('header');
			$this->load->view('news/writenews', array('error' => 'Ops, Title and  Description required '));
			$this->load->view('footer');

			// quit here
			return false;
    	}
		else if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
            $this->load->view('header');
			$this->load->view('news/writenews', $error);
			$this->load->view('footer');
		}
		
        else {
            $upload_data = $this->upload->data();
			$title = $this->input->post('title');
        	$description = $this->input->post('description');
			$uid = $_SESSION['user_id'];
            $pic=  $upload_data['file_name'];
            $sql = "INSERT INTO `news`(`title`,  `text`, `file_name`, `uid`) VALUES ('$title','$description','$pic', $uid) ";
            $query = $this->db->query($sql);
            redirect('dashboard');
        }
		
	}
}
?>