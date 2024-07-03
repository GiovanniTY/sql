<?php
include('engine.php');

// Dati di esempio per aggiungere utenti
$users = [
    ['username' => 'alice', 'password' => 'password_alice'],
    ['username' => 'bob', 'password' => 'password_bob'],
    ['username' => 'charlie', 'password' => 'password_charlie']
];

try {
    $stmt = $bdd->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');

    foreach ($users as $user) {
        $username = $user['username'];
        $password = password_hash($user['password'], PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        echo "User $username added successfully.<br>";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}
?>
