<?php
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

	

<!-- Filter Options -->
<section style="background-color: #f8f8f8; margin: 5%; margin-top: 10px;">
    <form id="filter-form" class="mb-4">
        <div class="form-row">
            <!-- Date Filter-->
            <div class="col-md-4 mb-3">
                <label for="filter-date">Date</label>
                <select class="form-control" id="filter-date">
                    <option value="">Select Date</option>
                    <?php foreach ($allDates as $date): ?>
                        <option value="<?= htmlspecialchars($date['trip_date'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($date['trip_date'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Time Filter-->
            <div class="col-md-4 mb-3">
                <label for="filter-time">Time</label>
                <select class="form-control" id="filter-time">
                    <option value="">Select Time</option>
                    <?php foreach ($allTimes as $time): ?>
                        <option value="<?= htmlspecialchars($time['departure_time'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($time['departure_time'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Route Filter-->
            <div class="col-md-4 mb-3">
                <label for="filter-route">Route</label>
                <select class="form-control" id="filter-route">
                    <option value="">Select Route</option>
                    <?php foreach ($allRoutes as $route): ?>
                        <option value="<?= htmlspecialchars($route['route'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($route['route'], ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button style="margin-left: 89%; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;" type="button" onclick="applyFilters()">Apply</button>
        </div>
    </form>
</section>

<!-- Bus Schedule Table -->
<!-- Bus Schedule Table -->
<section style="background-color: #f8f8f8; margin: 5%">
    <table class="table table-bordered" id="bus-schedule">
        <thead>
            <tr>
                <th>Trip Number</th>
                <th>Bus</th>
                <th>Driver First Name</th>
                <th>Driver Last Name</th>
                <th>Trip Date</th>
                <th>Departure Time</th>
                <th>Route</th>
                <th>Available Seats</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allTrips as $trip): ?>
            <tr>
                <td><?= htmlspecialchars($trip['trip_id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['bus_name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['first_name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['last_name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['trip_date'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['departure_time'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['route'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($trip['available_seats'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<style>
    form, th, td {
        text-align: center;
    }
</style>

<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery.scrolly.min.js"></script>
<script src="../assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- Applying Filters -->
<!-- Applying Filters -->
<script>
    function applyFilters() {
        var date = document.getElementById('filter-date').value;
        var time = document.getElementById('filter-time').value;
        var route = document.getElementById('filter-route').value;

        $.ajax({
            url: './admin-actions/filter_trips.php',
            type: 'POST',
            data: {
                trip_date: date,
                departure_time: time,
                route: route
            },
            success: function(response) {
                var tableBody = $('#bus-schedule tbody');
                tableBody.empty();
                if (response.trips.length > 0) {
                    response.trips.forEach(function(trip) {
                        var row = `<tr>
                            <td>${trip.trip_id}</td>
                            <td>${trip.bus_name}</td>
                            <td>${trip.first_name}</td>
                            <td>${trip.last_name}</td>
                            <td>${trip.trip_date}</td>
                            <td>${trip.departure_time}</td>
                            <td>${trip.route}</td>
                            <td>${trip.available_seats}</td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>`;
                        tableBody.append(row);
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Results',
                        text: 'No trips found matching your criteria.'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred. Please try again.'
                });
            }
        });
    }
</script>

	
