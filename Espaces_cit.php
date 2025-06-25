<?php 
$bdd = new PDO('mysql:host=localhost;dbname=gestion_espaces_verts', 'root', '');

// Traitement de la recherche
$resultat = null;
if (isset($_POST['recherche']) && !empty($_POST['recherche'])) {
    $nom_espace = htmlspecialchars(trim($_POST['recherche']));
    $query = $bdd->prepare('SELECT * FROM espaces_verts WHERE Nom LIKE ?');
    $query->execute(['%' . $nom_espace . '%']);
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
}

// Récupération des quartiers distincts
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f9f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgb(241, 243, 245);
            color: black;
            padding: 20px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 80px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px; /* Augmenté pour plus de contenu */
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

        .card p {
            font-size: 0.9em;
            color: #555;
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
            padding: 20px 0;
            width: 100%;
            position: relative;
            margin-top: auto;
        }

        footer div {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        footer img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
        }

        .lien {
            text-decoration: none;
            padding: 10px;
            margin-left: 130px;
        }

        .search-container {
            text-align: center;
            margin: 20px 0;
        }

        .search-container input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-container button {
            padding: 10px;
            background-color: #2e8b57;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
             

        .date {
            font-size: 1.2em;
            color: #2e8b57; /* Couleur de la date */
            text-align: right; /* Aligner à droite */
            margin-bottom: 20px; /* Espacement au-dessous */
        }

        .search-container button:hover {
            background-color: #237a4d;
        }

        .resultat {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <img src="image/10.jpg" alt="" style="width: 50px; height: 42px;">
    <a class="lien" href="Acc.php">Accueil</a>
    <a class="lien" href="A propos de nous.php">A propos de nous</a>
    <a class="lien" href="contact.php">Contact</a>
    <a class="lien" href="Actualitescit.php">Actualités</a>
    <a class="lien" href="Espaces_cit.php">Espaces verts</a>
</header>
<br><br><br><br><br><br><br><br><br>
<h1>Choisissez un Quartier</h1>


<p class="date">
        <?php
        date_default_timezone_set('Africa/Bujumbura'); // Définir le fuseau horaire du Burundi
        echo date('d/m/Y H:i'); // Afficher la date et l'heure
        ?>
</p>
<div class="search-container">
    <form method="POST" action="">
        <input type="text" name="recherche" placeholder="Recherchez un espace...">
        <button type="submit">Rechercher</button>
    </form>
</div>

<div class="resultat">
    <?php if ($resultat !== null): ?>
        <?php if (count($resultat) > 0): ?>
            <h2>Résultats de la recherche :</h2>
            <?php foreach ($resultat as $espace): ?>
                <div class="card">
                    <h2><?php echo htmlspecialchars($espace['Nom']); ?></h2>
                    <p><strong>Quartier :</strong> <?php echo htmlspecialchars($espace['Localisation']); ?></p>
                    <p><strong>Superficie :</strong> <?php echo htmlspecialchars($espace['Superficie']); ?> m²</p>
                    <p><strong>Type :</strong> <?php echo htmlspecialchars($espace['Type_espace']); ?></p>
                    <p><strong>Description :</strong> <?php echo htmlspecialchars($espace['description']); ?></p>
                    <p><strong>Disponibilité :</strong> <?php echo htmlspecialchars($espace['disponibilite']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>Aucun espace trouvé.</h2>
        <?php endif; ?>
    <?php endif; ?>
</div>

<div class="container">
    <?php foreach ($quartiers as $quartier): ?>
    <div class="card">
        <h2><?php echo htmlspecialchars($quartier['Localisation']); ?></h2>
        <a href="analysechoix.php?quartier=<?php echo urlencode($quartier['Localisation']); ?>">Voir Espaces</a>
    </div>
    <?php endforeach; ?>
</div>

<br>
<footer>
    <div>
        <a href="https://www.facebook.com" target="_blank">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook-new.png" alt="Facebook">
        </a>
        <a href="https://www.youtube.com" target="_blank">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/youtube-squared.png" alt="YouTube">
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="Instagram">
        </a>
    </div>
    <p>&copy; 2025 - Mairie de Bujumbura</p>
</footer>

</body>
</html>