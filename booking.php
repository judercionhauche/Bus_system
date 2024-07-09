<!DOCTYPE HTML>
<html>
<head>
    <title>ASHESI BUS SYSTEM</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

    <style>
        .total-price {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
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
      
        <div id="main" style="padding-bottom: 0px;">
              
            <div class="inner">
                <h1 style="text-align: center; font-size: 30px;">Book Your Seat</h1>
            </div>
        
            <div class="inner" style="
                    background-color: #f9f9f9;
                    border-color: #ccc;
                    max-width: 60%;
                    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); 
                    border-radius: 12px;
                    margin-top:0px">
                                        
                <form method="post" action="../actions/success.php" id="form">
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
                            <input type="text" name="fname" id="fname" placeholder="First Name">
                        </div>
                        <div class="field half">
                            <input type="text" name="lname" id="lname" placeholder="Last Name">
                        </div>

                        <div class="field half">
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="field half">
                            <input type="text" name="phone" id="phone" placeholder="Phone">
                        </div>

                        <div class="field full">Departure Time</div>
                            <input type="time" name="departure_time" id="departure_time" placeholder="Departure Time">
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
                                <option value="ashesi_university">Ashesi University</option>
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
                        <div class="field full" style="display: inline;">
                            <input type="number" name="number_of_seats" id="number_of_seats" placeholder="Number of Seats" min="1" style="display: inline; width: auto;" onchange="calculateTotalPrice()">
                        </div>

                        <div class="field full total-price" id="total-price">
                            Total Price: GHS 0
                        </div>

                        <div class="field" style="padding-left: 35%">
                            
                        </div>

                        <div class="field half text-right" style="padding-left: 45%;">
                            <ul class="actions">
                                <li>
                                    <button crossorigin="anonymous" class="btn_3" style="margin-top: 30px; margin-left:90px; background-color: #9E4244; ">Proceed to Payment</button>
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

    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
    const pricePerSeat = 35; // Bus fare price per seat

    function calculateTotalPrice() {
        const numberOfSeats = document.getElementById('number_of_seats').value;
        const totalPrice = numberOfSeats * pricePerSeat;
        document.getElementById('total-price').innerText = 'Total Price: GHS ' + totalPrice;
    }

    function payWithPaystack() {
        const numberOfSeats = document.getElementById('number_of_seats').value;
        const totalPrice = numberOfSeats * pricePerSeat * 100; // Convert to the lowest currency unit

        var handler = PaystackPop.setup({
            key: 'pk_test_ab49a5d290b88ba99712d41d80b66b14ae01a751', 
            email: 'judercionhauche@gmail.com',
            amount: totalPrice,
            currency: 'GHS', 
            ref: '' + Math.floor(Math.random() * 1000000 + 1),
            callback: function(response) {
                var reference = response.reference;
                // Collect form data
                const formData = new FormData(document.getElementById('form'));
                const params = new URLSearchParams(formData).toString();

                // Redirect with form data and payment reference
                window.location.href = "actions/success.php?ref=" + reference + "&" + params;
            },
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            },
        });
        handler.openIframe();
    }
    const form = document.getElementById("form");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        payWithPaystack();
    });
    </script>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
