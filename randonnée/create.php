<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/php-pdo/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php
//chech if form data base been submitted
if (isset($_POST["name"]) && isset($_POST["difficulty"]) && isset($_POST["distance"]) 
&& isset($_POST["duration"]) && isset($_POST["height_difference"])) {
    //retrieve and sanitize form fata 
    $name = htmlspecialchars($_POST["name"]);
    $difficulty = htmlspecialchars($_POST["difficulty"]);
    $distance = htmlspecialchars($_POST["distance"]);
    $duration = htmlspecialchars($_POST["duration"]);
    $height_difference = htmlspecialchars($_POST["height_difference"]);
    
    //Database connexion
include('engine.php');
//prepare and execute sql statement

$stmt = $pdo->prepare("INSERT INTO hiking
(name, difficulty, distance, duration, height_difference) 
VALUES (:name , :difficulty , :distance, :duration, :height_difference)");
$stmt->execute([
    ':name' => $name,
    ':difficulty'=> $difficulty,
    ':distance'=> $distance,
    ':duration'=> $duration,
    ':height_difference'=> $height_difference
    ]);
    
   // Success message
   echo '<script>alert("Data inserted successfully!");</script>';
} else {
echo '<script>alert("Please fill all the fields!");</script>';
}
?>