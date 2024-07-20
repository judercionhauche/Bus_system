<?php include 'styles.php'; ?>
<?php require '../config/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers Management</title>
</head>
<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'; ?>
        <!-- HEADER DESKTOP-->
        <?php include 'side-menu.php'; ?>
        <!-- HEADER DESKTOP-->
        <?php include 'desktop-header.php'; ?>

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
                                        <i class="zmdi zmdi-plus"></i>Add
                                    </button>
                                    <span class="bus-form-popup" id="busPopup">
                                        <div class="col-lg-6">
                                            <div class="card" style="width: 30vw;">
                                                <div class="card-body" style="width: 29vw;">
                                                    <form id="addDriverForm" action="../admin/admin-actions/driver_action.php" method="POST">
                                                        <div class="form-group">
                                                            <label for="email" class="control-label mb-1">Email</label>
                                                            <input id="email" name="email" type="email" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="first_name" class="control-label mb-1">First Name</label>
                                                            <input id="first_name" name="first_name" type="text" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="last_name" class="control-label mb-1">Last Name</label>
                                                            <input id="last_name" name="last_name" type="text" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone" class="control-label mb-1">Phone</label>
                                                            <input id="phone" name="phone" type="text" class="form-control" required>
                                                        </div>
                                                        <div>
                                                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
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
                        </div>
                    </div>
                </section>
                <!-- END DATA TABLE-->
            </div>
            <!-- FOOTER-->
            <?php include 'footer.php'; ?>
            <!-- END COPYRIGHT-->
        </div>
    </div>

    <!--Script-->
    <?php include 'scripts.php'; ?>
    <!-- Main JS--> 
    <script src="../assets/js/main.js"></script>

    <!-- CSS for ADD form popup-->
    <style>
        .popup .bus-form-popup {
            position: absolute;
            visibility: hidden;
        }

        .popup .show {
            visibility: visible;
            position: relative;
            margin-right: 0%;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }

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
        function addDriver() {
            var popup = document.getElementById("busPopup");
            popup.classList.toggle("show");
        }

        document.getElementById('email').addEventListener('blur', function() {
            var email = this.value;
            if (email) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'admin-actions/fetch_user_info.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (this.status == 200) {
                        var response = JSON.parse(this.responseText);
                        if (response.success) {
                            document.getElementById('first_name').value = response.first_name;
                            document.getElementById('last_name').value = response.last_name;
                        } else {
                            alert('User not found or is not a driver.');
                            document.getElementById('first_name').value = '';
                            document.getElementById('last_name').value = '';
                        }
                    }
                };
                xhr.send('email=' + encodeURIComponent(email));
            }
        });
    </script>
</body>

</html>
<!-- end document-->
