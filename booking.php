<!DOCTYPE HTML>
<html>
<head>
    <title>ASHESI BUS SYSTEM</title>
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
        <div id="main" style="padding-bottom: 0px;">
            <div class="inner">
                <h1 style="text-align: center; font-size: 30px;">Book Your Seat</h1>
            </div>
        
            <div class="inner" style="
                    background-color: #f9f9f9;border-color: #ccc;
                    max-width: 100%;
                    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); 
                    border-radius: 12px;
                    margin:10%;
                    margin-top:0px">
                                        
                <form method="post" action="process_booking.php">
                    <div class="fields">
                        <div class="field half">
                            <select name="title">
                                <option value="">-- Choose Title--</option>
                                <option value="dr">Dr.</option>
                                <option value="miss">Miss</option>
                                <option value="mr">Mr.</option>
                                <option value="mrs">Mrs.</option>
                                <option value="ms">Ms.</option>
                                <option value="other">Other</option>
                                <option value="prof">Prof.</option>
                                <option value="rev">Rev.</option>
                            </select>
                        </div>

                        <div class="field half">
                            <input type="text" name="name" id="name" placeholder="Name">
                        </div>

                        <div class="field full">
                            <input type="text" name="staff_id" id="staff_id" placeholder="Staff ID">
                        </div>

                        <div class="field half">
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="field half">
                            <input type="text" name="phone" id="phone" placeholder="Phone">
                        </div>

                        <div class="field full">
                            <input type="text" name="departure_time" id="departure_time" placeholder="Departure Time">
                        </div>

                        <div class="field half">
                            <select name="pickup_location">
                                <option value="">-- Choose Pickup Location--</option>
                                <option value="accra_central">Accra Central</option>
                                <option value="madina">Madina</option>
                                <option value="legon">Legon</option>
                                <option value="dome">Dome</option>
                                <option value="achimota">Achimota</option>
                                <option value="airport_residential_area">Airport Residential Area</option>
                                <option value="kaneshie">Kaneshie</option>
                                <option value="teshie">Teshie</option>
                            </select>
                        </div>

                        <div class="field half">
                            <select name="dropoff_location">
                                <option value="">-- Choose Dropoff Location--</option>
                                <option value="accra_central">Accra Central</option>
                                <option value="madina">Madina</option>
                                <option value="legon">Legon</option>
                                <option value="dome">Dome</option>
                                <option value="achimota">Achimota</option>
                                <option value="airport_residential_area">Airport Residential Area</option>
                                <option value="kaneshie">Kaneshie</option>
                                <option value="teshie">Teshie</option>
                            </select>
                        </div>

                        <div class="field full">
                            <input type="text" name="number_of_seats" id="number_of_seats" placeholder="Number of Seats">
                        </div>

                        <div class="field full">
                            <select name="payment_method">
                                <option value="">-- Choose Payment Method--</option>
                                <option value="mobile_money">Mobile Money</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="cash">Cash</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>

                        <div class="field" style="padding-left: 35%">
                            <div>
                                <input type="checkbox" id="checkbox-4" name="terms"> 
                                
                                <label for="checkbox-4">
                                    I agree with the <a href="terms.html" target="_blank">Terms &amp; Conditions</a>
                                </label>
                            </div>
                        </div>

                        <div class="field half text-right" style="padding-left: 45%;">
                            <ul class="actions">
                                <li>
                                    <input type="submit" value="Proceed to Payment" class="primary" style="background-color: #9E4244;"/>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>        
            </div>
            </div>

<<<<<<< HEAD
            <!-- Footer -->
            <?php include 'footer.html'?>
        </div>    
=======
						<div class="field" style="padding-left: 35%">
							<div>
								<input type="checkbox" id="checkbox-4"> 
								
								<label for="checkbox-4">
									I agree with the <a href="terms.html" target="_blank">Terms &amp; Conditions</a>
								</label>
							</div>
						</div>


						<div class="field half text-right" 		style="padding-left: 45%;">
							<ul class="actions">
								<li>								<input type="submit" value="Proceed to Payment"  class="primary" style="background-color: #9E4244;"/>
								</li>
							</ul>
						</div>
					</div>
				</form>		
			</div>
			</div>

			<!-- Footer -->
			<?php include 'footer.php'?>
		</div>	

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
	
</html>							
>>>>>>> e740e7e928f7a7f28ef73a7ca85e56e7123d3306

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/main.js"></script>
    </body>
</html>
