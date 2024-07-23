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
    <?php include 'styles.php' ?>

    <!-- SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>
    <div>
        <?php
      
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
                            <div id="busIdDisplay"></div>

                            <div class="col-md-12">
                                <div class="overview-wrap">

                                    <h2 class="title-1">Buses</h2>
                                    <div class="popup">
                                        <button class="au-btn au-btn-icon au-btn--blue" onclick="addBus()">
                                            <i class="zmdi zmdi-plus"></i>Add Bus</button>

                                        <span class="bus-form-popup" id="busPopup">
                                            <div class="col-lg-6" ;>
                                                <div class="card" style="width: 30vw" ;>

                                                    <div class="card-body" style="width: 29vw;">

                                                        <form action="../actions/add_bus_actions.php" method="post" onsubmit="return handleFormSubmit(event)">
                                                            <div class="form-group">
                                                                <label for="cc-payment" class="control-label mb-1"> Bus Name</label>
                                                                <input id="bus_name" name="bus_name" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cc-name" class="control-label mb-1">Bus Number</label>
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
                                                                <label for="cc-number" class="control-label mb-1">Capacity</label>
                                                                <input id="capacity" name="capacity" type="tel" class="form-control cc-number">
                                                            </div>

                                                            <div>
                                                                <button type="submit" class="btn btn-lg btn-info btn-block">DONE</button>

                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </span>

                                        <span class="bus-form-popup" id="editBusPopup">
                                            <div class="col-lg-6">
                                                <div class="card" style="width: 30vw;">
                                                    <div class="card-body" style="width: 29vw;">
                                                        <form id="editBusForm" onsubmit="return confirmEditBus(event)" action="../actions/edit_bus_actions.php" method="post">
                                                            <input type="hidden" id="edit_bus_id" name="bus_id">
                                                            <div class="form-group">
                                                                <label for="edit_bus_name" class="control-label mb-1">Bus Name</label>
                                                                <input id="edit_bus_name" name="bus_name" type="text" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edit_bus_no" class="control-label mb-1">Bus Number</label>
                                                                <input id="edit_bus_no" name="bus_no" type="text" class="form-control cc-name valid">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edit_status" class="control-label mb-1">Status</label>
                                                                <select id="edit_status" name="status" class="form-control">
                                                                    <option value="active">Active</option>
                                                                    <option value="inactive">Inactive</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="edit_capacity" class="control-label mb-1">Capacity</label>
                                                                <input id="edit_capacity" name="capacity" type="tel" class="form-control cc-number">
                                                            </div>
                                                            <div>
                                                                <button type="submit" class="btn btn-lg btn-info btn-block">UPDATE</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </span>

                                    </div>

                                    <style>
                                        .popup .bus-form-popup {
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
                                            from {
                                                opacity: 0;
                                            }

                                            to {
                                                opacity: 1;
                                            }
                                        }

                                        @keyframes fadeIn {
                                            from {
                                                opacity: 0;
                                            }

                                            to {
                                                opacity: 1;
                                            }
                                        }
                                    </style>

                                    <script>
                                        // When the user clicks on div, open the popup
                                        function addBus() {
                                            var popup = document.getElementById("busPopup");
                                            popup.classList.toggle("show");
                                        }

                                        function handleFormSubmit(event) {
                                            event.preventDefault(); // Prevent default form submission

                                            Swal.fire({
                                                position: "top-end",
                                                icon: "success",
                                                title: "Bus added successfully",
                                                showConfirmButton: false,
                                                timer: 1500
                                            }).then(() => {
                                                // Submit the form after the SweetAlert notification
                                                event.target.submit();
                                            });
                                        }

                                        // When the user clicks on the edit button, open the edit popup
                                        function editBus(bus) {
                                            var popup = document.getElementById("editBusPopup");
                                            document.getElementById("edit_bus_id").value = bus.bus_id;
                                            document.getElementById("edit_bus_name").value = bus.name;
                                            document.getElementById("edit_bus_no").value = bus.number;
                                            document.getElementById("edit_status").value = bus.status;
                                            document.getElementById("edit_capacity").value = bus.capacity;
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
                                                <th class="text-right">Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $bus_data = get_bus_data(); // This function should return bus data from the database

                                            foreach ($bus_data as $bus) {
                                                echo "<tr>";
                                                echo "<td>{$bus['name']}</td>";
                                                echo "<td>{$bus['number']}</td>";
                                                echo "<td>{$bus['capacity']}</td>";
                                                echo "<td class='text-right'>{$bus['status']}</td>";
                                                echo "<td class='text-right'>
                                                    <input type='hidden' class='bus-id' value='{$bus['bus_id']}'>
                                                    <button class='btn btn-success' onclick='editBus(" . json_encode($bus) . ")'>Edit</button>
                                                    <button class='btn btn-danger' onclick='deleteBus({$bus['bus_id']})'>Delete</button>
                                                </td>";
                                                echo "</tr>";
                                            }

                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                    </div>
                    <!-- Overview Section-->
                </div>
            </div>
        </div>

        <script>
            // When the user clicks on div, open the popup
            function addBus() {
                var popup = document.getElementById("busPopup");
                popup.classList.toggle("show");
            }




            // Confirm edit bus action
            function confirmEditBus(event) {
                event.preventDefault(); // Prevent the form from submitting immediately

                console.log("Form submission triggered");

                Swal.fire({
                    title: "Are you sure you want to edit this bus?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log("Confirmed. Submitting form.");
                        Swal.fire("Updated!", "Bus details have been updated.", "success").then(() => {
                            document.getElementById("editBusForm").submit(); // Submit the form after confirmation
                        });
                    } else if (result.isDenied) {
                        console.log("Denied. No changes made.");
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            }

    function deleteBus(busId) {
    // Display the bus ID in a div
    document.getElementById("busIdDisplay").innerHTML = `Deleting Bus ID: ${busId}`;

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            // Make AJAX request to delete the bus
            console.log(busId,  'bus id');
            fetch('../actions/delete_bus_actions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'bus_id': busId
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Data", data)
                if (data.success) {
                    Swal.fire({
                        title: "Deleted!",
                        text: data.message,
                        icon: "success"
                    }).then(() => {
                        location.reload(); // Reload the page to see the changes
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.message,
                        icon: "error"
                    });
                }
            })
            .catch(error => {
                console.log(error, 'error')
                Swal.fire({
                    title: "Error!",
                    text: "An error occurred while deleting the bus.",
                    icon: "error"
                });
            });
        }
    });
}

        </script>

        <!-- END DATA TABLE-->

        <br><br><br><br><br><br>
        <div class="row" style="display: none;">
            <div class="col-lg-6">
                <!-- USER DATA-->
                <div class="user-data m-b-30">
                    <h3 class="title-3 m-b-30">
                        <i class="zmdi zmdi-account-calendar"></i>user data
                    </h3>
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
            </div>
        </div>
        <div class="row" style="display:none">
            <div class="col-md-12">

            </div>
        </div>


        <?php include 'footer.php' ?>
    </div>
    </div>
    </div>
    </div>

    </div>

    <!--Scripts-->
    <?php include 'scripts.php' ?>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->

?>