<?php
$servername = "sql312.infinityfree.com"; // Par exemple: localhost
$username = "if0_37486216";
$password = "yyl3hxqCt3q";
$dbname = "if0_37486216_Sandras";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}
echo "Connexion réussie";
$conn->close();
?>
