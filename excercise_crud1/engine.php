<?php
try {
    // Connessione al database MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    // Imposta l'attributo PDO per visualizzare gli errori
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussi";
} catch (PDOException $e) {
    echo "Errore di connessione al database: " . $e->getMessage();
    exit;
}
?>