<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'cancel') {
        $emailOrPhone = '';
        echo "<p>Annulation effectuée. Le champ a été réinitialisé.</p>";
    } elseif ($_POST['action'] == 'reset') {
        $emailOrPhone = htmlspecialchars($_POST['emailOrPhone']);
        echo "<p>Recherche pour : $emailOrPhone</p>";
    }
}
?>
