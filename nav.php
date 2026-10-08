<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <ul class="top-nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="view_events.php">View Events</a></li>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
            <li id="addEvents"><a href="add_events.php">Add Events</a></li>
        <?php } ?>
        <li><a href="about.php">About Us</a></li>
    </ul>
</nav>
<nav>
    <ul class="top-nav-login">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a href="login.php">Login</a></li>
        <?php } ?>
    </ul>
</nav>