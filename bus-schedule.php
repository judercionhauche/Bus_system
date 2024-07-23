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

$connection->close();
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
    <style>
        .custom-apply-button {
            background-color: white !important;
            color: green !important;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            margin-right: 10px; /* Add some space between buttons */
        }
        .custom-clear-button {
            background-color: white !important;
            color: red !important;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
        }
        .button-container .btn {
            margin-right: 10px; /* Add some space between buttons */
        }
        .button-container .btn:last-child {
            margin-right: 0; /* Remove margin from the last button to avoid extra space */
        }
    </style>
</head>
<body class="is-preload">
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

                <!-- Error Message -->
                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error_message'] ?>
                    </div>
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>

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
                            <div class="col-md-3 mb-3 align-self-end button-container">
                                <button type="button" class="custom-apply-button" onclick="applyFilters()">Apply</button>
                                <button type="button" class="custom-clear-button" onclick="clearFilters()">Clear</button>
                            </div>
                        </div>
                    </form>
                </section>

                <br> <br>

                <!-- Bus Schedule Table -->
                <section>
                    <table class="table table-bordered" id="bus-schedule">
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
                        <tbody id="bus-schedule-body">
                            <!-- Trip data will be dynamically inserted here -->
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        let allTrips = [];

        function fetchAllTrips() {
            fetch('fetch_trips.php')
                .then(response => response.json())
                .then(data => {
                    allTrips = data;
                    displayTrips(allTrips);
                });
        }

        function displayTrips(trips) {
            const tbody = document.getElementById('bus-schedule-body');
            tbody.innerHTML = '';
            trips.forEach(trip => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${trip.trip_id}</td>
                    <td>${trip.trip_date}</td>
                    <td>${trip.departure_time}</td>
                    <td>${trip.bus_name}</td>
                    <td>${trip.route}</td>
                    <td>${trip.available_seats}</td>
                    <td>${trip.first_name} ${trip.last_name}</td>
                    <td>
                        <form action="booking.php" method="POST">
                            <input type="hidden" name="trip_id" value="${trip.trip_id}">
                            <button type="submit" class="btn btn-success btn-sm">Book Ride</button>
                        </form>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        function applyFilters() {
            const date = document.getElementById('filter-date').value;
            const time = document.getElementById('filter-time').value;
            const route = document.getElementById('filter-route').value;

            const filteredTrips = allTrips.filter(trip => {
                return (!date || trip.trip_date === date) &&
                       (!time || trip.departure_time === time) &&
                       (!route || trip.route === route);
            });

            displayTrips(filteredTrips);
        }

        function clearFilters() {
            document.getElementById('filter-form').reset();
            displayTrips(allTrips);
        }

        document.addEventListener('DOMContentLoaded', fetchAllTrips);
    </script>
</body>
<?php include "footer.php";?>
</html>
