<!-- Title Page-->
<?php include 'styles.php'?>
<?php require '../config/connection.php';?>

<?php 
// Prepare a query --> QUERY FOR BUS
$getBuses = $connection->prepare("SELECT bus_name, capacity FROM buses");
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
$getTrips = $connection->prepare("SELECT departure_time, route FROM trips");
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
												
												<form id="addTrip" action="./admin-actions/trip_action.php" method="POST" >
													<div class="form-group" >
														<label for="cc-payment" class="control-label mb-1">Date</label>
														<input id="cc-pament" name="date" type="date" class="form-control">
													</div>
													
													<div class="form-group">
														<label for="cc-number" class="control-label mb-1"> Time</label>
														<input id="cc-number" name="time" type="time" class="form-control cc-number">
													</div>

													<div class="form-group" >
														<label for="select-route">Route</label>
														<select class="form-control" name="route">
															<option value="">--Select Route--</option>
															<option value="Legon">Legon</option>
															<option value="Madina">Madina</option>
															<option value="Kwabenya">Kwabenya</option>
														</select>
													</div>

													<div class="form-group" >
														<label for="select-bus">Bus</label>
														<select class="form-control" name="bus">
															<option value="">--Select Bus--</option>
															<option value="Toyota Hiace (Small)">Toyota Hiace (Small)</option>
															<option value="Toyota Long">Toyota Long</option>
															<option value="Toyota Hiace (Big)">Toyota Hiace (Big)</option>
														</select>
													</div>

													<div class="form-group" >
														<label for="cc-payment" class="control-label mb-1"> Bus Capacity</label>
														<input id="cc-pament" name="seats" type="text" class="form-control">
													</div>

													<div class="form-group" >
														<label for="select-bus">Driver</label>
														<select class="form-control" name="driver">
															<option value="">--Select Driver--</option>
															<option value="Driver 1">Driver 1</option>
															<option value="Driver 2">Driver 2</option>
															<option value="Driver 3">Driver 3</option>
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
    </script>

   <!--Script-->
   <?php include 'scripts.php'?>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    
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