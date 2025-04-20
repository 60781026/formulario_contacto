<?php
$errores = [];
$nombre = $correo = $mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $mensaje = trim($_POST["mensaje"]);

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }

    if (empty($correo)) {
        $errores[] = "El correo es obligatorio.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no es válido.";
    }

    if (empty($mensaje)) {
        $errores[] = "El mensaje no puede estar vacío.";
    }

    if (empty($errores)) {
        // Simular envío redirigiendo a otra página
        header("Location: procesar.php?nombre=" . urlencode($nombre));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="estilos.css" />
</head>

<body>
    <div class="form-container">
        <h2>Contacto</h2>

        <?php if (!empty($errores)): ?>
            <div class="errores">
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="nombre" placeholder="Nombre completo" value="<?= htmlspecialchars($nombre) ?>" />
            <input type="email" name="correo" placeholder="Correo electrónico" value="<?= htmlspecialchars($correo) ?>" />
            <textarea name="mensaje" rows="5" placeholder="Escribe tu mensaje"><?= htmlspecialchars($mensaje) ?></textarea>
            <button type="submit">Enviar mensaje</button>
        </form>
    </div>
</body>

</html>