<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function quiz($urlid = NULL)
	{
		$this->load->view('header');
		$this->load->view('quiz');
		$this->load->view('footer');
	}

	public function submitData($json) {
		$obj = json_decode($json);

		$name = $obj->name;
		$email = $obj->email;
		$urlid = $obj->urlid;

		$dataObj = new dataToScore($obj->answers);
		$eScore = $dataObj->eScore;
		$mScore = $dataObj->mScore;

		// Send survey data to database
		InsertSurvey($urlid, $mScore, $eScore, $name, $email);

		// Ask server for number of users in urlid
		$numSurveys = getUserCount($urlid);

		// If there's 9 surveys, create the alignment chart!
		if ($numSurveys == 9) {
			createChart($urlid);
		}
		
	}

	private function createChart($urlid) {

		// Get all surveys with corresponding urlid

		

	}

	public function getChart($json) {
		$obj = json_decode($json);

		$urlid = $obj->urlid;

		// Get urlid from table in database

	}

}
?>