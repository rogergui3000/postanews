<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * News_model class.
 * 
 * @extends CI_Model
 */

class News_model extends CI_Model {
	
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	
	public function __construct()
	{
		
		$this->load->database();
		
	}
	
	/**
	 * get_news function.
	 * 
	 * @access public
	 * @param $slug
	 * @return obj
	 */
	public function get_news($slug = FALSE)
	{
		
		if ($slug === FALSE)
		{

			$query = "SELECT * FROM `news`, `users`    WHERE `news`.`uid` = `users`.`id`  ORDER BY `news_created_at` ASC LIMIT 10";
    		$result = $this->db->query($query);
			return $result->result_array();
		}
		
		$query = "SELECT * FROM `news`, `users` WHERE `nid` = ?      AND `news`.`uid` = `users`.`id` LIMIT 1";
    	$result = $this->db->query($query, array($slug));
		return $result->row_array();
		
	}
	
	/**
	 * get_mynews function.
	 * 
	 * @access public
	 * @param $id
	 * @return obj
	 */
	public function get_mynews($id)
	{
		
		$query = "SELECT * FROM `news` WHERE `uid` = ? ";
        return $result = $this->db->query($query, array($id));
	
	}
	
	/**
	 * deletenews function.
	 * 
	 * @access public
	 * @param $nid (news id) 
	 * @param $id  (user id)
	 * @return obj
	 */
	public function deletenews($nid, $id)
	{
		
		$query = "DELETE  FROM `news` WHERE `uid` =$id  AND `nid`=$nid LIMIT 1 ";
        return $result = $this->db->query($query);
		
	}
	

	/**
	 * Getnewspdf function.
	 * 
	 * @access public
	 * @return obj
	 */
	function Getnewspdf() {
		
     $query = "SELECT * FROM `news`, `users`   WHERE `news`.`uid` = `users`.`id`   ORDER BY `news_created_at` ASC LIMIT 10";
     $result = $this->db->query($query);

     if ($result) {
       return $result;
     } else {
       return false;
     }
		
   }  
    
   	/**
	 * fetch_new function.
	 * 
	 * @access public
	 * @param $news_id
	 * @return obj
	 */
   function fetch_new($news_id) {
	   
     $query = "SELECT * FROM `news`, `users`   WHERE `news`.`uid` = `users`.`id`   AND `nid`=$news_id  limit 1";
     $result = $this->db->query($query);
     return $result ;
	   
   }
	
   function getFeed($limit = NULL)
   {
        return $this->db->get('news', $limit);
   }
	
	
}

/*
end model

*/
