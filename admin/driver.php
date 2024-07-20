<?php include 'styles.php'; ?>
<?php require '../config/connection.php'; ?>
<?php
    // Fetch data from the users table where role is 2 (drivers)
    $stmt = $connection->prepare("SELECT user_id, first_name, last_name, phone_number, email FROM users WHERE role = 2");
    $stmt->execute();
    $result = $stmt->get_result();
?>
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
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Driver ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($result->num_rows > 0): ?>
                                                <?php while ($row = $result->fetch_assoc()): ?>
                                                    <tr class="tr-shadow">
                                                        <td><?= htmlspecialchars($row['user_id']); ?></td>
                                                        <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                                        <td class="desc"><?= htmlspecialchars($row['phone_number']); ?></td>
                                                        <td><span class="block-email"><?= htmlspecialchars($row['email']); ?></span></td>
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
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">No drivers found</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $connection->close(); ?>
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

</body>

</html>
