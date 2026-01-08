<?php
session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["nombre"];

        header("Location: /userconnect/dashboard.php");
        exit;
    } else {
        header("Location: /userconnect/login.html?error=1");
        exit;
    }
}