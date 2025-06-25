<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - Espaces Verts</title>
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
        section {
            padding: 40px;
            max-width: 700px;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px #ccc;
            margin-top: 100px; /* Ajustement pour éviter la superposition avec l'en-tête */
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
        .lien {
            text-decoration: none;
            padding: 10px;
            margin-left: 130px;
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

    <h2>Nos coordonnées</h2>
    <p><strong>Mairie de Bujumbura - Service des Espaces Verts</strong></p>
    <p>Email : espacesverts@mairie.bi</p>
    <p>Téléphone : ‪+257 22 123 456‬</p>
    <p>Adresse : Avenue de l'université, Bujumbura</p>

    <h3>Heures de service</h3>
    <ul>
        <li>Lundi à Vendredi : 8h00 - 17h00</li>
        <li>Samedi : 8h00 - 12h00</li>
        <li>Dimanche et jours fériés : Fermé</li>
    </ul>
   
    <h3>Notre emplacement</h3>
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63716.49841152249!2d29.3461501!3d-3.3821671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18e8cfd566d4dbdf%3A0x8fd457ac84d2432a!2sMairie%20de%20Bujumbura!5e0!3m2!1sfr!2sbi!4v1716200200000" 
        width="100%" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
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