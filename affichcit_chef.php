<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citoyen</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f9f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2e8b57;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            width: 80%;
        }

        .event-title {
            font-size: 1.5em;
            color: #2e8b57;
        }

        footer {
            text-align: center;
            background-color: #2e8b57;
            color: white;
            padding: 10px;
            margin-top: 40px;
        }

        .button-container {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-left:-75%;
        }

        .delete-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .edit-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .edit-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>Liste des Citoyens</h1>

<?php
if (isset($_GET['FUTA'])) {
    $RecupSup = $_GET['FUTA'];

    // Fetch the citizen's data to be archived
    $stmt = $bdd->prepare("SELECT * FROM citoyen WHERE Matricul = ?");
    $stmt->execute([$RecupSup]);
    $citoyen = $stmt->fetch();

    // Archive the record if it exists
    if ($citoyen) {
        $insert = $bdd->prepare("INSERT INTO archivecitoyen (Matricul, Nom, Prenom, Email, Telephone, Adresse, DateNaissance) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$citoyen['Matricul'], $citoyen['Nom'], $citoyen['Prenom'], $citoyen['Email'], $citoyen['Telephone'], $citoyen['Adresse'], $citoyen['DateNaissance']]);

        // Now delete the original record
        $deletesp = $bdd->prepare("DELETE FROM citoyen WHERE Matricul = ?");
        $deletesp->execute([$RecupSup]);
    }
}
?>

<?php 
$Affichagecitoyen = $bdd->query('SELECT * FROM citoyen ORDER BY Matricul ASC');
while ($affichageData = $Affichagecitoyen->fetch()) {
?>

<div class="card">
    <div class="event-title"><?php echo $affichageData["Nom"] . ' ' . $affichageData["Prenom"]; ?></div>
    <div><strong>Matricule :</strong> <?php echo $affichageData["Matricul"]; ?></div>
    <div><strong>Email :</strong> <?php echo $affichageData["Email"]; ?></div>
    <div><strong>Téléphone :</strong> <?php echo $affichageData["Telephone"]; ?></div>
    <div><strong>Adresse :</strong> <?php echo $affichageData["Adresse"]; ?></div>
    <div><strong>Date de Naissance :</strong> <?php echo $affichageData["DateNaissance"]; ?></div>

    <div class="button-container">
        <a class="edit-button" href="modifier_citoyen.php?matricul=<?php echo $affichageData["Matricul"]; ?>">Modifier</a>
        <a class="delete-button" href="affichcit_chef.php?FUTA=<?php echo $affichageData["Matricul"]; ?>">Supprimer</a>
    </div>
</div>

<?php 
}
?>

<footer>
    <a href="chef_Service.php" style="color: white;">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>