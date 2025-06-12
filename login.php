<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username']; // Or user ID
            header("Location: index.php"); // Go back to home with session set
            exit();
        } else {
            echo "<script>alert('Incorrect password'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Email not registered'); window.location.href='index.php';</script>";
    }

    $stmt->close();
}
?>
