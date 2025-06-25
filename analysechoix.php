<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Vérification si le quartier est passé en paramètre
if (isset($_GET['quartier'])) {
    $quartier = htmlspecialchars($_GET['quartier']);
} else {
    die("Quartier non spécifié.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaces à Louer - <?php echo $quartier; ?></title>
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

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 200px;
            text-align: center;
        }

        footer {
            text-align: center;
            background-color: #2e8b57;
            color: white;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<h1>Espaces à Louer à <?php echo $quartier; ?></h1>

<div class="container">
<?php 
// Requête pour récupérer les espaces du quartier sélectionné
$query = $bdd->prepare('SELECT * FROM espaces_verts WHERE Localisation = ?');
$query->execute([$quartier]);

while ($espace = $query->fetch()) {
?>
    <div class="card">
        <h2><?php echo htmlspecialchars($espace['Nom']); ?></h2>
        <div><strong>Superficie:</strong> <?php echo htmlspecialchars($espace['Superficie']); ?> m2</div>
        <div><strong>Type_espace:</strong> <?php echo htmlspecialchars($espace['Type_espace']); ?></div>
        <div><strong>Description:</strong> <?php echo htmlspecialchars($espace['description']); ?></div>
        <div><strong>Disponibilite:</strong> <?php echo htmlspecialchars($espace['disponibilite']); ?></div>
        <!-- <a href="reserver.php?id=<?php echo $espace['Id_Espace']; ?>">Réserver</a> -->
    </div>
<?php 
}
?>
</div>

<footer>
    <a href="Espaces_cit.php" style="color: white;">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>