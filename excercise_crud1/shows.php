<?php
include('engine.php');

// Query per leggere i dati dalla tabella shows
$stmt = $bdd->query('SELECT * FROM shows');
$shows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output dei dati
foreach ($shows as $show) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($show['id']) . '</td>';
    echo '<td>' . htmlspecialchars($show['title']) . '</td>';
    echo '<td>' . htmlspecialchars($show['performer']) . '</td>';
    echo '<td>' . htmlspecialchars($show['date']) . '</td>';
    echo '<td>' . htmlspecialchars($show['showTypesId']) . '</td>';
    echo '<td>' . htmlspecialchars($show['firstGenresId']) . '</td>';
    echo '</tr>';
}
?>
