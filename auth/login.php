<?php
session_start();
define("APPURL", "http://localhost/bus_system/");

$errors = [];
$signup_data = [];
$signup_success = false;

if (isset($_SESSION['signup_errors'])) {
    $errors = $_SESSION['signup_errors'];
    unset($_SESSION['signup_errors']);
}

if (isset($_SESSION['signup_data'])) {
    $signup_data = $_SESSION['signup_data'];
    unset($_SESSION['signup_data']);
}

if (isset($_SESSION['signup_success'])) {
    $signup_success = $_SESSION['signup_success'];
    unset($_SESSION['signup_success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="<?php echo APPURL; ?>assets/css/login.css"/>
    <title>Login/Register Page</title>
    <style>
        .the-error-message { 
            color: red; 
            margin-bottom: 10px;
        }
        .the-success-message { 
            color: green; 
            margin-bottom: 10px;
        }
    </style>
    <!--The JavaScript snippet below ensures the error and success message disappears after 5 seconds -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.querySelector('.the-success-message');
            const errorMessage = document.querySelector('.the-error-message');

            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 5000);
            }

            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <section class="form sign-up active">
                <h1>Ashesi Bus System</h1>
                <h2>SIGN UP</h2>
                <?php if ($signup_success): ?>
                    <div class="the-success-message"><h2>Registration Completed Successfully! You can now sign in.</h2></div>
                <?php endif; ?>
                <?php if (!empty($errors)): ?>
                    <div class="the-error-message">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form id="Register" method="POST" action="../actions/signup_action.php">
                    <div class="form-group">
                        <div class="form-control">
                            <label>First Name</label>
                            <input type="text" name="first_name" id="firstName" value="<?= isset($signup_data['first_name']) ? htmlspecialchars($signup_data['first_name']) : '' ?>"/>
                        </div>
                        <div class="form-control">
                            <label>Last Name</label>
                            <input type="text" name="last_name" id="lastName" value="<?= isset($signup_data['last_name']) ? htmlspecialchars($signup_data['last_name']) : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <label>Email</label>
                            <input type="email" name="email" id="email" autocomplete="new-username" value="<?= isset($signup_data['email']) ? htmlspecialchars($signup_data['email']) : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <label>Password</label>
                            <input type="password" name="password" id="password" autocomplete="new-password"/>
                        </div>
                        <div class="form-control">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirmPassword" autocomplete="new-password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <label>Phone Number</label>
                            <input type="tel" name="phone_number" id="phoneNumber" value="<?= isset($signup_data['phone_number']) ? htmlspecialchars($signup_data['phone_number']) : '' ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <label for="role-selection">Select Role</label>
                            <select name="role" id="role-selection">
                                <option value="">-- Select Role --</option>
                                <option value="staff" <?= isset($signup_data['role']) && $signup_data['role'] == 'staff' ? 'selected' : '' ?>>Staff</option>
                                <option value="driver" <?= isset($signup_data['role']) && $signup_data['role'] == 'driver' ? 'selected' : '' ?>>Driver</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
            </section>
            <section class="form sign-in">
                <h1>Ashesi Bus System</h1>
                <h2>SIGN IN</h2>
                <?php
                // Display login errors if any
                if (isset($_SESSION['login_errors'])) {
                    foreach ($_SESSION['login_errors'] as $error) {
                        echo "<div class='the-error-message'>$error</div>";
                    }
                    unset($_SESSION['login_errors']);
                }
                ?>
                <form id="login" method="POST" action="../actions/login_action.php">
                    <div class="form-group">
                        <div class="form-control">
                            <label>Email Address</label>
                            <input type="email" name="email" id="emailLogin" autocomplete="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control">
                            <label>Password</label>
                            <input type="password" name="password" id="passwordLogin" autocomplete="current-password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit">Sign In</button>
                    </div>
                </form>
            </section>
            <img src="<?php echo APPURL; ?>images/Ashesi_logo.jpg" class="corner-image" alt="Ashesi Logo">
        </div>
        <ul class="bottom">
            <li class="btn active" data-btn="sign-up">Sign Up</li>
            <li class="btn" data-btn="sign-in">Sign In</li>
        </ul>
    </div>
    <script src="<?php echo APPURL; ?>assets/js/login.js"></script>
</body>
</html>
