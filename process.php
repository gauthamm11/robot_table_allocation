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
    //echo $row['c_name']."<br>";
		
		echo '
		<div class="card">
		<div class="card-body">
		<div class="row">
		<div class="col">'.$row['c_name'].'<br>'.$row['c_mobile'].'</div>
		<div class="col">
		<div class="clearfix">
		<span class="float-left"><button type="button" class="btn btn-warning">Snooze</button></span>
		<span class="float-right"><button type="button" class="btn btn-success">Accept</button></span>
		</div>
		</div>
		</div>
		</div>
		</div>
		';


	}
}

?>