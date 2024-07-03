<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Visualizzazione Dati</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Clients</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Card</th>
            <th>Card Number</th>
        </tr>
        
        <?php 
        require("clients.php");
         ?>
        
    </table>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Performer</th>
            <th>Date</th>
            <th>Show Type ID</th>
            <th>First Genre ID</th>
        </tr>
        <?php include("shows.php"); ?>
    </table>
    <h3>Clients</h3>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Card</th>
            <th>Card Number</th>
        </tr>
        
        <?php 
        require("20clients.php");
         ?>
        
    </table>

    <h3>Clients with fidelity Card</h3>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Card</th>
            <th>Card Number</th>
        </tr>
        
        <?php 
        require("clients_card.php");
         ?>
        
    </table>

    <h3>Clients with name started M</h3>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Card</th>
            <th>Card Number</th>
        </tr>
        
        <?php 
        require("clientsM.php");
         ?>
        
    </table>
  
</body>
</html>
