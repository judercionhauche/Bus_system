<aside class="menu-sidebar d-none d-lg-block">
    <div class="menu-sidebar__content js-scrollbar1">
        <div class="header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <span class="fa fa-bus" style="color:#9E4244"></span> 
                <span class="title" style="color: #9E4244;">Ashesi Bus System</span> 
            </a>
        </div>
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <?php if ($user_role <= 2): ?>
                    <li class="active has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <?php if ($user_role == 1): ?>
                                <li>
                                    <a href="index.php">Dashboard</a>
                                </li>
                                <li>
                                    <a href="driver.php">Driver</a>
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
                            <?php elseif ($user_role == 2): ?>
                                <li>
                                    <a href="trips.php">Trips</a>
                                </li>
                                <li>
                                    <a href="../booking.php">Booking</a>
                                </li>
                                <li>
                                    <a href="staff.php">Staff</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($user_role <= 2): ?>
                    <li>
                        <a href="trips.php">
                            <i class="fas fa-table"></i> Trips
                        </a>
                    </li>
                    <li>
                        <a href="../booking.php">
                            <i class="fas fa-pencil-square-o"></i> Booking
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

<style>
    .header {
        padding: 0 0 0 0;
    }

    .header .logo {
        display: flex;
        position: relative;
        border-bottom: 0;
        color: inherit;
        font-weight: 800;
        letter-spacing: 0.15em;
        margin: 0 0 0 0;
        text-decoration: none;
        text-transform: uppercase;
        display: inline-block;
        background-color: #fff;
    }

    .header .logo > * {
        display: inline-block;
        vertical-align: middle;
        padding-top: 1.5em;
    }

    .header .logo .symbol {
        margin-right: 0;
    }

    .header .logo .symbol img {
        display: inline-block;
        width: 2em;
        height: 2em;
    }
</style>
