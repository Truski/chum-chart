<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('chumbase');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function quiz($urlid = NULL)
	{
		$data = array();
		$data['hasURL'] = ($urlid != NULL);
		if($urlid != NULL){
			$data['urlid'] = $urlid;
		}
		$this->load->view('header');
		$this->load->view('quiz', $data);
		$this->load->view('footer');
	}

	private function createChart($urlid) {

		// Get all surveys with corresponding urlid
		$surveys = $this->chumbase->getSurveys($urlid);
		
		$ethics = array_fill(0, count($surveys), 0);
		$morality = array_fill(0, count($surveys), 0);
		$id = array_fill(0, count($surveys), 0);
		for ($i = 0; $i < count($surveys); $i++) {
			$ethics[$i] = $surveys[$i]->ethics;
			$morality[$i] = $surveys[$i]->morality;
			$id[$i] = $surveys[$i]->id;
		}

		$align = new ScoreToAlignment($ethics, $morality, $id);
		$best = $align->go();
		$reassigned = array_fill(0, count($surveys), 0);
		for ($i = 0; $i < count($best); $i++) {
			for ($j = 0; $j < count($surveys); $j++) {
				if ($best[$i]->id == $surveys[$j]->id) {
					$reassigned[$i] = $surveys[$j];
					break;
				}
			}
		}

		$this->chumbase->fillChart($urlid,
			$reassigned[2]->id,
			$reassigned[5]->id,
			$reassigned[8]->id,
			$reassigned[1]->id,
			$reassigned[4]->id,
			$reassigned[7]->id,
			$reassigned[0]->id,
			$reassigned[3]->id,
			$reassigned[6]->id
		);

	}

	public function submitData() {
		$json = $this->input->post("data");
		$obj = json_decode($json);

		$name = $obj->name;
		$urlid = $obj->urlid;

		$dataObj = new dataToScore($obj->answers);
		$eScore = $dataObj->eScore;
		$mScore = $dataObj->mScore;

		// Send survey data to database
		$urlid = $this->chumbase->insertQuiz($urlid, $mScore, $eScore, $name);

		// Ask server for number of users in urlid
		$numSurveys = $this->chumbase->getUserCount($urlid);

		// If there's 9 surveys, create the alignment chart!
		if ($numSurveys == 9) {
			$this->createChart($urlid);
		}
		$result = new stdclass;
		$result->remaining = 9 - $numSurveys;
		echo json_encode($result);
	}

	public function getChart($urlid) {
		// Call model function
		$all = getChart($urlid);

		//get 9 categories and associating user id
		$data = array();
		//get associated surveys for chartid
		$people = getSurveys($all->id); 
		//this is an array of objects where each object is (id, name, ethics, morality)

		//get name for each person lol
		public $lgName; public $lnName; public $lcName; public $ngName;
		public $tnName; public $neName; public $cgName; public $cnName; public $ceName;
		//loop through people, if person id matches lg, ln, lc etc ---> assign name 
		for each ($people as $person){
			switch($person->id){
				case $all->lg:
					$lgName = $person->name;
					break;
				case $all->ln:
					$lnName = $person->name;
					break;
				case $all->lc:
					$lcName = $person->name;
					break;
				case $all->ng:
					$ngName = $person->name;
					break;
				case $all->tn:
					$tnName = $person->name;
					break;
				case $all->ne:	
					$neName = $person->name;
					break;
				case $all->cg:
					$cgName = $person->name;
					break;
				case $all->cn:
					$cnName = $person->name;
					break;
				case $all->ce:
					$ceName = $person->name;
					break;

			}
		}
		$data['lg'] = array($all->lg, $lgName);
		$data['ln'] = array($all->ln, $lnName);
		$data['lc'] = array($all->lc, $lcName);
		$data['ng'] = array($all->ng, $ngName);
		$data['tn'] = array($all->tn, $tnName);
		$data['ne'] = array($all->ne, $neName);
		$data['cg'] = array($all->cg, $cgName);
		$data['cn'] = array($all->cn, $cnName);
		$data['ce'] = array($all->ce, $ceName);
		$this->load->view('chart', $data);	
	}
}
?>
