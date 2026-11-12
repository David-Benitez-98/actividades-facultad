
<?php
// Configuración de seguridad de la cookie
session_set_cookie_params([
    'httponly' => true,
    'secure' => false, // Cambiar a true cuando se utilice HTTPS
    'samesite' => 'Lax'
]);

// Iniciar sesión
session_start();

// Procesar el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = trim($_POST['usuario'] ?? '');

    if ($usuario !== '') {

        // Regenerar el identificador de sesión
        session_regenerate_id(true);

        // Guardar el usuario en la sesión
        $_SESSION['usuario'] = $usuario;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad 1 - Sesiones PHP</title>
</head>
<body>

    <h2>Configuración segura de sesiones PHP</h2>

    <form method="POST">
        <label>Nombre de usuario:</label>
        <input type="text" name="usuario" required>
        <button type="submit">Iniciar sesión</button>
    </form>

    <?php if (isset($_SESSION['usuario'])): ?>

        <h3>Sesión iniciada correctamente</h3>

        <p>
            Usuario:
            <?= htmlspecialchars($_SESSION['usuario']) ?>
        </p>

        <p>
            ID de sesión:
            <?= htmlspecialchars(session_id()) ?>
        </p>

        <p>Estado: Sesión activa</p>

    <?php endif; ?>

</body>
</html>
