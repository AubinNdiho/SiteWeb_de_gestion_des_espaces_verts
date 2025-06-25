<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corbeille - Archives</title>
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
            text-align: center;
        }

        .button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
            transition: background 0.3s;
        }

        .button:hover {
            background-color: #2980b9;
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

<h1>Corbeille - Archives</h1>


<div class="card">
    <h2>Archives des Espaces</h2>
    <a class="button" href="choixcorbeille.php">Accéder</a>
</div>


<div class="card">
    <h2>Archives des Locations</h2>
    <a class="button" href="Archivelouer.php">Accéder</a>
</div>

<div class="card">
    <h2>Archives des Factures</h2>
    <a class="button" href="ArchiveFacture.php">Accéder</a>
</div>

<div class="card">
    <h2>Archives des Demandes</h2>
    <a class="button" href="Archive_Demande.php">Accéder</a>
</div>

<div class="card">
    <h2>Archives des Citoyens</h2>
    <a class="button" href="Archivecitoyen.php">Accéder</a>
</div>


<footer>
    <a href="chef_Service.php" style="color: white;">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>