<?php
session_start();
if ($_SESSION['role'] !== 'etudiant') {
    header("Location: https://sarael000.github.io/test/login.php");
    exit();
}

echo "<h1>Bienvenue Étudiant</h1>";
echo "<a href='voir_tests.php'>Voir les tests</a><br>";
echo "<a href='consulter_resultats.php'>Consulter les résultats</a><br>";
?>
