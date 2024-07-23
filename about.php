<?php
    // Start the session
    session_start();
?>

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

        <!-- Header -->
        <header id="header">
            <div class="inner">

                <!-- Logo -->
                <a href="#" id="bookRideLink" class="logo">
                    <span class="fa fa-book"></span> <span class="title">Book Your Ride</span>
                </a>

            </div>
        </header>

        <!-- Main -->
        <div id="main">
            <div class="inner">
                <h1>About Us</h1>

                <div class="image main">
                    <img src="images/banner-image-1-1920x500.jpg" class="img-fluid" alt="" />
                </div>
                <p>You can now book your ride at the speed of your fingers!</p>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <section>
                    <ul class="icons">
                        <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    </ul>

                    &nbsp;
                </section>

                <ul class="copyright">
                    <li>Copyright © 2020 Company Name </li>
                    <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
                </ul>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookRideLink = document.getElementById('bookRideLink');
            bookRideLink.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                const isLoggedIn = <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>;
                if (isLoggedIn) {
                    window.location.href = 'bus-schedule.php'; // Redirect to bus_schedule.php if logged in
                } else {
                    window.location.href = 'auth/login.php'; // Redirect to login page if not logged in
                }
            });
        });
    </script>
</body>
</html>
