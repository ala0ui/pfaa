<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Utilisateurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .actions {
            text-align: center;
        }
        .actions input[type="radio"] {
            margin: 0 5px;
        }
        .actions a {
            color: #007BFF;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    require("connecte.php");
    try {
        $req=$con->prepare("select*from Stagiaire");
        $req->execute();
        $tabAf=$req->fetchAll();
    }catch (PDOException $e) {
        die("Erreur de login".$e->getMessage());
    }   
    ?>
    <h1>Tableau des Utilisateurs</h1>
    <table>
        <thead>
            <tr>
                
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Choix</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            <!-- Exemple de ligne de tableau -->
            <!-- Remplacez cette ligne par des lignes dynamiques si nécessaire -->
            
                <?php
            foreach ($tabAf as $ele){?>
            <tr>
                <td><?=$ele[1]?></td>
                <td><?=$ele[2]?></td>
                <td><?=$ele[0]?></td>
                <td class="actions">
                    <form action="" method="post">
                    <input type="radio" name="choice1" value="accept" id="accept1">
                    <label for="accept1">Accepter</label>
                    <input type="radio" name="choice1" value="refuse" id="refuse1">
                    <label for="refuse1">Refuser</label>
                    </form>
                </td>
                <td class="actions"><a href="#">Voir</a></td>
             </tr>
              <?php } ?>
            
                
                
                
            <!-- Ajoutez d'autres lignes ici -->
        </tbody>
    </table>
</body>
</html>