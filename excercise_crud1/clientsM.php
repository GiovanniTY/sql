<?php
include("engine.php");

try {
    
    $stmt = $bdd->prepare("SELECT CONCAT('Nom : ', lastName) AS Nom, CONCAT('Prénom : ', firstName) AS Prénom
    FROM clients
    WHERE lastName LIKE 'M%'
    ORDER BY lastName ASC, firstName ASC");

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