<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Candidature</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #ffffff, #000000);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .container h2 {
            margin-top: 0;
            color: #0066cc;
        }
        .container label {
            display: block;
            margin: 15px 0 5px;
            color: #333;
        }
        .container input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container input[type="file"] {
            padding: 5px;
        }
        .row {
            display: flex;
            justify-content: space-between;
        }
        .row .column {
            flex: 1;
            margin-right: 10px;
        }
        .row .column:last-child {
            margin-right: 0;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #3b38f1;
            color: white;
            font-size: 16px;
        }
        .button-container button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
<?php
require("connecte.php");

?>
    <div class="container">
        <h2>Candidature spontanée</h2>
        <form method="post" action="">
            <div class="row">
                <div class="column">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="column">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
            </div>

            <label for="cv">Cv* (pdf)</label>
            <input type="file" id="cv" name="cv" accept=".pdf" required>

            <label for="motivation">Lettre de motivation* (pdf)</label>
            <input type="file" id="motivation" name="motivation" accept=".pdf" required>

            <label for="assurance">Assurance* (pdf)</label>
            <input type="file" id="assurance" name="assurance" accept=".pdf" required>

            <p>*La taille des documents doit être Inférieur à 2 Mo</p>

            <div class="button-container">
                <a href="web0.php" class="button">Annuler</a>
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>
