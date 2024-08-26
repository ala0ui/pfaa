<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = htmlspecialchars($_POST['emailOrPhone']);
    $password = htmlspecialchars($_POST['password']);

    echo "<h2>Informations soumises</h2>";
    echo "Adresse e-mail ou numéro de tél: $emailOrPhone<br>";
    echo "Mot de passe: $password<br>";
}
?>
