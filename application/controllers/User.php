<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

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
		$this->load->helper('security');
		$this->load->model('user_model');
		$this->load->model('news_model');
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/register/register', $data);
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			// Genete the token
			$token = $this->uniqid_base36(true);
				
			
			if ($this->user_model->create_user($username, $email, $password, $token)) {
				$this->load->library('PHPMailer/PHPMailer_sent.php');
				$sendmail    = new PHPMailer_sent();
				$sendmail->PHPmailer_send_confirmation_link($email, $username, $token);
				
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/register/register_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
	
	/**
	 * savePass function.
	 * 
	 * @access public
	 * @return void
	 */
	public function savepass($token) {
		$data1 = new stdClass();
		$data = $this->user_model->get_userBytoken($token);
		if($data){
				$info = (array) $data;
				$user_id = $this->user_model->get_user_id_from_username($data->username);
				$user    = $this->user_model->get_user($data->id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
			
				redirect('/processpass');
		} else {
			
				// user link failed, this should never happen just 

				// redirect him to site root
			redirect('/');
				
			}
		
	}
	
	/**
	 * processPass function.
	 * 
	 * @access public
	 * @return void
	 */
	public function processpass() {
	
		$user_id = $_SESSION['user_id'];
		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		// set validation rules
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/account/processpass', $data);
			$this->load->view('footer');
			
		} else {
			
		// set variables from the form
			$password = $this->input->post('password');
			// Genete the token
			$token = $this->uniqid_base36(true);
				
			
			if ($this->user_model->create_userPass( $password, $user_id)) {
				// user creation ok
				$this->load->view('header');
				$this->load->view('user/login/login_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/account/processpass', $data);
				$this->load->view('footer');
				
		   }
		
		}
		
	}
	
	
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('header');
			$this->load->view('user/login/login');
			$this->load->view('footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
				$this->load->view('header');
				$this->load->view('user/login/login_success', $data);
				$this->load->view('footer');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/login/login', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
	
	/**
	 * account function.
	 * 
	 * @access public
	 * @return void
	 */
	public function account() {
		
		
		//$data = $this->user_model->get_user( $_SESSION['user_id']);
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			// create the data object
			$user    = $this->user_model->get_user($_SESSION['user_id']);
			$data['user'] = $user;
			
			// user ok
			$this->load->view('header');
			$this->load->view('user/account/index', $data);
			$this->load->view('footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
	
	// Generate unique token
	public function uniqid_base36($more_entropy=false) {
    	$s = uniqid('', $more_entropy);
    	if (!$more_entropy)
        	return base_convert($s, 16, 36);
        
    	$hex = substr($s, 0, 13);
    	$dec = $s[13] . substr($s, 15); // skip the dot
    	return base_convert($hex, 16, 36) . base_convert($dec, 10, 36);

	}
	
	
}
