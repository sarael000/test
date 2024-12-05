<?php
include 'config.php'; // Connexion à la base de données

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adminQuery = $conn->prepare("SELECT * FROM Admin WHERE email = ? LIMIT 1");
    $adminQuery->execute([$email]);
    $admin = $adminQuery->fetch();
    $formateurQuery = $conn->prepare("SELECT * FROM Formateur WHERE email = ? LIMIT 1");
    $formateurQuery->execute([$email]);
    $formateur = $formateurQuery->fetch();
    $etudiantQuery = $conn->prepare("SELECT * FROM Etudiant WHERE email = ? LIMIT 1");
    $etudiantQuery->execute([$email]);
    $etudiant = $etudiantQuery->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['role'] = 'admin';
        $_SESSION['id'] = $admin['id'];
        header("Location: admin/dashboard.php");
    } elseif ($formateur && password_verify($password, $formateur['password'])) {
        $_SESSION['role'] = 'formateur';
        $_SESSION['id'] = $formateur['id'];
        header("Location: formateur/dashboard.php");
    } elseif ($etudiant && password_verify($password, $etudiant['password'])) {
        $_SESSION['role'] = 'etudiant';
        $_SESSION['id'] = $etudiant['id'];
        header("Location: etudiant/dashboard.php");
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>
