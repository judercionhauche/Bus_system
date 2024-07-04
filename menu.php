<!-- Menu -->
<?php
    session_start();
    define("APPURL","http://localhost/bus_system/")?>

<nav id="menu">
    <h2>Menu</h2>
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
                        <?php if (isset($_SESSION['email'])): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION['email']; ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>booking.php">Book Ride</a></li>
                                        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>trips.php">Trips</a></li>
                                        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>auth/logout.php">Sign Out</a></li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li><a href="<?php echo APPURL;?>auth/login.php">Sign in</a></li>
                        <?php endif; ?> 
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
</nav>
<!-- Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> 