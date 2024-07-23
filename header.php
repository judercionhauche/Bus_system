<?php
    // Start the session
    session_start();
    
    // Define the APPURL constant
    define("APPURL", "http://localhost/bus_system/");
?>
<!-- Header -->
<header id="header">
    <div class="inner">

        <!-- Logo -->
        <a href="index.php" class="logo">
            <span class="fa fa-bus" style="color:#9E4244"></span> <span class="title" style="color: #9E4244;">Ashesi Bus System</span>
        </a>

        <!-- Nav -->
        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="#menu">Menu</a></li>
                <?php else: ?>
                    <li><a href="auth/login.php">Sign in</a></li>
                    <li><a href="about.php">About Us</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
