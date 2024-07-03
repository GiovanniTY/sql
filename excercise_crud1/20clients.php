<?php
include("engine.php");

try {
    
    $stmt = $bdd->prepare('SELECT * FROM clients LIMIT 20');
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($clients as $client) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($client['id']) . '</td>';
        echo '<td>' . htmlspecialchars($client['firstName']) . '</td>';
        echo '<td>' . htmlspecialchars($client['lastName']) . '</td>';
        echo '<td>' . htmlspecialchars($client['birthDate']) . '</td>';
        echo '<td>' . htmlspecialchars($client['card']) . '</td>';
        echo '<td>' . htmlspecialchars($client['cardNumber']) . '</td>';
        echo '</tr>';
    }
} catch (PDOException $e) {
    echo "Errore nella query: " . $e->getMessage();
}
?>