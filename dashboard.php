<?php
/* ================== MODO DESARROLLO ================== */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* ================== SESIÓN ================== */
session_start();

/* ================== SEGURIDAD ================== */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
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

    <!-- ===================== HEADER ===================== -->
    <header class="header">
        <h1>UserConnect</h1>
        <nav>
            <a href="php/logout.php">Cerrar sesión</a>
        </nav>
    </header>

    <!-- ===================== CONTENIDO PRINCIPAL ===================== -->
    <main class="dashboard-container">

        <!-- BIENVENIDA -->
        <section class="dashboard-welcome">
            <h2>
                Bienvenido,
                <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </h2>
            <p>Has iniciado sesión correctamente.</p>
        </section>

        <!-- BLOQUES DE INFORMACIÓN -->
        <section class="dashboard-cards">

            <!-- PERFIL -->
            <div class="dashboard-card">
                <h3>Perfil</h3>
                <p>
                    <strong>Nombre:</strong>
                    <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </p>
            </div>

            <!-- ESTADO DE LA CUENTA -->
            <div class="dashboard-card">
                <h3>Estado de la cuenta</h3>
                <p>Cuenta activa</p>
                <p>Acceso seguro mediante sesiones PHP</p>
            </div>

            <!-- ARQUITECTURA -->
            <div class="dashboard-card">
                <h3>Arquitectura</h3>
                <p>Frontend: HTML, CSS, JavaScript</p>
                <p>Backend: PHP + MySQL</p>
                <p>Modelo POO aplicado</p>
            </div>

        </section>

        <!-- BLOQUE AJAX -->
        <section class="dashboard-ajax">
            <h3>Datos dinámicos</h3>
            <button id="loadDataBtn">Cargar información</button>
            <div id="ajaxResult"></div>
        </section>

    </main>

    <!-- ===================== FOOTER ===================== -->
    <footer class="footer">
        <p>© 2026 UserConnect</p>
    </footer>

    <!-- ===================== JS ===================== -->
    <script src="js/script.js"></script>

</body>
</html>