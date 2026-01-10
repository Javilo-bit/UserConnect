<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

session_start();

header("Content-Type: application/json");

require_once __DIR__ . "/../../php/config.php";
require_once __DIR__ . "/../../php/classes/User.php";

// Seguridad: solo usuarios logueados
if (!isset($_SESSION["user_id"])) {
    http_response_code(401);
    echo json_encode([
        "success" => false,
        "message" => "No autorizado"
    ]);
    exit;
}

// Obtener datos del usuario con POO
$userModel = new User($conn);
$user = $userModel->getById($_SESSION["user_id"]);

if (!$user) {
    http_response_code(404);
    echo json_encode([
        "success" => false,
        "message" => "Usuario no encontrado"
    ]);
    exit;
}

// Respuesta JSON
echo json_encode([
    "success" => true,
    "data" => [
        "id" => $user["id"],
        "nombre" => $user["nombre"],
        "email" => $user["email"]
    ]
]);