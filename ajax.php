<?php

$params = $_GET;

$brand = $params['brand'];
$platform = $params['platform'];
$year = $params['year'];
$month = $params['month'];
$day = $params['day'];

$brandMapping = array('fun88' => 'daily_FUN88_Tim', 'tlc' => 'daily_TLC_Tim');

# array(16) { [0]=> string(1) "2" ["row_names"]=> string(1) "2" [1]=> string(10) "2018-03-02" ["date"]=> string(10) "2018-03-02" [2]=> string(3) "ios" ["device"]=> string(3) "ios" [3]=> string(1) "0" ["New Installations"]=> string(1) "0" [4]=> string(1) "0" ["Active Users of day"]=> string(1) "0" [5]=> string(4) "2018" ["year"]=> string(4) "2018" [6]=> string(2) "03" ["month"]=> string(2) "03" [7]=> string(2) "02" ["day"]=> string(2) "02" } 

# Initiate DB object
$mysqli = new mysqli("104.197.159.218", "Tim", "Tim@12345", "umeng");
#$query = $mysqli->query('show tables');s
#var_dump($query);
#while($table = mysqli_fetch_array($query)){
	#var_dump($table);
	#echo "<br>";
#}
# crash_Tim
# daily_FUN88_Tim


$query2 = $mysqli->query("SELECT * FROM daily_FUN88_Tim WHERE device = 'ios' AND year = '2019' AND month = '01' AND day = '07'");
//$result = mysqli_fetch_row($query2);
//$result = mysqli_fetch_assoc($query2);
//var_dump($result);

// while($row = mysqli_fetch_array($query2)){
// 	print_r($row);
// 	echo "<br>";
// } 

getDailyStatistics($brand, $year, $month, $day);


function getDailyStatistics($brand, $year, $month, $day) {
	$mysqli = new mysqli("104.197.159.218", "Tim", "Tim@12345", "umeng");
	$query = 'SELECT * FROM ' . $GLOBALS['brandMapping'][$brand] . ' WHERE year = "' . $year . '" AND month = "' . $month . '" AND day = "' . $day . '"';
	$raw_result = $mysqli->query($query);
	$result_list = array();
	while($row = mysqli_fetch_array($raw_result)) {
		array_push($result_list, $row);
	}
	echo json_encode($result_list);
}


?>