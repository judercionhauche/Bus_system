<?php
session_start();
require '../config/connection.php'; // Adjust the path if needed

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize messages
$message = '';

// Handle deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $email = $_POST['email'];

    // Delete the staff member from the database
    $stmt = $connection->prepare("DELETE FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $message = "Staff member deleted successfully.";
    } else {
        $message = "Error deleting staff member: " . $stmt->error;
    }

    $stmt->close();
}

// Handle addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_staff'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = '1'; // Assuming '1' is the role for staff

    // Split name into first and last name
    $name_parts = explode(' ', $name, 2);
    $first_name = $name_parts[0];
    $last_name = isset($name_parts[1]) ? $name_parts[1] : '';

    // Insert the new staff member into the database
    $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, phone_number, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $first_name, $last_name, $phone, $email, $password, $role);

    if ($stmt->execute()) {
        $message = "Staff member added successfully.";
    } else {
        $message = "Error adding staff member: " . $stmt->error;
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

    <!-- Include Bootstrap CSS for the modal -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .modal-body .form-control {
            margin-bottom: 10px;
        }
    </style>

    <script>
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

                <!-- Display messages -->
                <?php if ($message): ?>
                    <div class="alert alert-info">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <!-- DATA TABLE-->
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1" style="margin-left: 35%">STAFF</h2>

                                <!-- Button trigger modal -->
                                <button type="button" class="au-btn au-btn-icon au-btn--blue" style="position: absolute; right: 5vw; top: -1vw;" data-toggle="modal" data-target="#addStaffModal">
                                    <i class="zmdi zmdi-plus"></i>Add
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaffModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addStaffModalLabel">Add Staff</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <input type="hidden" name="add_staff" value="true">
                                                    <div class="form-group">
                                                        <label for="name" class="control-label mb-1">Name</label>
                                                        <input id="name" name="name" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="control-label mb-1">Email</label>
                                                        <input id="email" name="email" type="email" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone" class="control-label mb-1">Phone</label>
                                                        <input id="phone" name="phone" type="tel" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password" class="control-label mb-1">Password</label>
                                                        <input id="password" name="password" type="password" class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add Staff</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Include Bootstrap JS for the modal -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>
</html>
<!-- end document-->
