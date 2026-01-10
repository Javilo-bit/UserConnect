<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "config.php";
require_once __DIR__ . "/classes/User.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../register.html");
    exit;
}

// Recoger datos
$name     = trim($_POST["name"]);
$email    = trim($_POST["email"]);
$password = $_POST["password"];

// Validación mínima servidor
if ($name === "" || $email === "" || $password === "") {
    die("Datos incompletos.");
}

// Instanciar clase User
$user = new User($conn);

// Comprobar si el email ya existe
if ($user->emailExists($email)) {
    die("El correo ya está registrado.");
}

// Registrar usuario
if ($user->register($name, $email, $password)) {
    header("Location: ../login.html");
    exit;
} else {
    die("Error al registrar usuario.");
}