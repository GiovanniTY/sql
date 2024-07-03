<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter un client</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <h1>Client</h1>
    <form action="" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="" required>
        </div>

        <div>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" value="" required>
        </div>

        <div>
            <label for="date_de_naissance">Date de Naissance</label>
            <input type="date" name="date_de_naissance" value="" required>
        </div>

        <div>
            <label>Vous avez une carte de fidélité?</label><br>
            <input type="radio" id="yes" name="carte_fidelite" value="1" required>
            <label for="yes">Oui</label><br>
            <input type="radio" id="no" name="carte_fidelite" value="0" required>
            <label for="no">Non</label><br><br>
        </div>

        <div id="card-details" style="display: none;">
            <div>
                <label for="card_type">Type de Carte</label>
                <select name="card_type">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div>
                <label for="numero_card">Numero Carte de fidélité</label>
                <input type="number" name="numero_card" value="">
            </div>
        </div>

        <button type="submit" name="button">Envoyer</button>
    </form>

    <script>
    document.querySelectorAll('input[name="carte_fidelite"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value == '1') {
                document.getElementById('card-details').style.display = 'block';
            } else {
                document.getElementById('card-details').style.display = 'none';
            }
        });
    });
    </script>

<?php
include("insertclient.php");

?>
<form action="" method="post">
        <div>
            <label for="titre">Titre</label>
            <input type="text" name="titre" value="" required>
        </div>

        <div>
            <label for="artiste">Artiste</label>
            <input type="text" name="artiste" value="" required>
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" value="" required>
        </div>

        <div>
        <label for="duration">Durée de l'événement </label>
        <input type="time" id="duration" name="duration" min="00:00" max="24:00" step="600">

        </div>

            <div>
                <label for="shows_type">Type de shows</label>
                <select name="shows_type">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div>
                <label for="firstGenresId">Type de shows</label>
                <select name="firstGenresId">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            <div>
                <label for="secondGenreId">Type de shows</label>
                <select name="secondGenreId">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            <div>
            <label for="start_time">Heure de début de l'événement</label>
            <input type="time" id="start_time" name="start_time">

            </div>

            

        <button type="submit" name="button">Envoyer</button>
    </form>

<?php

include("insertshow.php");

?>




</body>
</html>
