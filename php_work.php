<?php


class UmengDatabaseConnector {

	public $brandMapping = array('fun88' => 'daily_FUN88_Tim', 'tlc' => 'daily_TLC_Tim', 'crash' => 'crash_Tim');
	public $connec = null;
	public $year = "2019";
	public $month = "";
	public $day = "";

	function __construct(){

		$this->connec = new mysqli("104.197.159.218", "Tim", "Tim@12345", "umeng");
		
	}

	function query($params) {

		$params = $_GET;

		$brand = $params['brand'];
		$platform = $params['platform'];
		$interval = $params['interval'];
		$year = $params['year'];
		$month = $params['month'];
		$day = $params['day'];

		// Do better mapping later
		if($interval == 'daily') {
			$this->getDailyStatistics($brand, $year, $month, $day);
		} else {
			$this->getMonthlyStatistics($brand, $year, $month);
		}
	}

	function getDailyCrashNumbers() {
		$q = 'SELECT * FROM crash_Tim';
		$raw_result = $this->connec->query($q);
		while($row = $raw_result->fetch_assoc()) {
			print_r($row);
			echo '<br/>';
			//array_push($result_list, $row);
		}
	}

	function getDailyStatistics($brand, $year, $month, $day) {
		$q = 'SELECT * FROM ' . $this->brandMapping[$brand] . ' WHERE year = "' . $year . '" AND month = "' . $month . '" AND day = "' . $day . '"';
		$raw_result = $this->connec->query($q);
		$result_list = array();
		while($row = mysqli_fetch_array($raw_result)) {
			array_push($result_list, $row);
		}
		echo json_encode($result_list);
	}

	function getMonthlyStatistics($brand, $year, $month) {
		$q = 'SELECT * FROM ' . $this->brandMapping[$brand] . ' WHERE year = "' . $year . '" AND month = "' . $month . '"';
		$raw_result = $this->connec->query($q);
		$result_list = array();
		while($row = mysqli_fetch_array($raw_result)) {
			array_push($result_list, $row);
		}
		echo json_encode($result_list);
	}
}

$connec = new UmengDatabaseConnector();
$connec->getDailyCrashNumbers();



?>