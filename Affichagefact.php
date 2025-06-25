<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
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

        a {
            color: white;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Liste des Factures</h1>

<?php 
$AffichageEspaces = $bdd->query('
    SELECT 
        espaces_verts.Nom AS EspaceNom, 
        facture.Id_Facture, 
        facture.Matricul, 
        facture.Montant, 
        facture.Date_Facture, 
        facture.Statut_Paiement,
        citoyen.Nom AS CitoyenNom,
        citoyen.Prenom AS CitoyenPrenom
    FROM 
        facture 
    INNER JOIN 
        espaces_verts ON espaces_verts.Id_Espace = facture.id_Espace 
    INNER JOIN 
        citoyen ON citoyen.Matricul = facture.Matricul 
    ORDER BY 
        Id_Facture DESC
');

while ($affichageData = $AffichageEspaces->fetch()) {
?>

<div class="card">
    <div class="event-title"><?php echo htmlspecialchars($affichageData["EspaceNom"]); ?></div>
    <div><strong>Citoyen :</strong> <?php echo htmlspecialchars($affichageData["Matricul"] . " - " . $affichageData["CitoyenNom"] . " " . $affichageData["CitoyenPrenom"]); ?></div>
    <div><strong>Montant payé (BIF) :</strong> <?php echo htmlspecialchars($affichageData["Montant"]); ?></div>
    <div><strong>Statut (motif) :</strong> <?php echo htmlspecialchars($affichageData["Statut_Paiement"]); ?></div>
   <div class="event-date">Date : <?php echo date('d/m/Y', strtotime($affichageData["Date_Facture"])); ?></div>
    <div class="payment-info">
        <strong>Mode de Paiement :</strong> CRDB & KCB<br>
        <strong>Code de Paiement :</strong> BUJA-MAIRIE-2020ABC12345
    </div>
</div>

<?php 
}
?>

<footer>
    <a href="Acc.php">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>