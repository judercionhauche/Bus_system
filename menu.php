<!-- Menu -->
<?php
    session_start();
    define("APPURL","http://localhost/bus_system/")?>

<nav id="menu">
    <h2>Menu</h2>
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="bus-schedule.php">Bus Schedule</a></li>
        <li><a href="booking.php">Book Ride</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="auth/logout.php">Sign out</a></li>
        
    </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> 