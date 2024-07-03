// functions.php
<?php
function checkSession() {
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.html'); // Redirige vers la page de login si l'utilisateur n'est pas connecté
        exit;
    }
}

?>