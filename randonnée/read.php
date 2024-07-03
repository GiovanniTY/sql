<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
      <?php
      include('create.php')
      ?>
    
    <table>
      <!-- Afficher la liste des randonnées -->
      <?php
         include('engine.php');
        
        // Query pour lire les donnes 
        $stmt = $pdo->query('SELECT * FROM hiking');
        $hikings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Output des donnes
       
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height_Difference</th></tr>';
        foreach ($hikings as $hiking) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($hiking['id']) . '</td>';
        echo '<td>' . htmlspecialchars($hiking['name']) . '</td>';
        echo '<td>' . htmlspecialchars($hiking['difficulty']) . '</td>';
        echo '<td>' . htmlspecialchars($hiking['distance']) . '</td>';
        echo '<td>' . htmlspecialchars($hiking['duration']) . '</td>';
        echo '<td>' . htmlspecialchars($hiking['height_difference']) . '</td>';
        echo '<td>
                <a href="update.php?id=' . htmlspecialchars($hiking['id']) . '">Update</a> 
                <form method="post" action="delete.php" style="display:inline;">
                    <input type="hidden" name="id" value="' . htmlspecialchars($hiking['id']) . '">
                    <input type="submit" value="Delete">
                </form>
              </td>';
        echo '</tr>';
    }
    echo '</table>';
   ?>
    </table>
  </body>
</html>