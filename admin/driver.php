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
                                <h2 class="title-1" style="margin-left:35%">DRIVERS</h2>


                                <div class="popup">
                                    <button class="au-btn au-btn-icon au-btn--blue" onclick="addDriver()" style="position: absolute; right: 5vw; top: -1vw;">
                                        <i class="zmdi zmdi-plus" ></i>Add</button>
                                    
                                        <span class="bus-form-popup" id="busPopup">
                                            <div class="col-lg-6";>
                                                <div class="card" style="width: 30vw";>
                                                    
                                                    <div class="card-body" style="width: 29vw;">
                                                        
                                                        <form action="" method="post" >
                                                            <div class="form-group" >
                                                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                                                <input id="cc-pament" name="cc-payment" type="text" class="form-control">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="cc-number" class="control-label mb-1">ID</label>
                                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number">
                                                            </div>

                                                            <div class="form-group" >
                                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid">
                                                            </div>

                                                            <div class="form-group" >
                                                                <label for="cc-name" class="control-label mb-1">Phone</label>
                                                                <input id="cc-name" name="cc-name" type="number" class="form-control cc-name valid">
                                                            </div>

                                                                                                                    
                                                            <div>
                                                                <button id="" type="submit" class="btn btn-lg btn-info btn-block">
                                                                   DONE
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </span>
                                </div>
                                        
                                    

                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>                                              
                                                <th>Name</th>
                                                <th>ID</th>
                                                <th>PHONE</th>
                                                <th>EMAIL</th>
                                                <th> ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>Lori Lynch</td>
                                                
                                                <td>123456</td>
                                                <td class="desc">+2335345563456</td>
                                                <td>
                                                    <span class="block-email">lori@example.com</span>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                
                                            <td>Lori Lynch</td>
                                                
                                                <td>123456</td>
                                                <td class="desc">+2335345563456</td>
                                                <td>
                                                    <span class="block-email">lori@example.com</span>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                
                        <br><br><br> 
                                <!-- Overview Section-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Trash (Logistics)</h2>
                                </div>
                            </div>
                        </div>


                        <!-- DATA TABLE-->
                        <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>                                              
                                                <th>Name</th>
                                                <th>ID</th>
                                                <th>PHONE</th>
                                                <th>EMAIL</th>
                                                <th> ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>Lori Lynch</td>
                                                
                                                <td>123456</td>
                                                <td class="desc">+2335345563456</td>
                                                <td>
                                                    <span class="block-email">lori@example.com</span>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                
                                            <td>Lori Lynch</td>
                                                
                                                <td>123456</td>
                                                <td class="desc">+2335345563456</td>
                                                <td>
                                                    <span class="block-email">lori@example.com</span>
                                                </td>
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
