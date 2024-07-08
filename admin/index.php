<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bus management system">
    <meta name="author" content="Your Name">
    <meta name="keywords" content="bus management, logistics, dashboard">

    <!-- Title Page-->
    <title>Bus Management Dashboard</title>

    <!-- CSS STYLES-->
    <?php include 'styles.php'?>
</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'?>

        <!-- MENU SIDEBAR-->
        <?php include 'side-menu.php'?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include 'desktop-header.php'?>
            
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
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-bus"></i>
                                            </div>
                                            <div class="text">
                                                <h2>20</h2>
                                                <span>Buses Available</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="text">
                                                <h2>15</h2>
                                                <span>Drivers Assigned</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar"></i>
                                            </div>
                                            <div class="text">
                                                <h2>30</h2>
                                                <span>Trips Scheduled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bus Information Table-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Bus Information</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Bus Number</th>
                                                <th>Seating Capacity</th>
                                                <th>Availability</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>BUS123</td>
                                                <td>50</td>
                                                <td>Available</td>
                                                <td>
                                                    <button class="btn btn-success">Edit</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BUS456</td>
                                                <td>40</td>
                                                <td>Not Available</td>
                                                <td>
                                                    <button class="btn btn-success">Edit</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  

                        <!-- Driver Assignment Section-->
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="title-1 m-b-25">Assign Drivers</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Driver</th>
                                                <th>Bus Number</th>
                                                <th>Trip Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Doe</td>
                                                <td>BUS123</td>
                                                <td>2024-07-10</td>
                                                <td>
                                                    <button class="btn btn-success">Assign</button>
                                                    <button class="btn btn-danger">Remove</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jane Smith</td>
                                                <td>BUS456</td>
                                                <td>2024-07-11</td>
                                                <td>
                                                    <button class="btn btn-success">Assign</button>
                                                    <button class="btn btn-danger">Remove</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                        
                        <!-- Driver Dashboard Section-->
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="title-1 m-b-25">Driver Dashboard</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Bus Number</th>
                                                <th>Route</th>
                                                <th>Departure Time</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>BUS123</td>
                                                <td>Route A</td>
                                                <td>08:00 AM</td>
                                                <td>
                                                    <button class="btn btn-success">Mark Attendance</button>
                                                    <button class="btn btn-info">Manage Passengers</button>
                                                    <button class="btn btn-warning">Update Status</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BUS456</td>
                                                <td>Route B</td>
                                                <td>09:00 AM</td>
                                                <td>
                                                    <button class="btn btn-success">Mark Attendance</button>
                                                    <button class="btn btn-info">Manage Passengers</button>
                                                    <button class="btn btn-warning">Update Status</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                        
                        <!-- Home Page Section-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Home Page</h2>
                                <div class="overview-wrap">
                                    <p>Welcome to the Bus Management System. Use the quick links below to get started:</p>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-bus"></i>Book a Ride</button>
                                    <button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-calendar"></i>View Trips</button>
                                    <button class="au-btn au-btn-icon au-btn--red">
                                        <i class="zmdi zmdi-settings"></i>Manage Bookings</button>
                                </div>

                                <!-- link for viewing booking details  -->
                                <div class="overview-wrap">
                                    <ul>
                                        <li><a href="booking_details.php">View Booking Details</a></li>
                                    </ul>
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
