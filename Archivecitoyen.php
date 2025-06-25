<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citoyen</title>
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

        .delete-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            margin-left:-81%;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .delete-buttona {
            background-color:rgb(19, 71, 19);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            margin-left:-81%;
        }

        .delete-buttona:hover {
            background-color:rgb(17, 61, 23);
        }


    </style>
</head>
<body>

<h1>Liste des Citoyens :</h1>

<?php
if (isset($_GET['FUTA'])) {
    $RecupSup = $_GET['FUTA'];

    // Fetch the citizen's data to be archived
    $stmt = $bdd->prepare("SELECT * FROM citoyen WHERE Matricul = ?");
    $stmt->execute([$RecupSup]);
    $citoyen = $stmt->fetch();

    // Archive the record if it exists
    if ($citoyen) {
        $insert = $bdd->prepare("INSERT INTO archivecitoyen (Matricul, Nom, Prenom, Email, Telephone, Adresse, DateNaissance) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$citoyen['Matricul'], $citoyen['Nom'], $citoyen['Prenom'], $citoyen['Email'], $citoyen['Telephone'], $citoyen['Adresse'], $citoyen['DateNaissance']]);

        // Now delete the original record
        $deletesp = $bdd->prepare("DELETE FROM citoyen WHERE Matricul = ?");
        $deletesp->execute([$RecupSup]);
    }
}

// Restore functionality
if (isset($_GET['RESTORE'])) {
    $RecupRestore = $_GET['RESTORE'];

    // Fetch the archived citizen's data to restore
    $stmt = $bdd->prepare("SELECT * FROM archivecitoyen WHERE Matricul = ?");
    $stmt->execute([$RecupRestore]);
    $archivedCitoyen = $stmt->fetch();

    // Restore the record if it exists
    if ($archivedCitoyen) {
        $insertRestore = $bdd->prepare("INSERT INTO citoyen (Matricul, Nom, Prenom, Email, Telephone, Adresse, DateNaissance) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertRestore->execute([$archivedCitoyen['Matricul'], $archivedCitoyen['Nom'], $archivedCitoyen['Prenom'], $archivedCitoyen['Email'], $archivedCitoyen['Telephone'], $archivedCitoyen['Adresse'], $archivedCitoyen['DateNaissance']]);

        // Now delete the archived record
        $deleteArchived = $bdd->prepare("DELETE FROM archivecitoyen WHERE Matricul = ?");
        $deleteArchived->execute([$RecupRestore]);
    }
}
?>

<h1>Citoyens Actuels</h1>
<?php 
$Affichagecitoyen = $bdd->query('SELECT * FROM citoyen ORDER BY Matricul DESC');
while ($affichageData = $Affichagecitoyen->fetch()) {
?>

<div class="card">
    <div class="event-title"><?php echo $affichageData["Nom"] . ' ' . $affichageData["Prenom"]; ?></div>
    <div><strong>Matricule :</strong> <?php echo $affichageData["Matricul"]; ?></div>
    <div><strong>Email :</strong> <?php echo $affichageData["Email"]; ?></div>
    <div><strong>Téléphone :</strong> <?php echo $affichageData["Telephone"]; ?></div>
    <div><strong>Adresse :</strong> <?php echo $affichageData["Adresse"]; ?></div>
    <div><strong>Date de Naissance :</strong> <?php echo $affichageData["DateNaissance"]; ?></div>
      <br>
    <div class="button-container">
        <a class="delete-button" href="Archivecitoyen.php?FUTA=<?php echo $affichageData["Matricul"]; ?>">Supprimer</a>
    </div>
</div>

<?php 
}
?>

<h1>Citoyens Archivés</h1>
<?php 
$AffichageArchives = $bdd->query('SELECT * FROM archivecitoyen ORDER BY Matricul DESC');
while ($archiveData = $AffichageArchives->fetch()) {
?>

<div class="card">
    <div class="event-title"><?php echo $archiveData["Nom"] . ' ' . $archiveData["Prenom"]; ?></div>
    <div><strong>Matricule :</strong> <?php echo $archiveData["Matricul"]; ?></div>
    <div><strong>Email :</strong> <?php echo $archiveData["Email"]; ?></div>
    <div><strong>Téléphone :</strong> <?php echo $archiveData["Telephone"]; ?></div>
    <div><strong>Adresse :</strong> <?php echo $archiveData["Adresse"]; ?></div>
    <div><strong>Date de Naissance :</strong> <?php echo $archiveData["DateNaissance"]; ?></div>
     
     <br>
    <div class="button-container">
        <a class="delete-buttona" href="Archivecitoyen.php?RESTORE=<?php echo $archiveData["Matricul"]; ?>">Restaurer</a>
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