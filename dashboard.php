<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: /userconnect/login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | UserConnect</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
    <h1>UserConnect</h1>
    <nav>
        <a href="php/logout.php">Cerrar sesión</a>
    </nav>
</header>

<main class="dashboard">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION["user_name"]); ?></h2>
    <p>Has iniciado sesión correctamente.</p>
</main>

<footer class="footer">
    <p>© 2026 UserConnect</p>
</footer>

</body>
</html>