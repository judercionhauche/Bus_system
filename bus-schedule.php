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

                    <!-- Filter Options -->
                    <section>
                        <form id="filter-form" class="mb-4">
                            <div class="form-row">
                                <!-- Date Filter-->
                                <div class="col-md-4 mb-3">
                                    <label for="filter-date">Date</label>
                                    <select class="form-control" id="filter-date">
                                        <option value="">Select Date</option>
                                    </select>
                                </div>

                                <!-- Time Filter-->
                                <div class="col-md-4 mb-3">
                                    <label for="filter-time">Time</label>
                                    <select class="form-control" id="filter-time">
                                        <option value="">Select Time</option>
                                    </select>
                                </div>

                                <!-- Route-->
                                <div class="col-md-4 mb-3">
                                    <label for="filter-route">Route</label>
                                    <select class="form-control" id="filter-route">
                                        <option value="">Select Route</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3 d-flex justify-content-end">
                                    <button style="margin-right: 10px; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;" type="button" onclick="applyFilters()">Apply</button>
                                    <button style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;" type="button" onclick="clearFilters()">Clear All</button>
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
                            <tbody>
                                <!-- Data will be populated here by JavaScript -->
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- Applying Filters-->
        <script>
            function fetchTrips(callback) {
                $.ajax({
                    url: 'fetch_trips.php',
                    type: 'GET',
                    success: function(response) {
                        callback(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            function populateTable(trips) {
                var tableBody = $('#bus-schedule tbody');
                tableBody.empty();
                trips.forEach(function(trip) {
                    var row = `<tr>
                        <td>${trip.trip_id}</td>
                        <td>${trip.trip_date}</td>
                        <td>${trip.departure_time}</td>
                        <td>${trip.bus_name}</td>
                        <td>${trip.route}</td>
                        <td>${trip.available_seats}</td>
                        <td>${trip.driver}</td>
                        <td><button class="btn btn-success btn-sm">Book Ride</button></td>
                    </tr>`;
                    tableBody.append(row);
                });
            }

            function populateFilters(dates, times, routes) {
                var dateSelect = $('#filter-date');
                var timeSelect = $('#filter-time');
                var routeSelect = $('#filter-route');

                dates.forEach(function(date) {
                    dateSelect.append(new Option(date.trip_date, date.trip_date));
                });

                times.forEach(function(time) {
                    timeSelect.append(new Option(time.departure_time, time.departure_time));
                });

                routes.forEach(function(route) {
                    routeSelect.append(new Option(route.route, route.route));
                });
            }

            function applyFilters() {
                var date = $('#filter-date').val();
                var time = $('#filter-time').val();
                var route = $('#filter-route').val();

                fetchTrips(function(data) {
                    var filteredTrips = data.trips.filter(function(trip) {
                        return (!date || trip.trip_date === date) &&
                               (!time || trip.departure_time === time) &&
                               (!route || trip.route === route);
                    });
                    if (filteredTrips.length > 0) {
                        populateTable(filteredTrips);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'No Results',
                            text: 'No trips found matching your criteria.'
                        });
                    }
                });
            }

            function clearFilters() {
                $('#filter-date').val('');
                $('#filter-time').val('');
                $('#filter-route').val('');

                fetchTrips(function(data) {
                    populateTable(data.trips);
                });
            }

            // Initial load
            $(document).ready(function() {
                fetchTrips(function(data) {
                    populateFilters(data.dates, data.times, data.routes);
                    populateTable(data.trips); // Load all trips initially
                });
            });
        </script>
    </body>
</html>
