<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>À propos de nous</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f9f9f9;
            margin: 0;
        }

        header {
            background-color: rgb(241, 243, 245);
            color: white;
            padding: 20px;
            text-align: center;
            position: fixed;
            width: 100%;
        }

        .lien {
            text-decoration: none;
            padding: 10px;
            margin-left: 130px;
        }

        section {
            max-width: 800px;
            margin: 100px auto; /* Ajusté pour éviter la superposition avec l'en-tête */
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            color: #2e8b57;
        }

        p {
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .date {
            font-size: 1.2em;
            color: #2e8b57; /* Couleur de la date */
            text-align: right; /* Aligner à droite */
            margin-top: 20px; /* Espacement au-dessus */
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
<header>
    <img src="image/10.jpg" alt="" style="width: 50px; height: 42px;">
    <a class="lien" href="Acc.php">Accueil</a>
    <a class="lien" href="A propos de nous.php">À propos de nous</a>
    <a class="lien" href="contact.php">Contact</a>
    <a class="lien" href="Actualitescit.php">Actualités</a>
    <a class="lien" href="Espaces_cit.php">Espaces verts</a> 
</header>

<br><br><br><br>
<section>
    <p class="date">
        <?php
        date_default_timezone_set('Africa/Bujumbura'); // Définir le fuseau horaire du Burundi
        echo date('d/m/Y H:i'); // Afficher la date et l'heure
        ?>
    </p>

    <h2>Notre mission</h2>
    <p>
        Le service des espaces verts de la Mairie de Bujumbura a pour objectif de garantir un environnement urbain sain et agréable.
        Nous supervisons la gestion, l’entretien, la location et la valorisation des espaces verts publics.
    </p>

    <h2>Ce que nous faisons</h2>
    <p>
        Notre plateforme permet aux citoyens de :
        <ul>
            <li>Consulter les espaces verts disponibles</li>
            <li>Soumettre des demandes d'utilisation</li>
            <li>Laisser un commentaire</li>
            <li>Louer un espace pour un événement ou un projet</li>
        </ul>
    </p>

    <h2>Engagement citoyen</h2>
    <p>
        Nous croyons en une collaboration étroite entre la mairie et les habitants pour construire une ville plus verte et conviviale.
    </p>
</section>

<footer>
    <div style="margin-top: 10px;">
        <a href="https://www.facebook.com" target="_blank">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook-new.png" alt="Facebook" style="width: 30px; height: 30px; margin: 0 10px;">
        </a>
        <a href="https://www.youtube.com" target="_blank">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/youtube-squared.png" alt="YouTube" style="width: 30px; height: 30px; margin: 0 10px;">
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="Instagram" style="width: 30px; height: 30px; margin: 0 10px;">
        </a>
    </div>
    <p>&copy; 2025 - Mairie de Bujumbura</p>
</footer>

</body>
</html>