<?php
if (!isset($_GET['min']) && !isset($_GET['max'])) {
    header("location: index.php");
}else{
    $min = $_GET['min'];
    $max = $_GET['max'];
    
}

?>