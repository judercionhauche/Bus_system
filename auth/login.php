<?php
define("APPURL", "http://localhost/bus_system/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!--Link to external CSS stylesheet-->
    <link rel="stylesheet" href="<?php echo APPURL; ?>assests/css/login.css"/>
    <title>Login/Register Page</title>
</head>
<body>
<!--Main Container-->
<div class="container">
    <div class="row">

        <!--Sign up form section-->
        <section class="form sign-up active">
            <h1>Ashesi Bus System</h1>
            <h2>Sign up</h2>

            <!--Register form-->
            <form id="Register" method="POST" action="../actions/signup_action.php">

                <div class="form-group">

                    <!--First name input-->
                    <div class="form-control">
                        <label>First Name</label>
                        <input type="text" name="first_name" id="firstName"/>
                        <div id="firstNameError" class="error-message"></div>
                    </div>

                    <!--Last name input-->
                    <div class="form-control">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="lastName"/>
                        <div id="lastNameError" class="error-message"></div>
                    </div>
                </div>

                <div class="form-group">
                    <!--Email address input-->
                    <div class="form-control">
                        <label>Email</label>
                        <input type="email" name="email" id="email" autocomplete="new-username"/>
                        <div id="emailError" class="error-message"></div>
                    </div>
                </div>


                <div class="form-group">

                    <!-- Password-->
                    <div class="form-control">
                        <label>Password</label>
                        <input type="password" name="password" id="password" autocomplete="new-password"/>
                        <div id="passwordError" class="error-message"></div>
                    </div>

                    <!-- Confirm password input -->
                    <div class="form-control">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirmPassword" autocomplete="new-password"/>
                        <div id="confirmPasswordError" class="error-message"></div>
                    </div>
                </div>

                <!-- Phone number -->
                <div class="form-group">
                    <div class="form-control">
                        <label>Phone Number</label>
                        <input type="tel" name="phone_number" id="phoneNumber"/>
                        <div id="phoneNumberError" class="error-message"></div>
                    </div>
                </div>

                <!-- Role selection -->
                <div class="form-group">
                    <div class="form-control">
                        <label for="role-selection">Select Role</label>
                        <select name="role" id="role-selection">
                            <option value="">--Select Role--</option>
                            <option value="staff">Staff</option>
                            <option value="driver">Driver</option>
                        </select>
                    </div>
                </div>

                <!-- Submit button for sign-up form -->
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
            </form>

            <!-- Success message display -->
            <div id="successMessage">Registration Completed</div>

        </section>

        <!-- Sign-in form section -->
        <section class="form sign-in">
            <h1>Ashesi Bus System</h1>
            <h2>Sign in</h2>

            <!-- Login form -->
            <form id="login" method="POST" action="../actions/login_action.php">
                <div class="form-group">

                    <!-- Email address input -->
                    <div class="form-control">
                        <label>Email Address</label>
                        <input type="email" name="email" id="emailLogin" autocomplete="username"/>
                        <div id="emailLoginError" class="error-message"></div>
                    </div>
                </div>

                <!-- Password input -->
                <div class="form-group">
                    <div class="form-control">
                        <label>Password</label>
                        <input type="password" name="password" id="passwordLogin" autocomplete="new-password"/>
                        <div id="passwordLoginError" class="error-message"></div>
                    </div>
                </div>

                <!-- Submit button for sign-in form -->
                <div class="form-group">
                    <button type="submit">Sign In</button>
                </div>
            </form>
        </section>

        <!-- Corner logo image -->
        <img src="<?php echo APPURL; ?>images/Ashesi_logo.jpg" class="corner-image" alt="Ashesi Logo">
    </div>
    <!-- Navigation buttons for toggling between forms -->
    <ul class="bottom">
        <li class="btn active" data-btn="sign-up">Sign Up</li>
        <li class="btn" data-btn="sign-in">Sign In</li>
    </ul>
</div>

<!-- JavaScript for toggling between sign in and sign up -->
<script src="<?php echo APPURL; ?>assests/js/login.js"></script>
</body>
</html>
