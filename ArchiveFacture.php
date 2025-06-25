<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

if (isset($_GET['FUTA'])) {
    $id_facture = $_GET['FUTA'];

    // Récupérer les détails de la facture depuis archive_facture
    $stmt = $bdd->prepare("SELECT * FROM archive_facture WHERE Id_Facture = ? ");
    $stmt->execute([$id_facture]);
    $facture = $stmt->fetch();

    if ($facture) {
        // Insérer la facture dans la table facture
        $stmt = $bdd->prepare("INSERT INTO facture (Id_Facture, Matricul, Montant, Date_Facture, Statut_Paiement, id_Espace) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $facture['Id_Facture'],
            $facture['Matricul'],
            $facture['Montant'],
            $facture['Date_Facture'],
            $facture['Statut_Paiement'],
            $facture['Id_Espace']
        ]);

        // Supprimer la facture de archive_facture
        $stmt = $bdd->prepare("DELETE FROM archive_facture WHERE Id_Facture = ?");
        $stmt->execute([$id_facture]);

        // Rediriger ou afficher un message de succès
        header("Location: ArchiveFacture.php?message=Facture restaurée avec succès");
        exit();
    } else {
        echo "Facture non trouvée dans l'archive.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaces Verts</title>
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

        .payment-info {
            margin-top: 15px;
            padding: 10px;
            border-top: 1px solid #ccc;
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

        .restore-button {
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            background-color: #27ae60;
            transition: background 0.3s;
        }

        .restore-button:hover {
            background-color: #219653;
        }
    </style>
</head>
<body>

<h1>Liste des Factures Archivées</h1>

<?php 
$AffichageArchives = $bdd->query('
    SELECT * FROM archive_facture
    ORDER BY Id_Facture DESC
');

while ($affichageData = $AffichageArchives->fetch()) {
?>

<div class="card">
    <div class="event-title">Facture ID: <?php echo $affichageData["Id_Facture"]; ?></div>
    <div><strong>Matricule :</strong> <?php echo $affichageData["Matricul"]; ?></div>
    <div><strong>Montant (BIF) :</strong> <?php echo $affichageData["Montant"]; ?></div>
    <div><strong>Statut :</strong> <?php echo $affichageData["Statut_Paiement"]; ?></div>
    <div class="event-date">Date : <?php echo date('d/m/Y', strtotime($affichageData["Date_Facture"])); ?></div>
    
    <div class="payment-info">
        <strong>Id Espace :</strong> <?php echo $affichageData["Id_Espace"]; ?>
    </div>

    <div class="button-container">
        <a class="restore-button" href="ArchiveFacture.php?FUTA=<?php echo $affichageData["Id_Facture"]; ?>">Restaurer</a>
    </div>
</div>

<?php 
}
?>

<footer>
    <a href="Corbeille.php">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>