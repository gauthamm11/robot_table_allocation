<?php
if (!isset($_GET['name']) && !isset($_GET['mob']) && !isset($_GET['quant'])) {
	header("location: index.php");
}else{

    $name = $_GET['name'];
    $mob = $_GET['mob'];
    $quant = $_GET['quant'];
	
    $dbi = new SQLite3('robot.db');

    $resultsi = $dbi->query('INSERT INTO customer_details (c_name,c_mobile,c_count,entry_time) VALUES ("'.$name.'","'.$mob.'","'.$quant.'",datetime("now","localtime"))');

    echo '
    <div class="alert alert-success" role="alert" id="calert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <i class="fas fa-bell"></i>&nbsp;Customer is Registered Successfully!
    </div>
    ';

}
?>