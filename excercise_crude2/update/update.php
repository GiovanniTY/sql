<?php
include('engine.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['id']) &&
        isset($_POST['firstName']) &&
        isset($_POST['lastName']) &&
        isset($_POST['birthDate'])
    ) {
        $id = htmlspecialchars($_POST['id']);
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $birthDate = htmlspecialchars($_POST['birthDate']);

        try {
            $stmt = $bdd->prepare('UPDATE clients SET firstName = :firstName, lastName = :lastName, birthDate = :birthDate WHERE id = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':birthDate', $birthDate, PDO::PARAM_STR);
            $stmt->execute();

            echo '<script>alert("Data updated successfully!");</script>';
        } catch (PDOException $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
        }
    } else {
        echo '<script>alert("Please fill all the required fields!");</script>';
    }
}

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    try {
        $stmt = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$client) {
            echo '<script>alert("Record not found");</script>';
            exit;
        }
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
        exit;
    }
} else {
    echo '<script>alert("No record selected");</script>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier</title>
</head>
<body>
    <h1>Modifier une information</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $client['id']; ?>">

        <div>
            <label for="firstName">firstName</label>
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($client['firstName']); ?>" required>
        </div>

        <div>
            <label for="lastName">lastName</label>
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($client['lastName']); ?>" required>
        </div>

        <div>
            <label for="birthDate">birthDate</label>
            <input type="date" name="birthDate" value="<?php echo htmlspecialchars($client['birthDate']); ?>" required>
        </div>

        <button type="submit" name="button">Envoyer</button>
    </form>
</body>
</html>
