<?php
/***
	display News in PDF FORMAT
*/
class Newspdf extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->helper('url');

		$this->load->model('news_model');
	}
     
   
	function index() 
	{	
		$this->loadpdf();
	}
	
	/**
	 * loadpdf function.
	 * 
	 * @access public
	 * @ouput pdf
	 */
	
	function loadpdf()
    {	
		///get data
        $data = $this->news_model->Getnewspdf();
        $url= base_url();
        $this->load->library('mpdf/mpdf');
        $newsdata;
    	foreach($data->result() as $data) {
			$newsdata .="<h1 style='color:red'>PostaNews</h1><h2>$data->title</h2><img height=10 src='$url/img/$data->file_name' width=300 height=300 align=left/><p></br></br> $data->text</br></br></br></br>  </p><i>. Create  by $data->username  on $data->news_created_at</i>";
    	}
    
		$html = "<html><head><style>body {font-family: sans-serif;    font-size: 11pt;position:absolute;}img {    float: left;    margin: 0 0px 0px 0;}h1{ text-transforme:uppercase}p i{
    text-align: justify;    text-indent: 0.2em;}</style></head><body><h1><img height=50 src='$url/img/default.png'/></h1><br>$newsdata</body></html>";
		// Load mPDF library
		$mpdf=new mPDF();
		$mpdf->WriteHTML($html);
		$mpdf->SetDisplayMode('fullpage');
		// Display pdf
		$mpdf->Output();
 
    }
	
	/**
	 * view function.
	 * 
	 * @access public
	 * @param $id
	 * @return pdf file
	 */
	function view($id)
    {
		
 		///dowload particular article by $id
        $data = $this->news_model->fetch_new($id);
        $url= base_url();
        $this->load->library('mpdf/mpdf');
        $newsdata;
    	foreach($data->result() as $data) {
			$newsdata .="<h1 style='color:red'>PostaNews</h1><h2>$data->title</h2><img height=10 src='$url/img/$data->file_name' width=300 height=300 align=left/><p></br></br> $data->text</br></br></br></br>  </p><i>. Create  by $data->username  on $data->news_created_at</i>";
    	}
    
		$html = "<html><head><style>body {font-family: sans-serif;    font-size: 11pt;position:absolute;}img {    float: left;    margin: 0 0px 0px 0;}h1{ text-transforme:uppercase}p i{
    text-align: justify;    text-indent: 0.2em;}</style></head><body><h1><img height=50 src='$url/img/default.png'/></h1><br>$newsdata</body></html>";

		$mpdf=new mPDF();
		$mpdf->WriteHTML($html);
		$mpdf->SetDisplayMode('fullpage');
		
		$mpdf->Output();
    }

	
}



?>