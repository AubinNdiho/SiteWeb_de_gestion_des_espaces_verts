<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Récupération des quartiers distincts depuis la base de données
$query = $bdd->query('SELECT DISTINCT Localisation FROM espaces_verts ORDER BY Localisation');
$quartiers = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix des Quartiers</title>
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
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 1.5em;
            color: #2e8b57;
            margin: 0;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .card a:hover {
            background-color: #2980b9;
        }

        footer {
            text-align: center;
            background-color: #2e8b57;
            color: white;
            padding: 10px;
            margin-top: 40px;
        }
        
     .lien{
       text-decoration:none;
       padding :10px;
       margin-left :130px;

       }

    header {
       background-color:rgb(241, 243, 245);
       color: white;
       padding: 20px;
       text-align: center;
       position :fixed;
        margin-top:-30px; 
       width :100%;
       margin-left:-21px;
       }

       body {
            font-family: Arial;
            background-color: #f9f9f9;
            margin: 0;
        }

    </style>
</head>
<body>

<header>

<a class ="lien" href="AccueilCit.php">Accueil</a>
<a class ="lien" href="A propos de nous.php">A propos de nous</a>
<a class ="lien" href="contact.php">contact</a>
<a class ="lien" href="Actualitescit.php">Actualites</a>
<a class ="lien" href="Espaces_cit.php">Espaces verts</a>
</header>
<br><br><br>
<h1>Choisissez un Quartier</h1>

<div class="container">
    <?php foreach ($quartiers as $quartier): ?>
    <div class="card">
        <h2><?php echo htmlspecialchars($quartier['Localisation']); ?></h2>
        <a href="analysechoix.php?quartier=<?php echo urlencode($quartier['Localisation']); ?>">Voir Espaces</a>
    </div>
    <?php endforeach; ?>
</div>

<footer>
    &copy; 2025 - Mairie de Bujumbura
</footer>
</body>
</html>