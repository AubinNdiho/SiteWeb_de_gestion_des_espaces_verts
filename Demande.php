<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande d'utilisation d'un espace</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .content {
            max-width: 600px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        form input,
        form button,
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            background-color: #1abc9c;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        form button:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>

<header>
    <h1>📄 Demande d'utilisation</h1>
</header>

<div class="content">
    <h2>Formulaire de Demande</h2>

    <form action="#" method="POST">

        <label for="espace">Espace Disponible :</label>
        <select id="espace" name="espace" required>
            <?php
            $AffichageEspaces = $bdd->query('SELECT * FROM espaces_verts WHERE Disponibilite = "disponible"');
            while ($affichageData = $AffichageEspaces->fetch()) {
            ?>
                <option value="<?php echo $affichageData["Id_Espace"]; ?>">
                    <?php echo $affichageData["Nom"]; ?></option>
            <?php 
            }
            ?>
        </select>

        <label for="citoyen">Citoyen :</label>
        <select id="citoyen" name="citoyen" required>
            <?php
            $AffichageCitoyen = $bdd->query('SELECT * FROM citoyen');
            while ($affichageData = $AffichageCitoyen->fetch()) {
            ?>
                <option value="<?php echo $affichageData["Matricul"]; ?>">
                    <?php echo $affichageData["Matricul"] . " - " . $affichageData["Nom"] . " " . $affichageData["Prenom"]; ?>
                </option>
            <?php 
            }
            ?>
        </select>

        <label for="date_demande">Date de la demande :</label>
        <input type="date" id="date_demande" name="date_demande" required>

        <label for="description">Description détaillée :</label>
        <textarea id="description" name="description" rows="4" style="width:100%;" required></textarea>

        <button type="submit" name="subm">📨 Envoyer la demande</button>
    </form>
</div>

<?php 
if (isset($_POST["subm"])) {
    $Rec_espace = $_POST["espace"];
    $Rec_matricul = $_POST["citoyen"];
    $Rec_date_demande = $_POST["date_demande"];
    $Rec_description = $_POST["description"];

    $InsertDem = "INSERT INTO demande_utilisation(Date_Demande, Id_Espace, Matricul, Description) VALUES ('$Rec_date_demande', '$Rec_espace', '$Rec_matricul', '$Rec_description')";
    $bdd->exec($InsertDem);
}
?>

<div style="margin-top: 20px; text-align: center;">
    <a href="Acc.php" class="facture-button">⬅ Retour à l'Accueil</a>
</div>

</body>
</html>