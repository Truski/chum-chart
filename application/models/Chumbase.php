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
	public function insertQuiz($urlid, $morality, $ethics, $name, $url){
		$query = "SELECT MAX(id) as max FROM user;";
		$userid = $this->db->query($query)->result()[0]->max + 1;
		if($urlid == NULL){
			// Create a new chart
			$urlid = rand(10000, 99999);
			$this->db->query('INSERT INTO chart (urlid, creator, usrcount) VALUES (?, ?, 1)', array($urlid, $userid));
			$chartid = $this->db->query('SELECT MAX(id) as max FROM chart')->result()[0]->max;
			$this->db->query('INSERT INTO user (chartid, morality, ethics, name, photourl) VALUES (?, ?, ?, ?, ?)', array($chartid, $morality, $ethics, $name, $url));
			return $urlid;
		} else {
			// Just add it to the existing
			$chartid = $this->db->query('SELECT id FROM chart WHERE urlid=?', array($urlid))->result()[0]->id;
			$this->db->query('INSERT INTO user (chartid, morality, ethics, name, photourl) VALUES (?, ?, ?, ?, ?)', array($chartid, $morality, $ethics, $name, $url));
			$this->db->query('UPDATE chart SET usrcount=usrcount+1 WHERE urlid=?', array($urlid));
			return $urlid;
		}
	}

	/*
		Get a row from Chart table representing a completed alignment
		Returns an object representing a row
	*/
	public function getChart($chartID){
		return $this->db->query('SELECT * FROM chart WHERE urlid=?', array($chartID))->result()[0];
	}

	public function exists($urlid){
		return $this->db->query('SELECT COUNT(*) as count FROM chart WHERE urlid=?', array($urlid))->result()[0]->count > 0;
	}

	/*
		
	*/
	public function getUserCount($urlid){
		return $this->db->query('SELECT usrcount FROM chart WHERE urlid=?', array($urlid))->result()[0]->usrcount;
	}
	/*
		getSurveys
		returns array of objects where each object is a row in Survey table
	*/
	public function getSurveys($chartID){
		return $this->db->query('SELECT user.id as id, name, ethics, morality, photourl FROM user INNER JOIN chart ON user.chartid = chart.id WHERE urlid = ?', array($chartID))->result();
	}

	/*
	 * yikes
	 */
	public function fillChart($chartID, $lg, $ln, $lc, $ng, $tn, $ne, $cg, $cn, $ce){
		$this->db->query('UPDATE chart SET lg=?, ln=?, lc=?, ng=?, tn=?, ne=?, cg=?, cn=?, ce=? WHERE urlid=?', array($lg, $ln, $lc, $ng, $tn, $ne, $cg, $cn, $ce, $chartID));
	}

}
