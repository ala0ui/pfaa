<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        form {
            background-color: #ffffff;
            padding: 90px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1200px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555555;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    require("connecte.php");
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$genre=$_POST["genre"];
    @$etab=$_POST["etablissement"];
    @$diplom=$_POST["diplom"];
    @$cin=$_POST["cin"];
    @$gmail=$_POST["gmail"];
    @$telephone=$_POST["telephone"];
    if(isset($_POST["soumettre"])){
        try {
            $req=$con->prepare("insert into Stagiaire(cin,nom,prenom,genre,etablissement,diplome,gmail,tele) values (?,?,?,?,?,?,?,?)");
            $req->execute([$cin,$nom,$prenom,$genre,$etab,$diplom,$gmail,$telephone]);
            if($req->rowCount()>0){
                echo "<script>alert('ajoute reussie');</script> ";
                header("location:web0.php");
            }
        }catch (PDOException $e) {
            echo  "erreur d'ajouter  ".$e->getMessage();
        }
    }
        
    
    ?>
    <form action="" method="post">
        <h2>Formulaire d'inscription</h2>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder="Nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>

        <label for="genre">Genre:</label>
        <select id="genre" name="genre" required>
            <option value="" disabled selected>Choisissez votre genre</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select>

        <label for="etablissement">Établissement:</label>
        <select id="etablissement" name="etablissement" required>
            <option value="" disabled selected>Choisissez un établissement</option>
            <option value="Université Sidi Mohammed Ben Abdellah - Fès">Université Sidi Mohammed Ben Abdellah - Fès</option>
            <option value="Université Mohammed Premier - Oujda">Université Mohammed Premier - Oujda</option>
            <option value="Université Cadi Ayyad - Marrakech">Université Cadi Ayyad - Marrakech</option>
            <option value="Université Moulay Smail - Meknès">Université Moulay Smail - Meknès</option>
        </select>

        <label for="diplome">Diplôme:</label>
        <input type="text" id="diplome" name="diplome" placeholder="Diplôme" required>

        <label for="cin">Filière:</label>
        <input type="text" id="cin" name="cin" placeholder="Cin" required>

        <label for="gmail">Gmail:</label>
        <input type="email" id="gmail" name="gmail" placeholder="Gmail" required>

        <label for="telephone">Numéro de téléphone:</label>
        <input type="text" id="telephone" name="telephone" placeholder="Numéro de téléphone" required>

        <input type="submit" value="Soumettre" name="soumettre">
    </form>
</body>
</html>
