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

    <title>Eventify About Page</title>
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

    <div class="au-hero-text-container">
        <div class="hero-text">
            <h1>About Us</h1>
            <p>Who we are, FAQ's and how we work!</p>
        </div>
    </div>

    <main class="main-container">
        <div class="main-body">
            <h1>Who we are</h1>
            <div class="row-1">
                <div class="about-us-img-container">
                    <img src="images/pit stop.jpg" alt="Car at a pit stop">
                </div>

                <div class="about-us-info-container">
                    <p class="about-us-info">
                        At Eventify, we're passionate about bringing car enthusiasts together 
                        through unforgettable events. Our platform is designed to connect drivers, 
                        collectors, and fans with the best car meets, shows, and motorsport 
                        experiences in one place. Whether you're showcasing a unique build, 
                        discovering local car culture, or simply enjoying the atmosphere of 
                        a great automotive gathering, Eventify makes it easy to find and be 
                        part of the action. Built by enthusiasts for enthusiasts, our mission 
                        is to make car events more accessible, organised, and exciting for 
                        everyone who loves the automotive world.
                    </p>
                </div>
            </div>

            <h1 id="organising-events">How we organise our events</h1>
            <div class="row-2">
                <div class="about-us-info-container">
                    <h3>Thoughtful Planning</h3><br>
                    <p class="about-us-info">
                        We start by selecting the right venue and format for each event, 
                        whether it's a relaxed meet-up, a curated showcase, or a high-energy 
                        driving experience. Location, accessibility, and atmosphere all play 
                        a key role in shaping the event.
                    </p><br>

                    <h3>Community-Focused Approach</h3><br>
                    <p class="about-us-info">
                        Our events are built around people as much as cars. We aim to create
                         a welcoming environment where enthusiasts can connect, share stories, 
                         and celebrate their passion together. From first-time attendees to 
                         seasoned petrolheads, everyone has a place.
                    </p><br>

                    <h3>Safety & Respect</h3><br>
                    <p class="about-us-info">
                        We prioritise safety and responsible behaviour at all our events. Clear
                         guidelines and well-managed spaces help maintain a positive environment
                          for attendees, vehicles, and the surrounding community.
                    </p>
                </div>  

                <div class="about-us-img-container">
                    <img src="images/organising.jpg" alt="Group meeting in an office">
                </div>
            </div>

            <h1 id="faq">Frequently Asked Questions!</h1>
            <div class="row-3">
                <div class="about-us-img-container">
                    <img src="images/car with blur.jpg" alt="Back of a car with blurred people passing">
                </div>

                <div class="about-us-info-container">
                    <h3>What types of events do you organise?</h3><br>
                    <p class="about-us-info">
                        We host a variety of car-focused events, including relaxed meet-ups, curated
                         showcases, themed gatherings, and driving experiences. Each event is designed 
                         to bring together enthusiasts and celebrate all aspects of car culture.
                    </p><br>

                    <h3>Do I need a specific type of car to attend?</h3><br>
                    <p class="about-us-info">
                        Not at all. Our events are open to all car enthusiasts, whether you own a 
                        classic, a supercar, a modified build, or simply have a passion for cars. 
                    </p><br>

                    <h3>How do I register for an event?</h3><br>
                    <p class="about-us-info">
                        You can register directly through our website by selecting the event you're 
                        interested in and following the booking process. We recommend signing up early,
                         as spaces for both vehicles and attendees can be limited.
                    </p>
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