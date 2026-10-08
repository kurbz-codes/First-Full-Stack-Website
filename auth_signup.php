<?php
session_start();

$conn = new mysqli("localhost", "root", "root", "eventify");

// if database fails
if($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: login.php");
    exit;
}

$forename = $_POST['first-name'];
$surname = $_POST['surname'];
$username = $_POST['signup-username'];
$password = $_POST['signup-password'];
$confirm = $_POST['confirm-password'];

// check passwords are the same
if ($password !== $confirm) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: login.php");
    exit;
}

// check if username already exists
$check = $conn->prepare("SELECT user_name FROM user_details WHERE user_name = ?");
$check->bind_param("s", $username);
$check->execute();

$result = $check->get_result();

if ($result->num_rows > 0) {
    $_SESSION['error'] = "Username already exists.";
    header("Location: login.php");
    exit;
}

$check->close(); // continue auth

$hashed_pass = password_hash($password, PASSWORD_BCRYPT);
$role = "user";

$stmt = $conn->prepare("INSERT INTO user_details (forename, surname, user_name, password, role) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $forename, $surname, $username, $hashed_pass, $role);

if (!$stmt->execute()) {
    $_SESSION['error'] = "Username already exists or invalid input.";
    header("Location: login.php");
    exit;
}

$_SESSION['success'] = "Signup successful! You can now login.";
header("Location: login.php");
exit;

$stmt->close();
$conn->close();
?>