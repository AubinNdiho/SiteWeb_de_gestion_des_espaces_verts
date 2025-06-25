<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Vérification si le matricule est transmis
if (isset($_GET['matricul'])) {
    $matricul = $_GET['matricul'];

    // Récupération des données du citoyen
    $query = $bdd->prepare("SELECT * FROM citoyen WHERE Matricul = ?");
    $query->execute([$matricul]);
    $citoyen = $query->fetch();

    // Vérifie si le citoyen existe
    if (!$citoyen) {
        die("Citoyen non trouvé.");
    }
} else {
    die("Matricule manquant.");
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $dateNaissance = $_POST['dateNaissance'];

    // Mise à jour des données
    $updateQuery = $bdd->prepare("UPDATE citoyen SET Nom = ?, Prenom = ?, Email = ?, MotDePasse = ?, Telephone = ?, Adresse = ?, DateNaissance = ? WHERE Matricul = ?");
    $updateQuery->execute([$nom, $prenom, $email, $motDePasse, $telephone, $adresse, $dateNaissance, $matricul]);

    // Redirection après modification
    header("Location: affichcit_chef.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Citoyen</title>
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

        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            margin: auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #2e8b57;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background-color: #238c4a;
        }
    </style>
</head>
<body>

<h1>Modifier Citoyen</h1>

<div class="form-container">
    <form method="POST">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($citoyen['Nom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($citoyen['Prenom']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($citoyen['Email']); ?>" required>
        </div>
        <div class="form-group">
            <label for="motDePasse">Mot de passe</label>
            <input type="password" id="motDePasse" name="motDePasse" value="<?php echo htmlspecialchars($citoyen['MotDePasse']); ?>" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($citoyen['Telephone']); ?>" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($citoyen['Adresse']); ?>" required>
        </div>
        <div class="form-group">
            <label for="dateNaissance">Date de Naissance</label>
            <input type="date" id="dateNaissance" name="dateNaissance" value="<?php echo htmlspecialchars($citoyen['DateNaissance']); ?>" required>
        </div>
        <button type="submit">Modifier</button>
    </form>
</div>

</body>
</html>