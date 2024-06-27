<!DOCTYPE HTML>
<html>
	<head>
		<title>PHPJabbers.com | Free Book Online Store Website Template</title>
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
					include "header.html";
					include "menu.html";
				?>
				

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Book Your Seat</h1>
						</div>
					</div>

			
				<div class="inner">
					<section>
						<form method="post" action="#">
							<div class="fields">
								<div class="field half">
									<select>
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
									<input type="text" name="field-2" id="field-2" placeholder="Name">
								</div>

								<div class="field half">
									<input type="text" name="field-3" id="field-3" placeholder="Email">
								</div>

								<div class="field half">
									<input type="text" name="field-4" id="field-4" placeholder="Phone">
								</div>

								<div class="field half">
									<input type="text" name="field-5" id="field-5" placeholder="Address 1">
								</div>

								<div class="field half">
									<input type="text" name="field-6" id="field-6" placeholder="Address 2">
								</div>

								<div class="field half">
									<input type="text" name="field-7" id="field-7" placeholder="City">
								</div>

								<div class="field half">
									<input type="text" name="field-8" id="field-8" placeholder="State">
								</div>

								<div class="field half">
									<input type="text" name="field-7" id="field-7" placeholder="Zip">
								</div>

								<div class="field half">
									<select>
										<option value="">-- Choose Country--</option>
										<option value="">-- Choose Country --</option>
										<option value="">-- Choose Country --</option>
										<option value="">-- Choose Country --</option>
									</select>
								</div>

								<div class="field half">

									<select>
										<option value="">-- Choose Payment Method--</option>
										<option value="">-- Choose Payment Method--</option>
										<option value="">-- Choose Payment Method--</option>
										<option value="">-- Choose Payment Method--</option>
									</select>
								</div>

								<div class="field half">
									<input type="text" name="field-9" id="field-9" placeholder="Captcha">
								</div>

								<div class="field">
									<div>
										<input type="checkbox" id="checkbox-4"> 
										
										<label for="checkbox-4">
											I agree with the <a href="terms.html" target="_blank">Terms &amp; Conditions</a>
										</label>
									</div>
								</div>


								<div class="field half text-right">
									<ul class="actions">
										<li><input type="submit" value="Finish" class="primary"></li>
									</ul>
								</div>
							</div>
						</form>
					</section>
					<?php include "footer.html"?>		
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>							