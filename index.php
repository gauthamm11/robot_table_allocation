<!DOCTYPE html>
<html lang="en">
<head>
	<title>ROBOT RESTAURANT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bs_css.css">
	<script src="jquery.js"></script>
	<script src="popper.js"></script>
	<script src="bs_js.js"></script>
	<script src="fasm.js"></script>
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
                		$('#name').val('');
                		$('#mob').val('');
                		$('#quant').val('');
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
						$('#conthead').html("<i class='fas fa-chair'></i>&nbsp;" + tname);
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
		<div class="modal-dialog modal-xl">
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
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close&nbsp;<i class='fas fa-window-close'></i></button>
				</div>

			</div>
		</div>
	</div>
	<!-- ./Modal -->



	<div class="container-fluid">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs nav-justified">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home"><strong>Home</strong>&nbsp;<i class='fas fa-home'></i></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#allocate"><strong>Allocation</strong>&nbsp;<i class='fas fa-chair'></i></a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane container active" id="home">
				<!-- home -->
				<br>
				<h3 class="bg-light p-2 text-center">Customer Entry&nbsp;<i class='fas fa-users'></i></h3>
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
							<option value="" disabled selected>Select a number</option>
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
						</select>
					</div>
					<br>
					<center>
						<button type="submit" class="btn mx-auto btn-success">Register&nbsp;<i class='fas fa-check-circle'></i></button>
					</center>
					<br>
				</form>
				<div id="msg" class="pt-4"></div>
				<!-- ./home -->
			</div>
			<div class="tab-pane container fade" id="allocate">
				<!-- allocate -->
				<br>
				<h3 class="bg-light p-2 text-center">Table Layout&nbsp;<i class='fas fa-chair'></i></h3>
				<br>
				<!-- table layout -->
				<div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 1"><i class='fas fa-chair'></i>&nbsp;1</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 16"><i class='fas fa-chair'></i>&nbsp;16</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 17"><i class='fas fa-chair'></i>&nbsp;17</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 2"><i class='fas fa-chair'></i>&nbsp;2</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 15"><i class='fas fa-chair'></i>&nbsp;15</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 18"><i class='fas fa-chair'></i>&nbsp;18</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 3"><i class='fas fa-chair'></i>&nbsp;3</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 14"><i class='fas fa-chair'></i>&nbsp;14</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 19"><i class='fas fa-chair'></i>&nbsp;19</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 4"><i class='fas fa-chair'></i>&nbsp;4</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 12"><i class='fas fa-chair'></i>&nbsp;12</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 20"><i class='fas fa-chair'></i>&nbsp;20</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 5"><i class='fas fa-chair'></i>&nbsp;5</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 11"><i class='fas fa-chair'></i>&nbsp;11</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 21"><i class='fas fa-chair'></i>&nbsp;21</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="7" data-value2="12" data-value3="Table 27"><i class='fas fa-chair'></i>&nbsp;27</button>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 6"><i class='fas fa-chair'></i>&nbsp;6</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 10"><i class='fas fa-chair'></i>&nbsp;10</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 22"><i class='fas fa-chair'></i>&nbsp;22</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="7" data-value2="12" data-value3="Table 26"><i class='fas fa-chair'></i>&nbsp;26</button>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 7"><i class='fas fa-chair'></i>&nbsp;7</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="3" data-value2="4" data-value3="Table 9"><i class='fas fa-chair'></i>&nbsp;9</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 23"><i class='fas fa-chair'></i>&nbsp;23</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="13" data-value2="16" data-value3="Table 25"><i class='fas fa-chair'></i>&nbsp;25</button>
						</div>
					</div>
					<div class="row p-2">
						<div class="col-lg-3 col-md-3 col-sm-3 col-3"></div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="5" data-value2="6" data-value3="Table 8"><i class='fas fa-chair'></i>&nbsp;8</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-3">
							<button type="button" class="btn btn-info btn-block tab-alloc" data-value1="1" data-value2="2" data-value3="Table 24"><i class='fas fa-chair'></i>&nbsp;24</button>
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
