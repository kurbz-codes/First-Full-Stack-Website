<?php
session_start();

$conn = new mysqli("localhost", "root", "root", "eventify");

if ($conn->connect_error) {
    $_SESSION['error'] = "Database connection failed.";
    header("Location: login.php");
    exit;
}

$username = $_POST['login-username'];
$password = $_POST['login-password'];

$stmt = $conn->prepare("SELECT user_id, user_name, password, role FROM user_details WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    if (password_verify($password, $row['password'])) {

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['user_name'];
        $_SESSION['role'] = $row['role'];

        $_SESSION['success'] = "Login Successful! Welcome " . $username;
        header("Location: index.php");
        exit;

    } else {
        $_SESSION['error'] = "Invalid credentials!"; // password related
        header("Location: login.php");
        exit;
    }

} else {
    $_SESSION['error'] = "Invalid credentials!"; // username related
    header("Location: login.php");
    exit;
}

$stmt->close();
$conn->close();
?>