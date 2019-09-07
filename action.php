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
    }else{
        // accepted


    }


}
?>