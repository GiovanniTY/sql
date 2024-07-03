<?php
    // Connexion à la base de données
    include("engine.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = htmlspecialchars($_POST['id']);
        
        try {
            // Prépare la query de suppression
            $stmt = $pdo->prepare('DELETE FROM hiking WHERE id = :id');
            $stmt->execute([':id' => $id]);

            echo "Randonnée éliminée avec succès !";
            header('Location: read.php'); // Rediriger vers la page principale
            exit();
        } catch(PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }
    } else {
        echo "ID invalide!";
    }
?>