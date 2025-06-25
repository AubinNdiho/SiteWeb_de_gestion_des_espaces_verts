<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Locations</title>
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
            margin-left: -75%;
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

<?php
if (isset($_GET['FUTA'])) {
    $RecupSup = $_GET['FUTA'];

    // Récupérer les détails de la location avant de la supprimer
    $query = $bdd->prepare("SELECT * FROM louer WHERE Id_louer = ?");
    $query->execute([$RecupSup]);
    $data = $query->fetch();

    if ($data) {
        // Archiver la location
        $archiveQuery = $bdd->prepare("INSERT INTO archive_louer (Id_louer, Matricul, Id_Espace, Date_debut, Date_fin, Motif, Montant) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $archiveQuery->execute([
            $data['Id_louer'],
            $data['Matricul'],
            $data['Id_Espace'],
            $data['Date_debut'],
            $data['Date_fin'],
            $data['Motif'],
            $data['Montant']
        ]);

        // Supprimer la location
        $deleteQuery = $bdd->prepare("DELETE FROM louer WHERE Id_louer = ?");
        $deleteQuery->execute([$RecupSup]);

        // Mettre à jour la disponibilité de l'espace
        $updateQuery = $bdd->prepare("UPDATE espaces_verts SET Disponibilite = 'disponible' WHERE Id_Espace = ?");
        $updateQuery->execute([$data['Id_Espace']]);

        echo "<p style='color: green; text-align: center;'>Location supprimée et archivée avec succès, l'espace est maintenant disponible.</p>";
    }
}
?>

<h1>Liste des Locations</h1>

<?php 
$Affichageloyers = $bdd->query('
    SELECT 
        louer.Id_louer, 
        citoyen.Matricul, 
        citoyen.Nom AS CitoyenNom, 
        citoyen.Prenom AS CitoyenPrenom,
        espaces_verts.Nom, 
        louer.Date_debut, 
        louer.Date_fin, 
        louer.Motif, 
        louer.Montant 
    FROM 
        louer 
    INNER JOIN 
        citoyen ON citoyen.Matricul = louer.Matricul 
    INNER JOIN 
        espaces_verts ON espaces_verts.Id_Espace = louer.Id_Espace 
    ORDER BY 
        Id_louer DESC
');

while ($affichageData = $Affichageloyers->fetch()) {
?>

<div class="card">
    <div class="event-title">
        <strong>Citoyen :</strong> <?php echo $affichageData["Matricul"] . " - " . $affichageData["CitoyenNom"] . " " . $affichageData["CitoyenPrenom"]; ?>
        <br>
        <strong>Espace loué :</strong> <?php echo $affichageData["Nom"]; ?>
    </div>
    <div><strong>Date début :</strong> <?php echo $affichageData["Date_debut"]; ?></div>
    <div><strong>Date fin :</strong> <?php echo $affichageData["Date_fin"]; ?></div>
    <div><strong>Motif :</strong> <?php echo $affichageData["Motif"]; ?></div>
    <div><strong>Montant :</strong> <?php echo $affichageData["Montant"]; ?></div>

    <div class="button-container">
        <a class="edit-button" href="modifier_louer.php?id=<?php echo $affichageData["Id_louer"]; ?>">Modifier</a>
        <a class="delete-button" href="Affichloyer_chef.php?FUTA=<?php echo $affichageData["Id_louer"]; ?>">Supprimer</a>
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