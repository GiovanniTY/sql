<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>

<?php
include("function.php");
checkSession();

include('engine.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    try {
        $stmt = $bdd->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Debug output
            var_dump($password); 
            var_dump($user['password']); 

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header('Location: read.php');
                exit;
            } else {
                echo 'Invalid password. Please try again.';
            }
        } else {
            echo 'No user found with that username.';
        }
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
        exit;
    }
} else {
    echo 'Please enter both username and password.';
}
?>
