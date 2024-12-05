<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

echo "<h1>Bienvenue Admin</h1>";
echo "<a href='ajouter_formateur.php'>Ajouter un formateur</a><br>";
echo "<a href='ajouter_groupe.php'>Ajouter un groupe</a><br>";
?>
