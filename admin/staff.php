<?php
session_start();
require '../config/connection.php'; // Adjust the path if needed

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $email = $_POST['email'];

    // Delete the staff member from the database
    $stmt = $connection->prepare("DELETE FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Staff member deleted successfully.";
    } else {
        $_SESSION['message'] = "Error deleting staff member: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch staff data from the database
$query = "SELECT first_name, last_name, phone_number, email FROM users WHERE role = '1'";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    $staffs = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $staffs = [];
}

$connection->close();
?>

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
            animation: fadeIn 1s;
        }

        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
    </style>

    <script>
        function addBus() {
            var popup = document.getElementById("busPopup");
            popup.classList.toggle("show");
        }

        function confirmDelete(email) {
            if (confirm("Are you sure you want to delete this staff member?")) {
                document.getElementById('deleteForm-' + email).submit();
            }
        }
    </script>
</head>

<body>
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <?php include 'mobile-header.php'?>

        <!-- HEADER DESKTOP-->
        <?php include 'side-menu.php'?>

        <!-- HEADER DESKTOP-->
        <?php include 'desktop-header.php'?>

        <!-- PAGE CONTENT-->
        <div class="page-container">
            <div class="main-content">

                <!-- DATA TABLE-->
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1" style="margin-left: 35%">STAFF</h2>

                                <div class="popup">
                                    <button class="au-btn au-btn-icon au-btn--blue" onclick="addBus()" style="position: absolute; right: 5vw; top: -1vw;">
                                        <i class="zmdi zmdi-plus"></i>Add</button>

                                    <span class="bus-form-popup" id="busPopup">
                                        <div class="col-lg-6";>
                                            <div class="card" style="width: 30vw";>
                                                <div class="card-body" style="width: 29vw;">
                                                    <form action="" method="post" >
                                                        <div class="form-group" >
                                                            <label for="cc-payment" class="control-label mb-1">Name</label>
                                                            <input id="cc-payment" name="cc-payment" type="text" class="form-control">
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
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($staffs)): ?>
                                                <tr>
                                                    <td colspan="4">No staff members yet.</td>
                                                </tr>
                                            <?php else: ?>
                                                <?php foreach ($staffs as $staff): ?>
                                                <tr class="tr-shadow">
                                                    <td><?php echo htmlspecialchars($staff['first_name'] . ' ' . $staff['last_name']); ?></td>
                                                    <td class="desc"><?php echo htmlspecialchars($staff['phone_number']); ?></td>
                                                    <td>
                                                        <span class="block-email"><?php echo htmlspecialchars($staff['email']); ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            <form id="deleteForm-<?php echo $staff['email']; ?>" method="POST" action="" style="display:inline;">
                                                                <input type="hidden" name="email" value="<?php echo htmlspecialchars($staff['email']); ?>">
                                                                <button type="button" class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirmDelete('<?php echo $staff['email']; ?>')">
                                                                    <i class="zmdi zmdi-delete"></i>
                                                                </button>
                                                                <input type="hidden" name="delete" value="true">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <br><br><br>
                                <!-- Overview Section-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="overview-wrap">
                                            <h2 class="title-1">Trash (Staff)</h2>
                                        </div>
                                    </div>
                                </div>

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($staffs as $staff): ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo htmlspecialchars($staff['first_name'] . ' ' . $staff['last_name']); ?></td>
                                                <td class="desc"><?php echo htmlspecialchars($staff['phone_number']); ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo htmlspecialchars($staff['email']); ?></span>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <form id="deleteForm-<?php echo $staff['email']; ?>" method="POST" action="" style="display:inline;">
                                                            <input type="hidden" name="email" value="<?php echo htmlspecialchars($staff['email']); ?>">
                                                            <button type="button" class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirmDelete('<?php echo $staff['email']; ?>')">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                            <input type="hidden" name="delete" value="true">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->

                            </div>
                        </div>
                    </div>
                </section>
                <!-- END DATA TABLE-->
            </div>
            <!-- FOOTER-->
            <?php include 'footer.php'?>
            <!-- END COPYRIGHT-->
        </div>
    </div>

    <!--Script-->
    <?php include 'scripts.php'?>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>
</html>
<!-- end document-->
