<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'config/connection.php'; 

// Start session to use session variables
session_start();

// Set trip ID from the POST request
if (isset($_POST['trip_id'])) {
    $_SESSION['trip_id'] = $_POST['trip_id'];
    var_dump($_SESSION['trip_id']);
} elseif (!isset($_SESSION['trip_id'])) {
    header('Location: bus_schedule.php'); // Redirect if no trip ID is provided
    exit;
}

$trip_id = isset($_SESSION['trip_id']) ? htmlspecialchars($_SESSION['trip_id'], ENT_QUOTES, 'UTF-8') : '';

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Mobility | Ashesi Ride Made Easy</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <!-- Header and Menu -->
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
                    <input type="hidden" name="trip_id" value="<?php echo $trip_id; ?>">
                    <div class="field full" style="display: inline;">
                        <input type="number" name="number_of_seats" id="number_of_seats" placeholder="Number of Seats" min="1" style="display: inline; width: auto;" onchange="checkSeats()">
                    </div>

                    <div class="field full total-price" id="total-price">
                        Total Price: GHS 0
                    </div>

                    <div class="field" style="padding-left: 35%">
                    </div>

                    <div class="field half text-right" style="padding-left: 45%;">
                        <ul class="actions">
                            <li>
                                <button type="submit" class="btn btn-success btn-sm" style="margin-top: 30px; margin-left:90px; background-color: white;">Proceed to Payment</button>
                            </li>
                        </ul>
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

    function checkSeats() {
        const numberOfSeats = document.getElementById('number_of_seats').value;
        if (numberOfSeats > 3) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "You cannot choose more than 3 seats!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
            document.getElementById('number_of_seats').value = 1; // Reset to minimum value
            calculateTotalPrice(); // Update the total price
        } else {
            calculateTotalPrice();
        }
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
