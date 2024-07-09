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
    <title>Tables</title>

    <!-- Fontfaces CSS-->
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
                        <div class="row">
                            <!-- Overview Section-->
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Buses</h2>
                                    <div class="popup">
                                    <button class="au-btn au-btn-icon au-btn--blue" onclick="addBus()">
                                        <i class="zmdi zmdi-plus" ></i>Add Bus</button>
                                    
                                        <span class="bus-form-popup" id="busPopup">
                                            <div class="col-lg-6";>
                                                <div class="card" style="width: 30vw";>
                                                    
                                                    <div class="card-body" style="width: 29vw;">
                                                        
                                                        <form action="" method="post" >
                                                            <div class="form-group" >
                                                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                                                <input id="cc-pament" name="cc-payment" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group" >
                                                                <label for="cc-name" class="control-label mb-1">Number</label>
                                                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-number" class="control-label mb-1">Brand</label>
                                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="cc-number" class="control-label mb-1">Model</label>
                                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="cc-number" class="control-label mb-1">Capacity</label>
                                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number">
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
                                    function addBus() {
                                    var popup = document.getElementById("busPopup");
                                    popup.classList.toggle("show");
                                    }
                                    </script>



                                </div>
                            </div>
                        
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Bus Name</th>
                                                <th>Number</th>
                                                <th>Capacity</th>
                                                <th class="text-right">Driver</th>
                                                <th class="text-right">Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bus 1</td>
                                                <td>10039</td>
                                                <td>54</td>
                                                <td class="text-right">Mr. Kofi</td>
                                                <td class="text-right">Active</td>
                                                <td class="text-right">
                                                    <button class="btn btn-success">Edit</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>    

                        <br><br><br>
                       
                        <!-- Overview Section-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Trash (Buses)</h2>
                                </div>
                            </div>
                        </div>

                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Bus Name</th>
                                        <th>Number</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Description</th>
                                        <th>Capacity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bus 2</td>
                                        <td>24356446</td>
                                        <td>iPhone</td>
                                        <td>Processed</td>
                                        <td>Gold</td>
                                        <td>23</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->

                        <br><br><br><br><br><br>
                        <div class="row" style="display: none;">
                            <div class="col-lg-6">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <td>type</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role admin">admin</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role member">member</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            <div class="col-lg-6">
                                <!-- TOP CAMPAIGN-->
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-30">top campaigns</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                            <tbody>
                                                <tr>
                                                    <td>1. Australia</td>
                                                    <td>$70,261.65</td>
                                                </tr>
                                                <tr>
                                                    <td>2. United Kingdom</td>
                                                    <td>$46,399.22</td>
                                                </tr>
                                                <tr>
                                                    <td>3. Turkey</td>
                                                    <td>$35,364.90</td>
                                                </tr>
                                                <tr>
                                                    <td>4. Germany</td>
                                                    <td>$20,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>5. France</td>
                                                    <td>$10,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>3. Turkey</td>
                                                    <td>$35,364.90</td>
                                                </tr>
                                                <tr>
                                                    <td>4. Germany</td>
                                                    <td>$20,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>5. France</td>
                                                    <td>$10,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>3. Turkey</td>
                                                    <td>$35,364.90</td>
                                                </tr>
                                                <tr>
                                                    <td>4. Germany</td>
                                                    <td>$20,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>5. France</td>
                                                    <td>$10,366.96</td>
                                                </tr>
                                                <tr>
                                                    <td>4. Germany</td>
                                                    <td>$20,366.96</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                            </div>
                        </div>
                        <div class="row" style="display:none">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>description</th>
                                                <th>date</th>
                                                <th>status</th>
                                                <th>price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <span class="block-email">lori@example.com</span>
                                                </td>
                                                <td class="desc">Samsung S8 Black</td>
                                                <td>2018-09-27 02:12</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td>$679.00</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <span class="block-email">john@example.com</span>
                                                </td>
                                                <td class="desc">iPhone X 64Gb Grey</td>
                                                <td>2018-09-29 05:57</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td>$999.00</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <span class="block-email">lyn@example.com</span>
                                                </td>
                                                <td class="desc">iPhone X 256Gb Black</td>
                                                <td>2018-09-25 19:03</td>
                                                <td>
                                                    <span class="status--denied">Denied</span>
                                                </td>
                                                <td>$1199.00</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <span class="block-email">doe@example.com</span>
                                                </td>
                                                <td class="desc">Camera C430W 4k</td>
                                                <td>2018-09-24 19:10</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>
                                                <td>$699.00</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                      
                       
                        <?php include 'footer.php'?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Scripts-->
    <?php include 'scripts.php'?>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
