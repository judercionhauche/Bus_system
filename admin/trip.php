<?php require '../../config/connection.php';?>
<?php
// SQL query to fetch data
$sql = "SELECT date, time, route, bus, available_seats, driver FROM trips";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// Output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
				<td>" . $row["date"] . "</td>
				<td>" . $row["time"] . "</td>
				<td>" . $row["route"] . "</td>
				<td>" . $row["bus"] . "</td>
				<td>" . $row["available_seats"] . "</td>
				<td>" . $row["driver"] . "</td>
			  </tr>";
	}
} else {
	echo "<tr><td colspan='6'>No trips scheduled</td></tr>";
}
$conn->close();


?>
	

<!-- Filter Options -->
<section style="background-color:  #f8f8f8;
						margin:5%; margin-top: 10px;">
	<form id="filter-form" class="mb-4" >
		<div class="form-row" >
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
<!-- Bus Schedule Table -->
<section style="background-color:  #f8f8f8;
						margin:5%">
<table class="table table-bordered">
	<thead>
		<tr>
            <th>Date</th>
			<th>Time</th>
			<th> Bus </th>
			<th>Route</th>
			<th>Available Seats</th>
			<th>Driver</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		echo<td>" . $row["date"] . "</td>
			<td>" . $row["time"] . "</td>
			<td>" . $row["route"] . "</td>
			<td>" . $row["bus"] . "</td>
			<td>" . $row["available_seats"] . "</td>
			<td>" . $row["driver"] . "</td>
            
			<td>
                <div class="table-data-feature">
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" >
                        <i class="zmdi zmdi-edit" ></i>
                    </button>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                    
                </div>
            </td>
		</tr>
		<tr>
            <td></td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
            <td>
                <div class="table-data-feature">
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" >
                        <i class="zmdi zmdi-edit" ></i>
                    </button>
                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                    
                </div>
            </td>
		</tr>	
	</tbody>
</table>
</section>
				
<style>
    form, th, td{
	text-align: center;
}

</style>				
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
	
