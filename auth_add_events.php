<?php
session_start();

$conn = new mysqli("localhost", "root", "root", "eventify");

if($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: login.php");
    exit;
}

$event_name = $_POST['event-name'];
$event_description = $_POST['event-description'];
$vehicle_type = $_POST['vehicle-type'];
$keywords = $_POST['keywords'];
$location = $_POST['location'];
$event_date = $_POST['event-date'];

$stmt = $conn->prepare("INSERT INTO event_details (event_name, event_description,
vehicle_type, keywords, location, event_date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $event_name, $event_description, $vehicle_type, $keywords, 
$location, $event_date);

if (!$stmt->execute()) {
    $_SESSION['error'] = "Invalid input";
    header("Location: login.php");
    exit;
}

$_SESSION['success'] = "Event successfully added to the database!";
header("Location: login.php");
exit;

$stmt->close();
$conn->close();
?>