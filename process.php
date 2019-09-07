<?php
if (!isset($_GET['min']) && !isset($_GET['max'])) {
	header("location: index.php");
}else{
	?>

	<script>
		$(document).ready(function () {
			$(".atn").click(function () {
				var sno = $(this).attr('data-value1');
				var action = $(this).attr('data-value2');
     //   $("#myModal").modal();
     $("#actext").html("<span>Loading...</span>");
     // ajax open
     $.ajax({
     	type: "GET",
     	url: 'action.php',
     	data: { sno: sno, action: action },
     	success: function (data) {
     		$("#actext").html(data);
     		$("#snzalert").fadeTo(2000, 500).slideUp(500, function(){
     			$("#snzalert").slideUp(500);
     			$('#myModal').modal('hide');
     		});
     	}
     });
     	// ajax close
     });
			return false;
		});
	</script>

	<?php
	$min = $_GET['min'];
	$max = $_GET['max'];
	
	$db = new SQLite3('robot.db');

	$results = $db->query('SELECT * FROM `customer_details` WHERE c_count BETWEEN '.$min.' and '.$max.' ORDER BY entry_time ASC;');

	echo "<div id='actext'></div>";

	while ($row = $results->fetchArray()) {
    //var_dump($row);
    //echo $row['c_name']."<br>";
		
		echo '
		<div class="card">
		<div class="card-body">
		<div class="row">
		<div class="col"><strong>'.$row['c_name'].'</strong><br>'.$row['c_mobile'].'</div>
		<div class="col">
		<div class="clearfix">
		<span class="float-left"><button type="button" class="btn btn-warning atn" data-value1="'.$row['sno'].'" data-value2="0">Snooze</button></span>
		<span class="float-right"><button type="button" class="btn btn-success atn" data-value1="'.$row['sno'].'" data-value2="1">Accept</button></span>
		</div>
		</div>
		</div>
		</div>
		</div>
		';
	}
}

?>