<?php
session_start();
if ($_SESSION['role'] !== 'formateur') {
    header("Location: https://sarael000.github.io/test/formateur/dashboard");
    exit();
}

echo "<h1>Bienvenue Formateur</h1>";
echo "<a href='creer_test.php'>Créer un test</a><br>";
echo "<a href='consulter_tests.php'>Consulter les tests</a><br>";
?>
