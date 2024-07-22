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
    <title>Edit Bus</title>

    <!-- Fontfaces CSS-->
    <?php include 'styles.php' ?>
</head>

<body>
<div>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require '../Functions/functions.php'; 
require '../Functions/session.php'; 
echo display_msg($msg); ?>
</div>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php' ?>


        <!-- MENU SIDEBAR-->
        <?php include 'side-menu.php' ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
           
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Overview Section-->
                            <?php include 'desktop-header.php' ?>
          
                            <div class="col-md-12">
                                <div class="overview-wrap">
          
                                    <h2 class="title-1">Edit Bus</h2>
                                    <div class="popup">
                                        <span class="bus-form-popup" id="busPopup">
                                            <div class="col-lg-6">
                                                <div class="card" style="width: 30vw;">

                                                    <div class="card-body" style="width: 29vw;">

                                                        <form action="../actions/edit_bus_actions.php" method="post">
                                                            <div class="form-group">
                                                                <label for="bus_name" class="control-label mb-1">Bus Name</label>
                                                                <input id="bus_name" name="bus_name" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bus_no" class="control-label mb-1">Bus Number</label>
                                                                <input id="bus_no" name="bus_no" type="text" class="form-control cc-name valid">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="status" class="control-label mb-1">Status</label>
                                                                <select id="status" name="status" class="form-control">
                                                                    <option value="active">Active</option>
                                                                    <option value="inactive">Inactive</option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="capacity" class="control-label mb-1">Capacity</label>
                                                                <input id="capacity" name="capacity" type="tel" class="form-control cc-number">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <?php include 'scripts.php' ?>
    </div>
</body>

</html>
