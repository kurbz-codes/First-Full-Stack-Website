<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
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

    <title>Eventify Add Events Page</title>
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
            <h1>Add event</h1>
            <div class="row-1">
                <div class="form-container">
                    <form id="add-events" action="auth_add_events.php" method="post" onsubmit="">
                        <label for="Event Name">Event Name:</label><br>
                        <input type="text" id="event-name" name="event-name" required><br>

                        <label for="Event Description">Event Description:</label><br>
                        <input type="text" id="event-description" name="event-description" required><br>

                        <label for="Vehicle Type">Vehicle Type:</label><br>
                        <input type="text" id="vehicle-type" name="vehicle-type" required><br>

                        <label for="Keywords">Keywords:</label><br>
                        <input type="text" id="keywords" name="keywords" required><br>

                        <label for="Location">Location:</label><br>
                        <input type="text" id="location" name="location" required><br>

                        <label for="Date">Date:</label><br>
                        <input type="date" id="event-date" name="event-date" required><br><br>

                        <input type="submit" value="Add Event"><br>
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