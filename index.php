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


    <title>Eventify Home Page</title>
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

    <!--Slider + Search section-->
    <section class="slider-container">
        <div class="slider-wrapper">
            <div class="slider">
                <img src="images/car 1.jpg" alt="Car" id="slide-1">
                <img src="images/car 2.jpg" alt="Car" id="slide-2">
                <img src="images/car 3.jpg" alt="Car" id="slide-3">
                <img src="images/car 4.jpg" alt="Car" id="slide-4">
            </div>

            <div class="hero-text">
                <h1>Car Events Like No other</h1>
                <p>Find out more below!</p>
            </div> 
        </div>
    </section>

    <!--Site info section-->
    <main class="main-container">
        <div class="main-body">
            <div class="row-1">
                <div class="events-vid-container">
                    <video src="videos/car vid 1.mp4" autoplay muted playsinline loop class="our-events-vid"></video>
                </div>

                <div class="events-info-container">
                    <p class="our-events-info">
                        At Eventify we bring you the best car events imaginable<br><br><br><br>
                        Book in your first car experience! Click <a href="view_events.php">here</a> 
                        for more!
                    </p>
                </div>
            </div>

            <div class="img-row">
                <img src="images/cars top view.jpg" alt="Birds eye view of cars">
                <div class="quote-container">
                    <p>“The winner ain't the one with the fastest car, it's the one who refuses to lose.” <br> - Dale Earnhardt</p>
                </div>
            </div>

            <div class="row-2">
                <div class="company-info-container">
                    <p class="our-company-info">
                        We pride ourselves on providing the best experiences<br><br><br><br>
                        This is a big dream for our company and we want to bring that dream to you!
                        Click <a href="about.php">here</a> for more!
                    </p>
                </div>

                <div class="company-vid-container">
                    <video src="videos/car vid 2.mp4" autoplay muted playsinline loop class="our-company-vid"></video>
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