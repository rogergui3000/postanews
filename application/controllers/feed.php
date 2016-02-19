<?php
/**
 * News Feed class.
 * 
 * @extends CI_Controller
 */

class Feed extends CI_Controller {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('xml');
        $this->load->helper('text');
		$this->load->helper(array('url'));
        $this->load->model('news_model');
    }
     
	/**
	 * index function.
	 * 
	 * @access public
	 * @generate xml file
	 */
	
    public function index()
    {	
	
        //load helper class
		$this->load->dbutil();
    	$this->load->helper('file');
    	   	
		$new_report ='<?xml version="1.0" encoding="utf-8"?>
					  	<rss version="2.0"
    				 	xmlns:dc="http://purl.org/dc/elements/1.1/"
    					xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    					xmlns:admin="http://webns.net/mvcb/"
    					xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    					xmlns:content="http://purl.org/rss/1.0/modules/content/">
    					<channel>
    						<title>This is an RSS feed from the PostaNews - Cameroon website. RSS feeds allow you to stay up to date with the latest news and features you want from PostaNews - Cameroon.
To subscribe to it, Cut and paste the URL of the RSS feed into your News Reader</title>
    						<link>http://localhost/postanews/feed</link>
    						<description>Update 10 last news </description>
    						<dc:language>en-en</dc:language>
    						<dc:creator>achillewanguedaniel0@yahoo.com</dc:creator>
    						<dc:rights>Copyright 2015</dc:rights>
    					<image> 
         					<url>http://localhost/postanews/asset/img/postanews_120x60.gif</url>  
         					<title>PosaNews - Cameroon</title>  
         					<link>http://localhost/postanews/rss_news_report.xml</link>  
         					<width>120</width>  
         					<height>60</height> 
    					</image> 
							<admin:generatorAgent rdf:resource="http://localhost/postanews/" />';
		// get the news object data
		$object= $this->news_model->get_news();
		$data =(array) $object;
		 
		foreach($data as $data){
			$title = character_limiter($data['text'], 500);
        	$new_report .= '
				<item>
          			<title>'.$data['title'].'</title>
					<description>'.$title.'</description>  
          			<link>http://localhost/postanews/news/'.$data['nid'].'</link>
          			<guid>http://localhost/postanews/news/</guid>
          			<pubDate>Create by '.$data['username'].' on the'.$data['news_created_at'].'</pubDate>
        		</item>';
			}
       $new_report .=' </channel></rss>';
		// gererate xml file
	   if(write_file('rss_news_report.xml',$new_report)){
		 	redirect('/rss_news_report.xml');
	   }
		 
    }
	

     
}