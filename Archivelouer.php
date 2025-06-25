<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Locations Archivées</title>
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
        }

        .restore-button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            margin-left:-75%;
        }

        .restore-button:hover {
            background-color: #219653;
        }
    </style>
</head>
<body>

<?php
if (isset($_GET['RESTORE'])) {
    $RecupRest = $_GET['RESTORE'];

    // Récupérer les détails de la location archivées
    $query = $bdd->prepare("SELECT * FROM archive_louer WHERE Id_louer = ?");
    $query->execute([$RecupRest]);
    $data = $query->fetch();

    if ($data) {
        // Insérer la location dans la table louer
        $insertQuery = $bdd->prepare("INSERT INTO louer (Id_louer, Matricul, Id_Espace, Date_debut, Date_fin, Motif, Montant) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertQuery->execute([
            $data['Id_louer'],
            $data['Matricul'],
            $data['Id_Espace'],
            $data['Date_debut'],
            $data['Date_fin'],
            $data['Motif'],
            $data['Montant']
        ]);

        // Supprimer la location de la table archive_louer
        $deleteQuery = $bdd->prepare("DELETE FROM archive_louer WHERE Id_louer = ?");
        $deleteQuery->execute([$RecupRest]);

        echo "<p style='color: green; text-align: center;'>Location restaurée avec succès.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Location non trouvée dans l'archive.</p>";
    }
}
?>

<h1>Liste des Locations Archivées</h1>

<?php 
$AffichageArchives = $bdd->query('
    SELECT 
        archive_louer.Id_louer, 
        citoyen.Matricul, 
        citoyen.Nom AS CitoyenNom, 
        citoyen.Prenom AS CitoyenPrenom,
        espaces_verts.Nom, 
        archive_louer.Date_debut, 
        archive_louer.Date_fin, 
        archive_louer.Motif, 
        archive_louer.Montant 
    FROM 
        archive_louer 
    INNER JOIN 
        citoyen ON citoyen.Matricul = archive_louer.Matricul 
    INNER JOIN 
        espaces_verts ON espaces_verts.Id_Espace = archive_louer.Id_Espace 
    ORDER BY 
        Id_louer DESC
');

while ($affichageData = $AffichageArchives->fetch()) {
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
        <a class="restore-button" href="Archivelouer.php?RESTORE=<?php echo $affichageData["Id_louer"]; ?>">Restaurer</a>
    </div>
</div>

<?php 
}
?>

<footer>
    <a href="Corbeille.php" style="color: white;">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>