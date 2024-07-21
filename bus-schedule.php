<?php
require './config/connection.php';
// Fetch unique dates, times, and routes
$getUniqueDates = $connection->prepare("SELECT DISTINCT trip_date FROM trips");
$getUniqueDates->execute();
$dateResults = $getUniqueDates->get_result();
$allDates = $dateResults->fetch_all(MYSQLI_ASSOC);

$getUniqueTimes = $connection->prepare("SELECT DISTINCT departure_time FROM trips");
$getUniqueTimes->execute();
$timeResults = $getUniqueTimes->get_result();
$allTimes = $timeResults->fetch_all(MYSQLI_ASSOC);

$getUniqueRoutes = $connection->prepare("SELECT DISTINCT route FROM trips");
$getUniqueRoutes->execute();
$routeResults = $getUniqueRoutes->get_result();
$allRoutes = $routeResults->fetch_all(MYSQLI_ASSOC);

// Fetch all trips
$getTrips = $connection->prepare("SELECT 
        t.trip_id, 
        b.bus_name, 
        t.first_name, 
        t.last_name, 
        t.trip_date, 
        t.departure_time, 
        t.route, 
        b.capacity AS available_seats
    FROM 
        trips t
    JOIN 
        buses b ON t.bus_id = b.bus_id
");
$getTrips->execute();
$busTrips = $getTrips->get_result();
$allTrips = $busTrips->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE HTML>
<html>
	<head>
	  	<title>Mobility | Ashesi Ride Made Easy</title>
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
			include "header.php";
			include "menu.php";
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
            <div class="col-md-3 mb-3">
                <label for="filter-date">Date</label>
                <select class="form-control" id="filter-date">
                    <option value="">Select Date</option>
                    <?php foreach ($allDates as $date): ?>
                        <option value="<?= htmlspecialchars($date['trip_date'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($date['trip_date'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Time Filter-->
            <div class="col-md-3 mb-3">
                <label for="filter-time">Time</label>
                <select class="form-control" id="filter-time">
                    <option value="">Select Time</option>
                    <?php foreach ($allTimes as $time): ?>
                        <option value="<?= htmlspecialchars($time['departure_time'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($time['departure_time'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Route Filter-->
            <div class="col-md-3 mb-3">
                <label for="filter-route">Route</label>
                <select class="form-control" id="filter-route">
                    <option value="">Select Route</option>
                    <?php foreach ($allRoutes as $route): ?>
                        <option value="<?= htmlspecialchars($route['route'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($route['route'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
		<button style="margin-left: 89%" type="button"  onclick="applyFilters()">Apply</button>
        </div>
		
    </form>
</section>

<br> <br>

<!-- Bus Schedule Table -->
<section>
    <table class="table table-bordered">
        <thead>
            <tr>
				<th>Trip ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Bus</th>
                <th>Route</th>
                <th>Available Seats</th>
                <th>Driver</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allTrips as $trip): ?>
            <tr id="trip-<?= htmlspecialchars($trip['trip_id'], ENT_QUOTES, 'UTF-8') ?>">
                <td><?= htmlspecialchars($trip['trip_id'], ENT_QUOTES, 'UTF-8') ?></td>
				<td><?= htmlspecialchars($trip['trip_date'], ENT_QUOTES, 'UTF-8') ?></td>
				<td><?= htmlspecialchars($trip['departure_time'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['bus_name'], ENT_QUOTES, 'UTF-8') ?></td>
				<td><?= htmlspecialchars($trip['route'], ENT_QUOTES, 'UTF-8') ?></td>
				<td><?= htmlspecialchars($trip['available_seats'], ENT_QUOTES, 'UTF-8') ?></td>
				<td><?= htmlspecialchars($trip["first_name"] . ' ' . $trip["last_name"], ENT_QUOTES, 'UTF-8') ?></td>
				<td><button class="btn btn-success btn-sm">Book Ride</button></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

						

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
