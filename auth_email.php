<?php
session_start();

$conn = new mysqli("localhost", "root", "root", "eventify");

if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: index.php");
    exit;
}

$email = $_POST["email"];

$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email);

if (!$stmt->execute()) {
    $_SESSION['error'] = "Invalid email!";
    header("location: index.php");
    exit;
}

$_SESSION['success'] = "You have subscribed to our newsletter!";
header("location: index.php");
exit;

$stmt->close();
$conn->close();
?>