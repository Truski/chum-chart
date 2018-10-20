<?php
class Chum_Model extends CI_Model{
	public $query;

	/*
		Insert a Survery (id, chartid, morality, ethics, name, email)
		If chartid not found in Charts:
		Insert a Chart(chartid, 1, null, null, ...)
	*/
	public function insertSurvey($id, $chartID, $morality, $ethics, $name, $email){
		$this->query = $this->db->query('SELECT * FROM Chart WHERE chartid=chartID');
		if(empty($query)){
			$this->db->query('INSERT into Charts (chartid, usrcount, lg, ln, lc, ng, tn, ne, cg, cn, ce) VALUES (chartID, 1, null, null, null, null null, null, null, null');
		}
		//Insert Survey (jpg id not explicitly stated ?)
		$this->db->query('INSERT into Survey (chartid, morality, ethics, name, email) VALUES (morality, ethics, name, email)');
	}

	/*
		Get a row from Chart table representing a completed alignment
		Returns an object representing a row
	*/
	public function getChart(chartID){
		return $this->db->query('SELECT * FROM Chart WHERE chartid=chartID');
	}

	/*
		
	*/
	public function getUserCount(chartID){
		return $this->db->query('SELECT usrcount FROM Chart WHERE chartid=chartID');
	}

}
