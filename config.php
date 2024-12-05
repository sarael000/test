<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=adn", "utilisateur", "mot_de_passe");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
