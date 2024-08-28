<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature spontanée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #0066cc, #0099ff);
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
            background-color: #e6f7ff; 
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #0066cc;
            color: white;
            font-size: 16px;
        }
        .button-container button:active {
            transform: scale(0.98);
        }
        .link-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .link-container a {
            text-decoration: none;
            color: #0066cc;
        }
    </style>
</head>
<body>
    <?php
    require ("connecte.php");
    @$login=$_POST["email"];
    @$psw=$_POST["password"];
    @$erreur= "";
    try {
        if(isset($_POST["connecter"])){
            if(!empty($login) ||!empty($psw)){ 
                $req=$con->prepare("select*from admin where cinA=? and nomA=?");
                $req->execute([$psw,$login]);
                if($req->rowCount()>0){
                    session_start();
                    if($_SESSION["autorise"]="oui"){
                        $_SESSION["email"]=$login;
                        header("location:web4.php");
                    }
                }
            }else
                echo" Veulliez sassie tout les champs";
        }
    }catch (PDOException $e) {
        die("Erreur de login".$e->getMessage());
    }
    ?>
</head>
<body>
<div class="container">
    <h2>ADMIN</h2>
    <form method="post" action="">
        <label for="email">NOM / PRENOM Admin :</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <div class="button-container">
            <input type="submit" name="connecter" value="Se connecter">
            </div>
    </form>
        
    </div>
</body>
</html>
