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
		$surveys = getSurveys($urlid);
		
		$ethics = array_fill(0, $surveys.length(), 0);
		$morality = array_fill(0, $surveys.length(), 0);
		$id = array_fill(0, $surveys.length(), 0);
		for ($i = 0; $i < $surveys.length(); $i++) {
			$ethics[$i] = $surveys[$i]->ethics;
			$morality[$i] = $surveys[$i]->morality;
			$id[$i] = $surveys[$i]->id;
		}

		$align = ScoreToAlignment($ethics, $morality, $id);
		$best = $align->go();

		$reassigned = array_fill(0, $surveys.length(), 0);
		for ($i = 0; $i < $best.length(); $i++) {
			for ($j = 0; $j < $surveys.length(); $j++) {
				if ($best[$i] == $surveys[$j]) {
					$reassigned[$i] = $surveys[$j];
					break;
				}
			}
		}

		fillChart($urlid,
			$reassigned[2],
			$reassigned[5],
			$reassigned[8],
			$reassigned[1],
			$reassigned[4],
			$reassigned[7],
			$reassigned[0],
			$reassigned[3],
			$reassigned[6]
		);

	}

	public function getChart($json) {
		$obj = json_decode($json);

		$urlid = $obj->urlid;

		// Get urlid from table in database

	}

}
?>