<?php
// functions.php

include("function.php");
checkSession();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit;
}

include('engine.php');

try {
    // Query per leggere i dati
    $stmt = $bdd->query('SELECT * FROM hiking');
    $hikings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <h1>Liste des randonnées</h1>
   
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Difficulty</th>
            <th>Distance</th>
            <th>Duration</th>
            <th>Height Difference</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($hikings as $hiking): ?>
            <tr>
                <td><?php echo htmlspecialchars($hiking['id']); ?></td>
                <td><?php echo htmlspecialchars($hiking['name']); ?></td>
                <td><?php echo htmlspecialchars($hiking['difficulty']); ?></td>
                <td><?php echo htmlspecialchars($hiking['distance']); ?></td>
                <td><?php echo htmlspecialchars($hiking['duration']); ?></td>
                <td><?php echo htmlspecialchars($hiking['height_difference']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($hiking['id']); ?>">Update</a>
                    <form method="post" action="delete.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($hiking['id']); ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
