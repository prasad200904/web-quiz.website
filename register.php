<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u_Name = $_POST['username'];
    $u_email = $_POST['email'];
    $u_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $u_Name, $u_email, $u_password);

    if ($stmt->execute()) {
        $_SESSION['user'] = $u_Name; // ✅ Fixed here
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Email already exists or registration failed'); window.location.href='index.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
