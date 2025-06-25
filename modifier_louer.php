<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Vérifiez si un ID est passé pour modifier un élément
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $bdd->prepare("SELECT * FROM louer WHERE Id_louer = ?");
    $query->execute([$id]);
    $louer = $query->fetch();
}

// Traitement de la mise à jour des données
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricul = $_POST['matricul'];
    $id_espace = $_POST['id_espace']; // Assurez-vous d'utiliser l'ID correct
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $motif = $_POST['motif'];
    $montant = $_POST['montant'];

    $update = $bdd->prepare("UPDATE louer SET Matricul = ?, Id_Espace = ?, Date_debut = ?, Date_fin = ?, Motif = ?, Montant = ? WHERE Id_louer = ?");
    $update->execute([$matricul, $id_espace, $date_debut, $date_fin, $motif, $montant, $id]);

    header("Location: Affichloyer_chef.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Location</title>

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

form {
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

input[type="text"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #2e8b57;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s;
}

button:hover {
    background-color: #238b4a; /* Couleur plus foncée au survol */
}

a {
    display: inline-block;
    margin-top: 15px;
    text-align: center;
    color: #2e8b57;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <h1>Modifier la Location</h1>
    <form method="POST">
        <label for="matricul">Citoyen :</label>
        <input type="text" id="matricul" name="matricul" value="<?php echo htmlspecialchars($louer['Matricul']); ?>" required>
        
        <label for="id_espace">Espace à louer :</label>
        <input type="text" id="id_espace" name="id_espace" value="<?php echo htmlspecialchars($louer['Id_Espace']); ?>" required>
        
        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" value="<?php echo htmlspecialchars($louer['Date_debut']); ?>" required>
        
        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" value="<?php echo htmlspecialchars($louer['Date_fin']); ?>" required>
        
        <label for="motif">Motif :</label>
        <input type="text" id="motif" name="motif" value="<?php echo htmlspecialchars($louer['Motif']); ?>" required>
        
        <label for="montant">Montant :</label>
        <input type="text" id="montant" name="montant" value="<?php echo htmlspecialchars($louer['Montant']); ?>" required>
        
        <button type="submit">Modifier</button>
    </form>
    <a href="Affichloyer_chef.php">Annuler</a>
</body>
</html>