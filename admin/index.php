<?php
// Start the session
session_start();

// Check if the user is logged in and has a role
if (!isset($_SESSION['role'])) {
    header('Location: ../auth/login.php');
    exit(); // Redirect if not logged in
}

// Retrieve the user role from the session
$user_role = $_SESSION['role'];


// Redirect to login page if role is 3 or more
if ($user_role >= 3) {
    header('Location: ../auth/login.php');
    exit(); // Ensure no further code is executed after redirection
}

// Include database connection
include '../config/connection.php';

// Fetch total number of buses available
$getBusesAvailable = $connection->prepare("SELECT COUNT(*) as total_buses FROM buses WHERE bus_status = 'active'");
$getBusesAvailable->execute();
$busesResult = $getBusesAvailable->get_result();
$busesData = $busesResult->fetch_assoc();
$totalBuses = $busesData['total_buses'];

// Fetch total number of drivers assigned
$getDriversAssigned = $connection->prepare("SELECT COUNT(DISTINCT CONCAT(first_name, ' ', last_name)) as total_drivers FROM trips");
$getDriversAssigned->execute();
$driversResult = $getDriversAssigned->get_result();
$driversData = $driversResult->fetch_assoc();
$totalDrivers = $driversData['total_drivers'];

// Fetch total number of trips scheduled
$getTripsScheduled = $connection->prepare("SELECT COUNT(DISTINCT trip_id) as total_trips FROM trips");
$getTripsScheduled->execute();
$tripsResult = $getTripsScheduled->get_result();
$tripsData = $tripsResult->fetch_assoc();
$totalTrips = $tripsData['total_trips'];

// Fetch assigned drivers
$getAssignedDrivers = $connection->prepare("
    SELECT CONCAT(t.first_name, ' ', t.last_name) AS driver_name, 
           b.bus_number, 
           t.trip_date,
           t.departure_time,
           t.route
    FROM trips t
    JOIN buses b ON t.bus_id = b.bus_id
    GROUP BY t.first_name, t.last_name, b.bus_number, t.trip_date, t.departure_time, t.route
");
$getAssignedDrivers->execute();
$assignedDriversResult = $getAssignedDrivers->get_result();

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bus management system">
    <meta name="author" content="Your Name">
    <meta name="keywords" content="bus management, logistics, dashboard">

    <!-- Title Page-->
    <title>Mobility Dashboard</title>

    <!-- CSS STYLES-->
    <?php include 'styles.php'?>
</head>
<body>
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include 'desktop-header.php'?>

        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'?>

        <!-- MENU SIDEBAR-->
        <?php include 'side-menu.php'?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Overview Section-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Overview</h2>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bus Management Section-->
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <a href="bus.php" class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-bus"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $totalBuses; ?></h2>
                                                <span>Buses Available</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <a href="driver.php" class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $totalDrivers; ?></h2>
                                                <span>Drivers Assigned</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <a href="trips.php" class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $totalTrips; ?></h2>
                                                <span>Trips Scheduled</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Driver Assignment Section-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Assigned Drivers</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Driver</th>
                                                <th>Bus Number</th>
                                                <th>Trip Date</th>
                                                <th>Departure Time</th>
                                                <th>Route</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($driver = $assignedDriversResult->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$driver['driver_name']}</td>
                                                        <td>{$driver['bus_number']}</td>
                                                        <td>{$driver['trip_date']}</td>
                                                        <td>{$driver['departure_time']}</td>
                                                        <td>{$driver['route']}</td>
                                                      </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                        
                        <!-- Home Page Section-->
                        
                                <!-- link for viewing booking details  -->
                                
                                </div>
                            </div>
                        </div>  

                        <!-- FOOTER-->
                        <?php include 'footer.php'?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- SCRIPTS-->
    <?php include 'scripts.php'?>
    
</body>
</html>
