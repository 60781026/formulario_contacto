<?php
$nombre = isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : 'Usuario';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Mensaje Enviado</title>
    <link rel="stylesheet" href="estilos.css" />
</head>

<body>
    <div class="mensaje-enviado">
        <h2>¡Mensaje enviado correctamente!</h2>
        <p>Gracias por contactarnos, <?= $nombre ?>. Te responderemos pronto.</p>
        <a href="index.php">Volver al formulario</a>
    </div>
</body>

</html>