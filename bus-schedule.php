<!DOCTYPE HTML>
<html>
	<head>
	  	<title>ASHESI BUS SYSTEM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload" >
		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Header and Menu-->
			<?php 
			include "header.html";
			include "menu.html";
			?>
	
			<!-- Main -->
			<div id="main">
				<div class="inner">
					<h1>Bus Schedule</h1>

					<!-- Filter Options -->
					<section>
						<form id="filter-form" class="mb-4">
							<div class="form-row">
								<!-- Date Filter-->
								<div class="col-md-4 mb-3">
									<label for="filter-date">Date</label>
									<input type="date" class="form-control" id="filter-date">
								</div>
							
								<!-- Time Filter-->
								<div class="col-md-4 mb-3">
									<label for="filter-time">Time</label>
									<input type="time" class="form-control" id="filter-time">
								</div>

								<!-- Route-->
								<div class="col-md-4 mb-3">
									<label for="filter-route">Route</label>
									<select class="form-control" id="filter-route">
										<option value="">Select Route</option>
										<option value="Route A">Route A</option>
										<option value="Route B">Route B</option>
										<option value="Route C">Route C</option>
									</select>
								</div>
							</div>
							<button style="margin-left: 89%" type="button"  onclick="applyFilters()">Apply</button>
						</form>
                	</section>
					<br> <br>


					<!-- Bus Schedule Table -->
					<section>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Time</th>
									<th> Bus </th>
									<th>Route</th>
									<th>Available Seats</th>
									<th>Driver</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
								<tr>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>	
							</tbody>
						</table>
					</section>
				</div>
			</div>
				
			<!-- Footer -->
			<?php include 'footer.html'?>
		</div>
						

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
			
			<!-- Applying Filters-->
			<script>
				function applyFilters() {
					var date = document.getElementById('filter-date').value;
					var time = document.getElementById('filter-time').value;
					var route = document.getElementById('filter-route').value;

					var table = document.getElementById('bus-schedule');
					var rows = table.getElementsByTagName('tr');
					for (var i = 0; i < rows.length; i++) {
						var cells = rows[i].getElementsByTagName('td');
						var showRow = true;

						if (date && cells[0].textContent.indexOf(date) === -1) {
							showRow = false;
						}
						if (time && cells[0].textContent.indexOf(time) === -1) {
							showRow = false;
						}
						if (route && cells[1].textContent.indexOf(route) === -1) {
							showRow = false;
						}

						rows[i].style.display = showRow ? '' : 'none';
					}
				}
		</script>
	</body>
</html>
