<?php
// Start the session
session_start();

// Check if the user is logged in and has a role
if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = 2; // Default role if not set
}

// Retrieve the user role from the session
$user_role = $_SESSION['role'];

// Redirect to login page if role is 3 or more
if ($user_role >= 3) {
    header('Location: ../auth/login.php');
    exit(); // Ensure no further code is executed after redirection
}
?>

<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">

                <a href="index.php" class="logo">
                    <span class="fa fa-bus" style="color:#9E4244; font-size: larger;"> ASHESI BUS SYSTEM</span>
                </a>

                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
               
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="index.php">Dashboard</a>
                        </li>

                        <!-- Show only for role 1 (Logistics) -->
                        <?php if ($user_role == 1): ?>
                            <li>
                                <a href="driver.php">Drivers</a>
                            </li>
                            <li>
                                <a href="logistics.php">Logistics</a>
                            </li>
                            <li>
                                <a href="staff.php">Staff</a>
                            </li>
                            <li>
                                <a href="bus.php">Bus</a>
                            </li>
                        <?php endif; ?>

                        <!-- Show only for role 2 (Driver) -->
                        <?php if ($user_role == 2): ?>
                            <!-- Drivers cannot see these menu items -->
                        <?php endif; ?>
                        
                    </ul>
                </li>
                
                <!-- Show trips and booking links for all roles -->
                <li>
                    <a href="trips.php">
                        <i class="fas fa-table"></i>Trips</a>
                </li>
                <li>
                    <a href="booking.php">
                        <i class="fas fa-pencil-square-o"></i>Booking</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->
