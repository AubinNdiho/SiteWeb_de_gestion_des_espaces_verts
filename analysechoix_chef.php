<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Vérification si le quartier est passé en paramètre
if (isset($_GET['quartier'])) {
    $quartier = htmlspecialchars($_GET['quartier']);
} else {
    die("Quartier non spécifié.");
}

// Suppression de l'espace si l'ID est passé en paramètre
if (isset($_GET['delete_id'])) {
    $deleteId = htmlspecialchars($_GET['delete_id']);

    // Fetch the space data to be archived
    $stmt = $bdd->prepare("SELECT * FROM espaces_verts WHERE Id_Espace = ?");
    $stmt->execute([$deleteId]);
    $espace = $stmt->fetch();

    // Archive the record if it exists
    if ($espace) {
        $insert = $bdd->prepare("INSERT INTO archive_espace (Id_Espace,Nom,Localisation,Superficie, Type_espace, description, disponibilite) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$espace['Id_Espace'], $espace['Nom'], $espace['Localisation'], $espace['Superficie'], $espace['Type_espace'], $espace['description'], $espace['disponibilite']]);

        // Now delete the original record
        $deleteQuery = $bdd->prepare("DELETE FROM espaces_verts WHERE Id_Espace = ?");
        $deleteQuery->execute([$deleteId]);

        // echo "<p style='color: green; text-align: center;'>Espace supprimé avec succès et archivé.</p>";
    }
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

        .delete-button, .edit-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .edit-button {
            background-color: #3498db; /* Couleur pour le bouton de modification */
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .edit-button:hover {
            background-color: #2980b9; /* Couleur au survol */
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
        <div><strong>Quartier:</strong> <?php echo htmlspecialchars($espace['Localisation']); ?></div>
        <div><strong>Superficie:</strong> <?php echo htmlspecialchars($espace['Superficie']); ?> m2</div>
        <div><strong>Type d'espace:</strong> <?php echo htmlspecialchars($espace['Type_espace']); ?></div>
        <div><strong>Description:</strong> <?php echo htmlspecialchars($espace['description']); ?></div>
        <div><strong>Disponibilité:</strong> <?php echo htmlspecialchars($espace['disponibilite']); ?></div>
        <br>
        <a class="edit-button" href="modifier_espace.php?id=<?php echo $espace['Id_Espace']; ?>">Modifier</a>
        <a class="delete-button" href="?quartier=<?php echo $quartier; ?>&delete_id=<?php echo $espace['Id_Espace']; ?>" 
           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet espace ?');">Supprimer</a>
    </div>
<?php 
}
?>
</div>

<footer>
    <a href="espaces_chef.php" style="color: white;">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>