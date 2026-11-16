<?php
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $version  = $pdo->query('SELECT VERSION()')->fetchColumn();
    $mensajes = $pdo->query('SELECT id, texto FROM mensajes')->fetchAll(PDO::FETCH_ASSOC);
    $estado   = "Conectado a MySQL $version";
} catch (PDOException $e) {
    $mensajes = [];
    $estado   = 'Error de conexión: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hola Mundo PHP + MySQL</title>
</head>
<body>
  <h1>Hola Mundo</h1>
  <p><strong>Estado de la base de datos:</strong> <?= htmlspecialchars($estado) ?></p>
  <?php if ($mensajes): ?>
  <h2>Mensajes desde la tabla <code>mensajes</code></h2>
  <ul>
    <?php foreach ($mensajes as $m): ?>
    <li><?= (int)$m['id'] ?>. <?= htmlspecialchars($m['texto']) ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</body>
</html>
