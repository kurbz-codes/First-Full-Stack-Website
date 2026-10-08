<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Joshim Kirby">
    <meta name="description" content="Events website home page">
    <meta name="keywords" content="events, homepage, HTML">
    <link rel="stylesheet" href="styles.css?v=999"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap">
    <link rel="stylesheet" href="https://iconawesome.com/assets/css/awesomeIcon.css">

    <title>Eventify Login Page</title>
</head>

<body>
    <!--Toast messages-->
    <?php if (isset($_SESSION['error'])) { ?>
        <div class="toast-message error" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']);
    } ?>

    <?php if (isset($_SESSION['success'])) { ?>
        <div class="toast-message success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']);
    } ?>

    <!--Header section-->
    <header class="top-nav">
        <h1>
            <a href="index.php" title="Home"><img src="images/eventify.png" alt="Eventify Logo" class="logo"></a>
        </h1>
        <?php include "nav.php" ?>
    </header>

    <div class="login-hero-background">
    </div>

    <main class="main-container">
        <div class="main-body">
            <h1>Log In</h1>
            <h2>Scroll for signup</h2>
            <div class="row-1">
                <div class="form-container">
                    <form id="login" action="auth_login.php" method="post" onsubmit="">
                        <label for="Username">Username:</label><br>
                        <input type="text" id="login-username" name="login-username" required><br>

                        <label for="Password">Password:</label><br>
                        <input type="password" id="login-password" name="login-password" required><br><br>

                        <input type="submit" value="Log In"><br>
                    </form>
                </div>
            </div>
            
            <div class="row-2">
                <hr><h1>Or</h1><hr>
            </div>

            <h1>Sign Up</h1>
            <div class="row-3">
                <div class="form-container">
                    <form id="sign-up" action="/SEN4001_WRIT1/auth_signup.php" method="post">
                        <label for="First name">First Name:</label><br>
                        <input type="text" id="first-name" name="first-name" required><br>

                        <label for="Surname">Surname:</label><br>
                        <input type="text" id="surname" name="surname" required><br>

                        <label for="Username">Username:</label><br>
                        <input type="text" id="signup-username" name="signup-username" required><br>

                        <label for="Password">Password:</label><br>
                        <input type="password" id="signup-password" name="signup-password" required><br>

                        <label for="Confirm Password">Confirm Password:</label><br>
                        <input type="password" id="confirm-password" name="confirm-password" required><br><br>

                        <input type="submit" value="Sign Up"><br>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!--Footer section-->
    <footer>
        <?php include "footer.php" ?>
    </footer>
<script src="scripts.js"></script>
</body>
</html>