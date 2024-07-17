<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <?php include 'styles.php'?>

</head>

<body>
    <div class="page-wrapper">


        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'?>

        <!-- HEADER DESKTOP-->
        <?PHP INCLUDE 'side-menu.php'?>

         <!-- HEADER DESKTOP-->
         <?PHP INCLUDE 'desktop-header.php'?>
        
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
												
												<form action="" method="post" >
													<div class="form-group" >
														<label for="cc-payment" class="control-label mb-1">Date</label>
														<input id="cc-pament" name="cc-payment" type="date" class="form-control">
													</div>
													
													<div class="form-group">
														<label for="cc-number" class="control-label mb-1"> Time</label>
														<input id="cc-number" name="cc-number" type="time" class="form-control cc-number">
													</div>

													<div class="form-group" >
														<label for="select-route">Route</label>
														<select class="form-control" id="select-route">
															<option value="">--Select Route--</option>
															<option value="Route A">Route A</option>
															<option value="Route B">Route B</option>
															<option value="Route C">Route C</option>
														</select>
													</div>

													<div class="form-group" >
														<label for="select-bus">Bus</label>
														<select class="form-control" id="select-route">
															<option value="">--Select Bus--</option>
															<option value="Route A">Bus1</option>
															<option value="Route B">Bus2</option>
															<option value="Route C">Bus3</option>
														</select>
													</div>

													<div class="form-group" >
														<label for="cc-payment" class="control-label mb-1"> Available Seats</label>
														<input id="cc-pament" name="cc-payment" type="text" class="form-control">
													</div>

													<div class="form-group" >
														<label for="select-bus">Bus</label>
														<select class="form-control" id="select-route">
															<option value="">--Select Driver--</option>
															<option value="Route A">Driver 1</option>
															<option value="Route B">Driver 2</option>
															<option value="Route C">Driver 3</option>
														</select>
													</div>
																											
													<div>
														<button id="" type="submit" class="btn btn-lg btn-info btn-block">
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
            <?PHP INCLUDE 'footer.php'?>

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

</html>
<!-- end document-->