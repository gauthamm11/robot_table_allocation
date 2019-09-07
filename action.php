<?php
if (!isset($_GET['sno']) && !isset($_GET['action'])) {
	header("location: index.php");
}else{

    $sno = $_GET['sno'];
    $action = $_GET['action'];

    if($action == 0){
        // snooze
        echo '
        <div class="alert alert-warning" role="alert" id="snzalert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Customer is snoozed for sometime!
        </div>
        ';
    }elseif($action == 1){
        // accepted
        $dbq = new SQLite3('robot.db');

    $resultsq = $dbq->query('DELETE FROM customer_details WHERE sno = '.$sno.';');
    
    echo '
    <div class="alert alert-success" role="alert" id="snzalert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Customer is Alloted Successfully!
    </div>
    ';
   
}else{
    echo "qwerty";
}

}
?>