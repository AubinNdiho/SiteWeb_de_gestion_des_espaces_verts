<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Location d’un Espace Vert</title>
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
    <h1>📄 Louer un Espace Vert</h1>
</header>

<div class="content">
    <h2>Formulaire de Location</h2>

    <form action="#" method="POST">
        <label for="citoyen">Citoyen :</label>
        <select id="citoyen" name="citoyen" required>
            <?php
            $AffichageCitoyen = $bdd->query('SELECT * FROM citoyen');
            while ($affichageData = $AffichageCitoyen->fetch()) {
            ?>
                <option value="<?php echo $affichageData["Matricul"]; ?>">
                    <?php echo $affichageData["Nom"]; ?></option>
            <?php 
            }
            ?>
        </select>

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

        <label for="datedeb">Date de début :</label>
        <input type="date" id="datedeb" name="datedeb" required>

        <label for="datefin">Date de fin :</label>
        <input type="date" id="datefin" name="datefin" required>

        <label for="motif">Motif :</label>
        <input type="text" id="motif" name="motif" required>

        <label for="montant">Montant (Fbu) :</label>
        <input type="number" id="montant" name="montant" required>

        <button type="submit" name="submi">Enregistrer la Location</button>
    </form>
</div>

<?php
if (isset($_POST["submi"])) {
    $Rec_matricul = $_POST["citoyen"];
    $Rec_espace = $_POST["espace"];
    $Rec_datedeb = $_POST["datedeb"];
    $Rec_datefin = $_POST["datefin"];
    $Rec_motif = $_POST["motif"];
    $Rec_montant = $_POST["montant"];

    $Insertlouer = "INSERT INTO louer (Matricul, Id_Espace, Date_debut, Date_fin, Motif, Montant) 
                    VALUES ('$Rec_matricul', '$Rec_espace', '$Rec_datedeb', '$Rec_datefin', '$Rec_motif', '$Rec_montant')";
    $bdd->exec($Insertlouer);

    // Mise à jour de la disponibilité
    $UpdateDisponibilite = "UPDATE espaces_verts SET Disponibilite = 'indisponible' WHERE Id_Espace = $Rec_espace";
    $bdd->exec($UpdateDisponibilite);

    // echo "<p style='text-align:center;'>Location enregistrée avec succès.</p>";
}
?>

<div style="margin-top: 20px; text-align: center;">
    <a href="chef_service.php" class="facture-button">⬅ Retour</a>
</div>

</body>
</html>