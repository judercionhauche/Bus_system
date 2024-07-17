<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <?php include 'styles.php'?>

</head>

<body>
    <div class="page-wrapper">


        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'?>

        <!-- HEADER DESKTOP-->
        <?PHP INCLUDE 'side-menu.php'?>

         <!-- HEADER DESKTOP-->
         <?PHP INCLUDE 'desktop-header.php'?>
        
        <!-- PAGE CONTENT-->
        <div class="page-container">
            <div class="main-content">

                <!-- DATA TABLE-->
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1" style="margin-left:20%">DRIVERS</h2>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header" style="text-align: center;">ASSIGN DRIVER</div>
                                        <div class="card-body card-block">
                                            <form action="" method="post" class="">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Driver</div>
                                                        <select class="form-control" id="select-route">
															<option value="" style="text-align: center;">--Select Drivers--</option>
															<option value="Route A">Driver 1</option>
															<option value="Route B">Driver 2</option>
															<option value="Route C">Driver 3</option>
														</select>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Bus</div>
                                                        <select class="form-control" id="select-route">
															<option value="" style="text-align: center;">--Select Buses--</option>
															<option value="Route A">Bus1</option>
															<option value="Route B">Bus2</option>
															<option value="Route C">Bus3</option>
														</select>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-bus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-actions form-group">
                                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END DATA TABLE-->

                <!-- STATISTIC CHART-->
                <section class="statistic-chart" style="display:NOne;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">statistics</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <!-- CHART-->
                                <div class="statistic-chart-1">
                                    <h3 class="title-3 m-b-30">chart</h3>
                                    <div class="chart-wrap">
                                        <canvas id="widgetChart5"></canvas>
                                    </div>
                                    <div class="statistic-chart-1-note">
                                        <span class="big">10,368</span>
                                        <span>/ 16220 items sold</span>
                                    </div>
                                </div>
                                <!-- END CHART-->
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END STATISTIC CHART-->

                
            </div>
            <!-- FOOTER-->
            <?PHP INCLUDE 'footer.php'?>

            <!-- END COPYRIGHT-->
        </div>

    </div>

   <!--Script-->
   <?php include 'scripts.php'?>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    
    <!-- CSS for ADD form popup-->
    <style>        
        .popup .bus-form-popup{
            position: absolute;
            visibility: hidden;
        }                                    



        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
        visibility: visible;
        position: relative;
        margin-right: 0%;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
        }

        @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
        }

            
    </style>

    <script>
        // When the user clicks on div, open the popup
        function addDriver() {
        var popup = document.getElementById("busPopup");
        popup.classList.toggle("show");
        }
    </script>

</body>

</html>
<!-- end document-->
