<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes</title>
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

        .event-date {
            font-size: 1em;
            color: #555;
        }

        footer {
            text-align: center;
            background-color: #2e8b57;
            color: white;
            padding: 10px;
            margin-top: 40px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .delete-button {
            background-color: #e74c3c; /* Rouge */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .delete-button:hover {
            background-color: #c0392b; /* Rouge foncé au survol */
        }
    </style>
</head>
<body>

<h1>Liste des Demandes </h1>

<?php
if (isset($_GET['FUTA'])) {
    $RecupSup = $_GET['FUTA'];

    // Fetch the data to be archived
    $stmt = $bdd->prepare("SELECT * FROM demande_utilisation WHERE Id_Demande = ?");
    $stmt->execute([$RecupSup]);
    $demande = $stmt->fetch();

    // Archive the record
    if ($demande) {
        $insert = $bdd->prepare("INSERT INTO archivedemande_utilisation (Id_Demande , Date_Demande, Id_Espace, Matricul, Description) VALUES (?, ?, ?, ?, ?)");
        $insert->execute([$demande['Id_Demande'] , $demande['Date_Demande'], $demande['Id_Espace'], $demande['Matricul'], $demande['Description']]);

        // Now delete the original record
        $deletesp = $bdd->prepare("DELETE FROM demande_utilisation WHERE Id_Demande = ?");
        $deletesp->execute([$RecupSup]);
    }
}
?>

<?php 
$AffichageEspaces = $bdd->query('
    SELECT demande_utilisation.Id_Demande, espaces_verts.Nom AS EspaceNom, 
           demande_utilisation.Matricul, demande_utilisation.Date_Demande, 
           demande_utilisation.Description, citoyen.Nom AS CitoyenNom, 
           citoyen.Prenom AS CitoyenPrenom
    FROM demande_utilisation 
    INNER JOIN espaces_verts ON espaces_verts.Id_Espace = demande_utilisation.Id_Espace 
    INNER JOIN citoyen ON citoyen.Matricul = demande_utilisation.Matricul 
    ORDER BY Id_Demande DESC
');

while ($affichageData = $AffichageEspaces->fetch()) {
?>

<div class="card">
    <div class="event-title">Id de la demande : <?php echo $affichageData["Id_Demande"]; ?></div>
    <div class="event-title">Espace demandé : <?php echo $affichageData["EspaceNom"]; ?></div>
    <div class="event-date">Citoyen : <?php echo $affichageData["Matricul"] . " - " . $affichageData["CitoyenNom"] . " " . $affichageData["CitoyenPrenom"]; ?></div>
    <div class="event-date">Date de demande : <?php echo date('d/m/Y', strtotime($affichageData["Date_Demande"])); ?></div>
    <div><strong>Description :</strong> <?php echo $affichageData["Description"]; ?></div><br><br>
    <a class="delete-button" href="AffichDem.php?FUTA=<?php echo $affichageData["Id_Demande"]; ?>">Supprimer</a>
</div>

<?php 
}
?>

<footer>
    <a href="chef_Service.php">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>