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
            <div class="col-md-3 mb-3 d-flex align-items-end">
                <button style="margin-right: 10px; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;" type="button" onclick="applyFilters()">Apply</button>
                <button style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;" type="button" onclick="clearFilters()">Clear All</button>
            </div>
        </div>
    </form>
</section>

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
            <tr id="trip-<?= htmlspecialchars($trip['trip_id'], ENT_QUOTES, 'UTF-8') ?>">
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
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editTrip(<?= htmlspecialchars($trip['trip_id'], ENT_QUOTES, 'UTF-8') ?>)">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteTrip(<?= htmlspecialchars($trip['trip_id'], ENT_QUOTES, 'UTF-8') ?>)">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<!-- Edit Trip Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Trip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTripForm">
                    <input type="hidden" id="trip-id" name="trip_id">
                    <div class="form-group">
                        <label for="trip-date" class="control-label mb-1">Date</label>
                        <input id="trip-date" name="trip_date" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="departure-time" class="control-label mb-1">Time</label>
                        <input id="departure-time" name="departure_time" type="time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="select-route">Route</label>
                        <select id="select-route" name="route" class="form-control" required>
                            <option value="">--Select Route--</option>
                            <?php foreach ($allRoutes as $route): ?>
                                <option value="<?= htmlspecialchars($route['route'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($route['route'], ENT_QUOTES, 'UTF-8') ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-bus">Bus</label>
                        <select id="select-bus" name="bus" class="form-control" required>
                            <option value="">--Select Bus--</option>
                            <?php foreach ($allBuses as $bus): ?>
                                <option value="<?= htmlspecialchars($bus['bus_id'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($bus['bus_name'], ENT_QUOTES, 'UTF-8') ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="control-label mb-1">Driver First Name</label>
                        <input id="first_name" name="first_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="control-label mb-1">Driver Last Name</label>
                        <input id="last_name" name="last_name" type="text" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    form, th, td {
        text-align: center;
    }
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery.scrolly.min.js"></script>
<script src="../assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        var row = `<tr id="trip-${trip.trip_id}">
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
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editTrip(${trip.trip_id})">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteTrip(${trip.trip_id})">
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

    function clearFilters() {
        $('#filter-date').val('');
        $('#filter-time').val('');
        $('#filter-route').val('');

        $.ajax({
            url: './admin-actions/filter_trips.php',
            type: 'POST',
            data: {},
            success: function(response) {
                var tableBody = $('#bus-schedule tbody');
                tableBody.empty();
                if (response.trips.length > 0) {
                    response.trips.forEach(function(trip) {
                        var row = `<tr id="trip-${trip.trip_id}">
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
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editTrip(${trip.trip_id})">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteTrip(${trip.trip_id})">
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
                        text: 'No trips found.'
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

    function editTrip(trip_id) {
        $.ajax({
            url: './admin-actions/filter_trips.php',
            type: 'POST',
            data: { trip_id: trip_id },
            success: function(response) {
                if (response.success) {
                    const trip = response.trip;
                    $('#trip-id').val(trip.trip_id);
                    $('#trip-date').val(trip.trip_date);
                    $('#departure-time').val(trip.departure_time);
                    $('#select-route').val(trip.route);
                    $('#select-bus').val(trip.bus_id);
                    $('#first_name').val(trip.first_name);
                    $('#last_name').val(trip.last_name);
                    $('#editModal').modal('show');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to fetch trip details.'
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

    $('#editTripForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: './admin-actions/edit_trip.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message
                    }).then(() => {
                        const trip = response.trip;
                        $('#trip-' + trip.trip_id).html(`
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
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editTrip(${trip.trip_id})">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteTrip(${trip.trip_id})">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        `);
                        $('#editModal').modal('hide');
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
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
    });

    function deleteTrip(trip_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: './admin-actions/delete_trip.php',
                    type: 'POST',
                    data: { trip_id: trip_id },
                    success: function(response) {
                        if (response.success) {
                            $('#trip-' + trip_id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
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
        });
    }
</script>
