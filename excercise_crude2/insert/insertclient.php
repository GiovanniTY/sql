<?php
include('engine.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["name"]) && isset($_POST['prenom']) && isset($_POST["date_de_naissance"]) && isset($_POST["carte_fidelite"])) {
        $name = htmlspecialchars($_POST["name"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $date_de_naissance = htmlspecialchars($_POST["date_de_naissance"]);
        $carte_fidelite = htmlspecialchars($_POST["carte_fidelite"]);
        $numero_card = isset($_POST["numero_card"]) ? htmlspecialchars($_POST["numero_card"]) : null;
        $card_type = isset($_POST["card_type"]) ? htmlspecialchars($_POST["card_type"]) : null;

        try {
            $bdd->beginTransaction();

            // Inserimento dati cliente
            $stmt = $bdd->prepare("INSERT INTO clients (firstName, lastName, birthDate, card, cardNumber) 
            VALUES (:name, :prenom, :date_de_naissance, :carte_fidelite, :numero_card)");
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':date_de_naissance', $date_de_naissance, PDO::PARAM_STR);
            $stmt->bindParam(':carte_fidelite', $carte_fidelite, PDO::PARAM_BOOL);
            $stmt->bindParam(':numero_card', $numero_card, PDO::PARAM_INT);
            $stmt->execute();

            // Inserimento dati carta di fedeltà
            if ($carte_fidelite == 1 && $numero_card && $card_type) {
                $stmt = $bdd->prepare("INSERT INTO cards (cardNumber, cardTypesId) VALUES (:numero_card, :card_type)");
                $stmt->bindParam(":numero_card", $numero_card, PDO::PARAM_INT);
                $stmt->bindParam(":card_type", $card_type, PDO::PARAM_INT);
                $stmt->execute();
            }

            $bdd->commit();

            echo '<script>alert("Data inserted successfully!");</script>';
        } catch (PDOException $e) {
            $bdd->rollBack();
            echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
        }
    } else {
        echo '<script>alert("Please fill all the required fields!");</script>';
    }
}
?>