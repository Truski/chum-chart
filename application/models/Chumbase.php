<?php
class Chumbase extends CI_Model {
	public $query;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/*
		Insert a Quiz (id, chartid, morality, ethics, name, 
		If chartid not found in Charts:
		Insert a Chart(chartid, 1, null, null, ...)
	*/
	public function insertQuiz($urlid, $chartID, $morality, $ethics, $name){
		$query = "SELECT MAX(id) as max FROM user;";
		$userid = $this->db->query($query)->result()[0]->max + 1;
		if($urlid == -1){
			// Create a new chart
			$urlid = rand(10000, 99999);
			$this->db->query('INSERT INTO chart (urlid, creator, usrcount) VALUES (?, ?, 1)', array($urlid, $userid));
			$chartid = $this->db->query('SELECT MAX(id) as max FROM chart')[0]->max + 1;
			$this->db->query('INSERT INTO user (chartid, morality, ethics, name', array($chartid, $morality, $ethics, $name));
			return $urlid;
		} else {
			// Just add it to the existing
			$chartid = $this->db->query('SELECT id FROM chart WHERE urlid=?', array($urlid))->result()[0]->id;
			$this->db->query('INSERT INTO user (chartid, morality, ethics, name) VALUES (?, ?, ?, ?, ?)', array($chartID, $morality, $ethics, $name));
			return $urlid;
		}
	}

	/*
		Get a row from Chart table representing a completed alignment
		Returns an object representing a row
	*/
	public function getChart($chartID){
		return $this->db->query('SELECT * FROM Chart WHERE chartid=?', array($chardID));
	}

	/*
		
	*/
	public function getUserCount($chartID){
		return $this->db->query('SELECT usrcount FROM Chart WHERE chartid=?', array($chardID));
	}
	/*
		getSurveys
		returns array of objects where each object is a row in Survey table
	*/
	public function getSurveys($chartID){
		return $this->db->query('SELECT * FROM Survey WHERE charid = ?', array($chartID));
	}

	/*
	 * yikes
	 */
	public function fillChart($chartID, $lg, $ln, $lc, $ng, $tn, $ne, $cg, $cn, $ce){
		$this->db->query('UPDATE Chart SET lg=?, ln=?, lc=?, ng=?, tn=?, ne=?, cg=?, cn=?, ce=?, WHERE chartid=?', array($lg, $ln, $lc, $ng, $tn, $ne, $cg, $cn, $ce, $chartID));  
	}	

}
