<?php
include('engine.php');

try {
    $stmt = $bdd->query('SELECT id, firstName, lastName, birthDate FROM clients');
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des clients</title>
</head>
<body>
    <h1>Liste des événements</h1>
    <ul>
        <?php foreach ($clients as $client): ?>
            <li>
                <?php echo htmlspecialchars($client['firstName']); ?>
                <?php echo htmlspecialchars($client['lastName']); ?>
                <?php echo htmlspecialchars($client['birthDate']); ?>
                <a href="update.php?id=<?php echo $client['id']; ?>">Modifier</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
