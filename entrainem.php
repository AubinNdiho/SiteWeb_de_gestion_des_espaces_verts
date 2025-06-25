<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les Événements</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        header {
            background: rgb(241, 243, 245);
            color: white;
            padding: 20px;
            text-align: center;
            position: fixed;
            width: 100%;
        }
        h1 {
            margin-top: 80px; /* Ajustement pour éviter la superposition avec l'en-tête */
            text-align: center;
            color: #007BFF;
        }
        .event {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }
        .date {
            font-size: 1.2em;
            color: #2e8b57; /* Couleur de la date */
            text-align: right; /* Aligner à droite */
            margin-bottom: 20px; /* Espacement au-dessous */
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

<h1>Les Événements publiés</h1>

<p class="date">
    <?php
    date_default_timezone_set('Africa/Bujumbura'); // Définir le fuseau horaire du Burundi
    echo date('d/m/Y H:i'); // Afficher la date et l'heure
    ?>
</p>

<div id="eventContainer"></div>

<script>
    function displayEvents() {
        const events = JSON.parse(localStorage.getItem("events")) || [];
        const eventContainer = document.getElementById("eventContainer");
        eventContainer.innerHTML = '';

        events.forEach((event, index) => {
            const eventDiv = document.createElement("div");
            eventDiv.classList.add("event");
            eventDiv.innerHTML = `
                <h2>${event.title}</h2>
                <p>Date : ${new Date(event.date).toLocaleDateString()}</p>
                <p>${event.description}</p>
                <button onclick="deleteEvent(${index})">Supprimer</button>
            `;
            eventContainer.appendChild(eventDiv);
        });
    }

    function deleteEvent(index) {
        const events = JSON.parse(localStorage.getItem("events")) || [];
        events.splice(index, 1);
        localStorage.setItem("events", JSON.stringify(events));
        displayEvents();  // Met à jour l'affichage
    }

    // Afficher les événements au chargement de la page
    displayEvents();
</script>

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