<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Vérifiez si un ID est passé pour modifier un élément
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $bdd->prepare("SELECT * FROM facture WHERE Id_Facture = ?");
    $query->execute([$id]);
    $facture = $query->fetch();
}

// Traitement de la mise à jour des données
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matricul = $_POST['matricul'];
    $espace = $_POST['id_Espace'];
    $montant = $_POST['montant'];
    $date_facture = $_POST['date_facture'];
    $statut = $_POST['statut'];

    $update = $bdd->prepare("UPDATE facture SET Matricul = ?,id_Espace=?, Montant = ?, Date_Facture = ?, Statut_Paiement = ? WHERE Id_Facture = ?");
    $update->execute([$matricul,$espace, $montant, $date_facture, $statut, $id]);

    header("Location: Affichfact_chef.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Facture</title>

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
    <h1>Modifier la Facture</h1>
    <form method="POST">
        <label for="matricul">Citoyen :</label>
        <input type="text" id="matricul" name="matricul" value="<?php echo htmlspecialchars($facture['Matricul']); ?>" required>
        
        <label for="matricul">Espace :</label>
        <input type="text" id="id_Espace" name="id_Espace" value="<?php echo htmlspecialchars($facture['id_Espace']); ?>" required>
        

        <label for="montant">Montant :</label>
        <input type="text" id="montant" name="montant" value="<?php echo htmlspecialchars($facture['Montant']); ?>" required>
        
        <label for="date_facture">Date de Facturation :</label>
        <input type="date" id="date_facture" name="date_facture" value="<?php echo htmlspecialchars($facture['Date_Facture']); ?>" required>
        
        <label for="statut">Statut :</label>
        <input type="text" id="statut" name="statut" value="<?php echo htmlspecialchars($facture['Statut_Paiement']); ?>" required>
        
        <button type="submit">Modifier</button>
    </form>
    <a href="affichfact_chef.php">Annuler</a>
</body>
</html>