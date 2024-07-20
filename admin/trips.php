<?php include 'styles.php'?>
<?php require '../config/connection.php';?>

<?php 
// Prepare a query --> QUERY FOR BUS
$getBuses = $connection->prepare("SELECT bus_id, bus_name, capacity FROM buses");
// Execute the query
$getBuses->execute();
// Fetch results
$busResults = $getBuses->get_result();
$allBuses = $busResults->fetch_all(MYSQLI_ASSOC);

// Prepare a query --> QUERY FOR USERS WHO ARE ASSIGNED role 2 FROM THE USERS TABLE AND ARE DRIVERS)
$getDrivers = $connection->prepare("SELECT first_name, last_name FROM users WHERE role = 2");
// Execute the query
$getDrivers->execute();
// Fetch results
$driverResults = $getDrivers->get_result();
$allDrivers = $driverResults->fetch_all(MYSQLI_ASSOC);

// Prepare a query --> QUERY FOR TRIPS
$getTrips = $connection->prepare("SELECT DISTINCT route FROM trips");
// Execute the query
$getTrips->execute();
// Fetch results
$tripResults = $getTrips->get_result();
$allTrips = $tripResults->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'?>
        <!-- HEADER DESKTOP-->
        <?php include 'side-menu.php'?>
        <!-- HEADER DESKTOP-->
        <?php include 'desktop-header.php'?>
        
        <!-- PAGE CONTENT-->
        <div class="page-container">
            <div class="main-content">
                <!-- Overview Section-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1" style="margin-left:35%;">Bus Schedule</h2>
                            <div class="popup">
                                <button class="au-btn au-btn-icon au-btn--blue" onclick="addDriver()" style="position: absolute; right: 5vw; top: -1vw;">
                                    <i class="zmdi zmdi-plus"></i>Add
                                </button>
                                <span class="bus-form-popup" id="busPopup">
                                    <div class="col-lg-6">
                                        <div class="card" style="width: 30vw;">
                                            <div class="card-body" style="width: 29vw;">
                                               <!-- Form HTML and JavaScript -->
                                                <form id="addTrip" action="./admin-actions/trips_action.php" method="POST">
                                                    <!-- Form Fields -->
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
                                                        <select id="select-route" name="route" class="form-control">
                                                            <option value="">--Select Route--</option>
                                                            <option value="Legon">Legon</option>
                                                            <option value="Madina">Madina</option>
                                                            <option value="Kwabenya">Kwabenya</option>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="select-bus">Bus</label>
                                                        <select id="select-bus" name="bus" class="form-control">
                                                            <option value="">--Select Bus--</option>
                                                            <?php foreach ($allBuses as $bus): ?>
                                                                <option value="<?= htmlspecialchars($bus['bus_id'], ENT_QUOTES, 'UTF-8') ?>" data-capacity="<?= htmlspecialchars($bus['capacity'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($bus['bus_name'], ENT_QUOTES, 'UTF-8') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bus-capacity" class="control-label mb-1">Bus Capacity</label>
                                                        <input id="bus-capacity" name="seats" type="text" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="select-driver">Driver Name</label>
                                                        <select id="select-driver" name="driver" class="form-control">
                                                            <option value="">--Select Driver--</option>
                                                            <?php foreach ($allDrivers as $driver): ?>
                                                                <option value="<?= htmlspecialchars($driver['first_name'] . ' ' . $driver['last_name'], ENT_QUOTES, 'UTF-8') ?>" data-first-name="<?= htmlspecialchars($driver['first_name'], ENT_QUOTES, 'UTF-8') ?>" data-last-name="<?= htmlspecialchars($driver['last_name'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($driver['first_name'] . ' ' . $driver['last_name'], ENT_QUOTES, 'UTF-8') ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <input type="hidden" name="first_name" id="first_name">
                                                        <input type="hidden" name="last_name" id="last_name">
                                                    </div>
                                                    <div>
                                                        <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                            DONE
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include 'trip.php'?>
            </div>
            <!-- FOOTER-->
            <?php include 'footer.php'?>
            <!-- END COPYRIGHT-->
        </div>
    </div>

    <!-- CSS for ADD form popup-->
    <style>
        th, td {
            align-content: center;
        }
        .popup .bus-form-popup {
            position: absolute;
            visibility: hidden;
        }
        .popup .show {
            visibility: visible;
            position: relative;
            margin-right: 0%;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
    </style>

    <script>
        function addDriver() {
            var popup = document.getElementById("busPopup");
            popup.classList.toggle("show");
        }
        // Update bus capacity when a bus is selected
        document.querySelector('select[name="bus"]').addEventListener('change', function() {
            var selectedBus = this.options[this.selectedIndex];
            var busCapacity = selectedBus.getAttribute('data-capacity');
            document.getElementById('bus-capacity').value = busCapacity;
        });

        // Update hidden input fields for first name and last name when driver is selected
        document.querySelector('select[name="driver"]').addEventListener('change', function() {
            var selectedDriver = this.options[this.selectedIndex];
            var firstName = selectedDriver.getAttribute('data-first-name');
            var lastName = selectedDriver.getAttribute('data-last-name');
            document.getElementById('first_name').value = firstName;
            document.getElementById('last_name').value = lastName;
        });
    </script>

    <!--Script-->
    <?php include 'scripts.php'?>
    <!-- Main JS-->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('addTrip').addEventListener('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            fetch('./admin-actions/trips_action.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Clear the form
                            document.getElementById('addTrip').reset();
                            // Close the popup
                            document.getElementById('busPopup').classList.remove('show');
                            // Optionally, refresh the trips table here
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'An unexpected error occurred. Please try again.'
                });
            });
        });
    </script>
</body>
<!-- end document-->
