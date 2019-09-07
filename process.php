<?php
if (!isset($_GET['min']) && !isset($_GET['max'])) {
	header("location: index.php");
}else{
	$min = $_GET['min'];
    $max = $_GET['max'];
    
	$db = new SQLite3('robot.db');

	$results = $db->query('SELECT * FROM `customer_details` WHERE c_count BETWEEN '.$min.' and '.$max.' ORDER BY entry_time ASC;');
	while ($row = $results->fetchArray()) {
    //var_dump($row);
		echo $row['c_name']."<br>";
	}

}

?>