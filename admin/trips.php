<!-- Title Page-->
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

// Prepare a query --> QUERY FOR DRIVER
$getDrivers = $connection->prepare("SELECT driver_name FROM drivers");
// Execute the query
$getDrivers->execute();
// Fetch results
$driverResults = $getDrivers->get_result();
$allDrivers = $driverResults->fetch_all(MYSQLI_ASSOC);

// Prepare a query --> QUERY FOR TRIPS
$getTrips = $connection->prepare("SELECT trip_date, departure_time, route FROM trips");
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
							<h2 class="title-1" style="margin-left:   35%;">Bus Schedule</h2>

							<div class="popup">
								<button class="au-btn au-btn-icon au-btn--blue" onclick="addDriver()" 
									style="position: absolute; right: 5vw; top: -1vw;">
									<i class="zmdi zmdi-plus" ></i>Add
								</button>
								
								<span class="bus-form-popup" id="busPopup">
									<div class="col-lg-6";>
										<div class="card" style="width: 30vw";>
											
											<div class="card-body" style="width: 29vw;">
												
												<form id="addTrip" action="./admin-actions/trips_action.php" method="POST" >
													<div class="form-group" >
														<label for="trip-date" class="control-label mb-1">Date</label>
														<input id="date" id="trip-date" name="trip-date" type="date" class="form-control" required>
													</div>
													
													<div class="form-group">
                                                        <label for="departure-time" class="control-label mb-1">Time</label>
                                                        <input type="time" id="departure-time" name="departure_time" class="form-control" required>
                                                    </div>

													<div class="form-group" >
														<label for="select-route">Route</label>
														<select class="form-control" name="route">
															<option value="">--Select Route--</option>
															<?php foreach ($allTrips as $trip): ?>
                                                                <option value="<?= $trip['route'] ?>"><?= $trip['route'] ?></option>
                                                            <?php endforeach; ?>
														</select>
													</div>

													<div class="form-group" >
														<label for="select-bus">Bus</label>
														<select class="form-control" name="bus">
															<option value="">--Select Bus--</option>
                                                            <?php foreach ($allBuses as $bus): ?>
                                                            <option value="<?= $bus['bus_id'] ?>" data-capacity="<?= $bus['capacity'] ?>"><?= $bus['bus_name'] ?></option>
                                                            <?php endforeach; ?>

														</select>
													</div>

                                                    <div class="form-group">
                                                        <label for="bus-capacity" class="control-label mb-1">Bus Capacity</label>
                                                        <input id="bus-capacity" name="seats" type="text" class="form-control" readonly>
                                                    </div>

													<div class="form-group" >
														<label for="select-bus">Driver</label>
														<select class="form-control" name="driver">
															<option value="">--Select Driver--</option>
                                                            <?php foreach ($allDrivers as $driver): ?>
                                                                <option value="<?= $driver['driver_name'] ?>"><?= $driver['driver_name'] ?></option>
                                                            <?php endforeach; ?>
														</select>
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
		
		th, td{
		align-content: center;}
        

        .popup .bus-form-popup{
            position: absolute;
            visibility: hidden;
        }                                    



        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
        visibility: visible;
        position: relative;
        margin-right: 0%;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
        }

        @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
        }

            
    </style>

    <script>
        // When the user clicks on div, open the popup
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
    </script>

   <!--Script-->
   <?php include 'scripts.php'?>

    <!-- Main JS-->
    <script src="../assets/js/main.js"></script>

    
    <!-- CSS for ADD form popup-->
    <style>
    
        
        .popup .bus-form-popup{
            position: absolute;
            visibility: hidden;
        }                                    



        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
        visibility: visible;
        position: relative;
        margin-right: 0%;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
        }

        @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
        }

            
    </style>

    <script>
        // When the user clicks on div, open the popup
        function addBus() {
        var popup = document.getElementById("busPopup");
        popup.classList.toggle("show");
        }
    </script>

</body>

<!-- end document-->