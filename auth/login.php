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
    <link rel="stylesheet" href="../assets/css/login.css"/>
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>

    <title>Login/Register Page</title>
    
</head>

<body>        

    <div class="container">
    
        <h1>
            <div class="header">
            <!-- Logo -->
                <a href="index.php" class="logo">
                    <span class="fa fa-bus" style="color:#9E4244"></span> <span class="title" style="color: #9E4244;">Ashesi Bus System</span> 
                </a>

                
            </div>
        </h1>
        <div class="row">
            <section class="form sign-up active">
                
                <h2>Sign Up</h2>
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
                                <option value="logistics" <?= isset($signup_data['role']) && $signup_data['role'] == 'logistics' ? 'selected' : '' ?>>Logistics</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
            </section>
            <section class="form sign-in">
                
                <h2>Sign In</h2>
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
            
        </div>
        <ul class="bottom">
            <li class="btn active" data-btn="sign-up">Sign Up</li>
            <li class="btn" data-btn="sign-in">Sign In</li>
        </ul>
    </div>


    <style>
        .the-error-message { 
            color: red; 
            margin-bottom: 10px;
        }
        .the-success-message { 
            color: green; 
            margin-bottom: 10px;
        }


        .header {
		padding: 2em 0 0.1em 0 ;}

		.header .logo {
			display: block;
			border-bottom: 0;
			color: inherit;
			font-weight: 900;
			letter-spacing: 0.35em;
			margin: 0 0 2.5em 0;
			text-decoration: none;
			text-transform: uppercase;
			display: inline-block;
		}

			.header .logo > * {
				display: inline-block;
				vertical-align: middle;
			}

			.header .logo .symbol {
				margin-right: 0.65em;
			}

				.header .logo .symbol img {
					display: block;
					width: 2em;
					height: 2em;
				}

    </style>

    <script src="../assets/js/login.js"></script>
    
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
</body>
</html>