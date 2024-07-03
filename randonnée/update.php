<?php
include('engine.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])) {
        // Récupérer et nettoyer les données du formulaire
        $id = htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $difficulty = htmlspecialchars($_POST['difficulty']);
        $distance = htmlspecialchars($_POST['distance']);
        $duration = htmlspecialchars($_POST['duration']);
        $height_difference = htmlspecialchars($_POST['height_difference']);

        // Mettre à jour les données de randonnée
        $stmt = $pdo->prepare('UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE id = :id');
        $stmt->execute([
            ':name' => $name,
            ':difficulty' => $difficulty,
            ':distance' => $distance,
            ':duration' => $duration,
            ':height_difference' => $height_difference,
            ':id' => $id
        ]);

        echo "<script>alert('Données mises à jour avec succès!');</script>";
    } elseif (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);

        // Récupère les données de la randonnée spécifiée
        $stmt = $pdo->prepare('SELECT * FROM hiking WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $hiking = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$hiking) {
            echo 'Randonnée non trouvée';
            exit;
        }
    } else {
        echo 'ID non spécifié';
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Randonnée</title>
</head>
<body>
    <h1>Update Randonnée</h1>
    <?php if (isset($hiking)): ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($hiking['id']); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($hiking['name']); ?>" required><br>
            <label for="difficulty">Difficulty:</label>
            <select name="difficulty" required>
                <option value="très facile" <?php if ($hiking['difficulty'] == 'très facile') echo 'selected'; ?>>Très facile</option>
                <option value="facile" <?php if ($hiking['difficulty'] == 'facile') echo 'selected'; ?>>Facile</option>
                <option value="moyen" <?php if ($hiking['difficulty'] == 'moyen') echo 'selected'; ?>>Moyen</option>
                <option value="difficile" <?php if ($hiking['difficulty'] == 'difficile') echo 'selected'; ?>>Difficile</option>
                <option value="très difficile" <?php if ($hiking['difficulty'] == 'très difficile') echo 'selected'; ?>>Très difficile</option>
            </select><br>
            <label for="distance">Distance:</label>
            <input type="text" name="distance" value="<?php echo htmlspecialchars($hiking['distance']); ?>" required><br>
            <label for="duration">Duration:</label>
            <input type="text" name="duration" value="<?php echo htmlspecialchars($hiking['duration']); ?>" required><br>
            <label for="height_difference">Height Difference:</label>
            <input type="text" name="height_difference" value="<?php echo htmlspecialchars($hiking['height_difference']); ?>" required><br>
            <input type="submit" value="Update">
        </form>
    <?php endif; ?>
</body>
</html>
