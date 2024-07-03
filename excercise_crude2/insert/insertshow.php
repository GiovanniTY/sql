<?php


include('engine.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['titre']) &&
        isset($_POST['artiste']) &&
        isset($_POST['date']) &&
        isset($_POST['duration']) &&
        isset($_POST['shows_type']) &&
        isset($_POST['firstGenresId']) &&
        isset($_POST['secondGenreId'])  &&
        isset($_POST['start_time'])
    ) {
        $titre = htmlspecialchars($_POST['titre']);
        $artiste = htmlspecialchars($_POST['artiste']);
        $date = htmlspecialchars($_POST['date']);
        $duration = htmlspecialchars($_POST['duration']);
        $shows_type = htmlspecialchars($_POST['shows_type']);
        $firstGenresId = htmlspecialchars($_POST['firstGenresId']);
        $secondGenreId = htmlspecialchars($_POST['secondGenreId']);
        $start_time = htmlspecialchars($_POST['start_time']);

        try {
            $bdd->beginTransaction();

            $stmt = $bdd->prepare('INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime)
                                  VALUES (:titre, :artiste, :date, :shows_type,:firstGenresId, :secondGenreId, :duration, :start_time)');
            $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
            $stmt->bindParam(':artiste', $artiste, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':shows_type', $shows_type, PDO::PARAM_INT);
            $stmt->bindParam(':firstGenresId', $firstGenresId, PDO::PARAM_INT);
            $stmt->bindParam(':secondGenreId', $secondGenreId, PDO::PARAM_INT);
            $stmt->bindParam(':duration', $duration, PDO::PARAM_STR);
            $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);

            $stmt->execute();
            $bdd->commit();

            echo '<script>alert("Data inserted successfully!");</script>';
        } catch (PDOException $e) {
            $bdd->rollBack();
            echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
        }
    } else {
        echo '<script>alert("Please fill all the required fields!");</script>';
    }
}

?>