<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Vérification si l'ID de l'espace est passé en paramètre
if (isset($_GET['id'])) {
    $id_espace = htmlspecialchars($_GET['id']);
} else {
    die("ID de l'espace non spécifié.");
}

// Récupération des détails de l'espace à modifier
$query = $bdd->prepare("SELECT * FROM espaces_verts WHERE Id_Espace = ?");
$query->execute([$id_espace]);
$espace = $query->fetch();

if (!$espace) {
    die("Espace non trouvé.");
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $Localisation = htmlspecialchars($_POST['Localisation']);
    $superficie = htmlspecialchars($_POST['superficie']);
    $type_espace = htmlspecialchars($_POST['type_espace']);
    $description = htmlspecialchars($_POST['description']);
    $disponibilite = htmlspecialchars($_POST['disponibilite']);

    // Mise à jour de l'espace
    $updateQuery = $bdd->prepare("UPDATE espaces_verts SET Nom = ?, Localisation = ?,Superficie = ?, Type_espace = ?, description = ?, disponibilite = ? WHERE Id_Espace = ?");
    $updateQuery->execute([$nom,$Localisation, $superficie, $type_espace, $description, $disponibilite, $id_espace]);

    // Redirection vers la page précédente
    header("Location: analysechoix_chef.php?quartier=" . urlencode($espace['Localisation']));
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Espace</title>
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
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #2e8b57;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2a7a4b;
        }
    </style>
</head>
<body>

<h1>Modifier l'Espace</h1>

<form method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($espace['Nom']); ?>" required>
    
      <label for="nom">Quartier :</label>
    <input type="text" id="nom" name="Localisation" value="<?php echo htmlspecialchars($espace['Localisation']); ?>" required>

    <label for="superficie">Superficie (m²) :</label>
    <input type="number" id="superficie" name="superficie" value="<?php echo htmlspecialchars($espace['Superficie']); ?>" required>

    <label for="type_espace">Type d'espace :</label>
    <input type="text" id="type_espace" name="type_espace" value="<?php echo htmlspecialchars($espace['Type_espace']); ?>" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($espace['description']); ?></textarea>

    <label for="disponibilite">Disponibilité :</label>
    <input type="text" id="disponibilite" name="disponibilite" value="<?php echo htmlspecialchars($espace['disponibilite']); ?>" required>

    <button type="submit">Modifier</button>
</form>

</body>
</html>