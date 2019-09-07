<!DOCTYPE html>
<html lang="en">
<head>
	<title>ROBOT RESTAURANT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

	<script>
		$(document).ready(function () {

			$('#form_id').on('submit', function (e) {
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var name = $('#name').val();
                var mob = $('#mob').val();
                var quant = $('#quant').val();
                
                $.ajax({
                	type: "GET",
                	url: 'insert.php',
                	data: { name: name, mob: mob, quant: quant },
                	success: function (data) {
                		$("#msg").html(data);
                		$("#calert").fadeTo(1000, 500).slideUp(500, function(){
                			$("#calert").slideUp(500);
                		});
                	}
                });
            });

			$(".tab-alloc").click(function () {
				var min = $(this).attr('data-value1');
				var max = $(this).attr('data-value2');
				var tname = $(this).attr('data-value3');
				$("#myModal").modal();
				// ajax open
				$.ajax({
					type: "GET",
					url: 'process.php',
					data: { min: min, max: max },
					success: function (data) {
						$('#conthead').html(tname);
						$("#viewbody").html(data);
					}
				});
				// ajax close
			});
			return false;
		});
	</script>

	<!-- Modal -->
	<div class="modal fade" id="myModal" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title" id="conthead">Table Name</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body" id="viewbody">
					Loading...
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>
	<!-- ./Modal -->



	<div class="container-fluid">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs nav-justified">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home"><strong>Home</strong></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#allocate"><strong>Allocation</strong></a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane container active" id="home">
				<!-- home -->
				<br>
				<h3 class="bg-light p-2 text-center">Customer Entry</h3>
				<br>
				<form id="form_id">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" id="name" required>
					</div>
					<div class="form-group">
						<label for="mob">Mobile:</label>
						<input type="text" class="form-control" id="mob" required>
					</div>
					<div class="form-group">
						<label for="quant">No. of Members:</label>
						<select class="form-control" id="quant" required>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
						</select>
					</div>
					<br>
					<center>
						<button type="submit" class="btn mx-auto btn-success">Register</button>
					</center>
					<br>
				</form>
				<div id="msg" class="pt-4"></div>
				<!-- ./home -->
			</div>
			<div class="tab-pane container fade" id="allocate">
				<!-- allocate -->
				<br>
				<h3 class="bg-light p-2 text-center">Table Layout</h3>
				<br>
				<!-- table layout -->
				<div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 1">1</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block btn-block tab-alloc" data-value1="3" data-value2="5" data-value3="Table 14">14</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block btn-block tab-alloc" data-value1="6" data-value2="9" data-value3="Table 15">15</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 2">2</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block btn-block tab-alloc" data-value1="3" data-value2="5" data-value3="Table 13">13</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block btn-block tab-alloc" data-value1="6" data-value2="9" data-value3="Table 16">16</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">3</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">12</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">17</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">4</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">11</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">18</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">24</button>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">5</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">10</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">19</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">23</button>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">6</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">9</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">20</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">22</button>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">7</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">8</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block">21</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
				</div>
				<!-- ./table layout -->
				<!-- ./allocate -->
			</div>
		</div>

	</div>

</body>
</html>
