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

<h1>Liste des Locations</h1>

<?php 
$AffichageEspaces = $bdd->query('
    SELECT 
        citoyen.Matricul, 
        citoyen.Nom AS CitoyenNom,
        citoyen.Prenom AS CitoyenPrenom,
        espaces_verts.Nom AS EspaceNom, 
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

while ($affichageData = $AffichageEspaces->fetch()) {
?>

<div class="card">
    <div class="event-title">
        Citoyen : <?php echo htmlspecialchars($affichageData["Matricul"]) . " - " . htmlspecialchars($affichageData["CitoyenNom"]) . " " . htmlspecialchars($affichageData["CitoyenPrenom"]); ?>
    </div>
    <div class="event-title">Espace à louer : <?php echo htmlspecialchars($affichageData["EspaceNom"]); ?></div>
    <div class="event-date">Date de début : <?php echo htmlspecialchars($affichageData["Date_debut"]); ?></div>
    <div class="event-date">Date de fin : <?php echo htmlspecialchars($affichageData["Date_fin"]); ?></div>
    <div><strong>Motif :</strong> <?php echo htmlspecialchars($affichageData["Motif"]); ?></div>
    <div><strong>Montant :</strong> <?php echo htmlspecialchars($affichageData["Montant"]); ?></div>
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