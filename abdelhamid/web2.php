<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Compte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
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
            max-width: 400px;
            width: 100%;
        }
        .container h2 {
            margin-top: 0;
        }
        .container label {
            display: block;
            margin: 15px 0 5px;
        }
        .container input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
            background-color: #007BFF;
            color: white;
            font-size: 16px;
        }
        .button-container button:active {
            transform: scale(0.98);
        }
        .button-container button.cancel {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <?php
    require ("connecte.php");
    @$email=$_POST["emailOrPhone"];
    $err="";
    try {
        if(isset($_POST["envoyer"])){
            if(!empty($email)){ 
                $req=$con->prepare("select*from Stagiaire where gmail=?");
                $req->execute([$email]);
                $tab=$req->fetch();
                if($req->rowCount()>0){
                    $err= "votre mot de pass est. $tab[0]";
                }
            }else
                echo" Veulliez sassie tout les champs";
        }
    }catch (PDOException $e) {
        die("Erreur de login".$e->getMessage());
    }
    ?>
    <div class="container">
        <h2>Veuillez entrer votre e-mail ou votre numéro de mobile pour rechercher votre compte.</h2>
        <form method="post" action="">
            <input type="text" id="emailOrPhone" name="emailOrPhone" placeholder="Adresse e-mail ou numéro de tél" required>
            <div class="button-container">
                <button type="reset" name="supp" value="cancel" class="cancel">Annuler</button>
                <button type="submit" name="envoyer" value="reset">Réinitialiser</button>
            </div>
            <p><?=$err?></p>
        </form>
    </div>
</body>
</html>
