<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $etablissement = htmlspecialchars($_POST['etablissement']);
    $diplome = htmlspecialchars($_POST['diplome']);
    $filiere = htmlspecialchars($_POST['filiere']);
    $gmail = htmlspecialchars($_POST['gmail']);
    $telephone = htmlspecialchars($_POST['telephone']);

    echo "<h2>Information Soumises:</h2>";
    echo "Nom: " . $nom . "<br>";
    echo "Prénom: " . $prenom . "<br>";
    echo "Établissement: " . $etablissement . "<br>";
    echo "Diplôme: " . $diplome . "<br>";
    echo "Filière: " . $filiere . "<br>";
    echo "Gmail: " . $gmail . "<br>";
    echo "Numéro de téléphone: " . $telephone . "<br>";
}
?>
