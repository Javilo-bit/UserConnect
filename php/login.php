<?php
session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/classes/User.php';

/*
|--------------------------------------------------------------------------
| Aceptar únicamente peticiones POST
|--------------------------------------------------------------------------
*/
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.html');
    exit;
}

/*
|--------------------------------------------------------------------------
| Recoger datos del formulario
|--------------------------------------------------------------------------
*/
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

/*
|--------------------------------------------------------------------------
| Validación mínima en servidor
|--------------------------------------------------------------------------
*/
if (empty($email) || empty($password)) {
    header('Location: ../login.html?error=1');
    exit;
}

/*
|--------------------------------------------------------------------------
| Instanciar modelo User
|--------------------------------------------------------------------------
*/
$userModel = new User($conn);

/*
|--------------------------------------------------------------------------
| Intentar login
|--------------------------------------------------------------------------
*/
$loginResult = $userModel->login($email, $password);

/*
|--------------------------------------------------------------------------
| Resultado del login
|--------------------------------------------------------------------------
*/
if ($loginResult['success'] === true) {
    // Seguridad extra
    session_regenerate_id(true);

    $_SESSION['user_id']   = $loginResult['user']['id'];
    $_SESSION['user_name'] = $loginResult['user']['nombre'];

    header('Location: ../dashboard.php');
    exit;
}

/*
|--------------------------------------------------------------------------
| Error de login → volver al formulario
|--------------------------------------------------------------------------
*/
header('Location: ../login.html?error=1');
exit;