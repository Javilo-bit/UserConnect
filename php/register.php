<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: ../register.html");
  exit;
}

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = $_POST["password"];

if ($name === "" || $email === "" || $password === "") {
  die("Datos incompletos.");
}

// Verificar email duplicado
$stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
  die("El correo ya está registrado.");
}

$stmt->close();

// Hash de contraseña
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insertar usuario
$stmt = $conn->prepare(
  "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $name, $email, $hashedPassword);

if ($stmt->execute()) {
  header("Location: ../login.html");
  exit;
} else {
  die("Error al registrar usuario.");
}