<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);

    $uploads_dir = 'uploads/';
    $max_file_size = 2 * 1024 * 1024;

    $files = ['cv', 'motivation', 'assurance'];
    $errors = [];

    foreach ($files as $file) {
        if ($_FILES[$file]['error'] === UPLOAD_ERR_OK) {
            if ($_FILES[$file]['size'] > $max_file_size) {
                $errors[] = "Le fichier " . $_FILES[$file]['name'] . " dépasse la taille maximale de 2 Mo.";
            } else {
                $tmp_name = $_FILES[$file]['tmp_name'];
                $name = basename($_FILES[$file]['name']);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
            }
        } else {
            $errors[] = "Erreur lors du téléchargement de " . $_FILES[$file]['name'];
        }
    }

    if (empty($errors)) {
        echo "<h2>Informations soumises</h2>";
        echo "Nom: $nom<br>";
        echo "Prénom: $prenom<br>";
        echo "Tous les fichiers ont été téléchargés avec succès.";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
