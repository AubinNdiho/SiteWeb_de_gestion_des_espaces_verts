<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les Événements</title>
    <style>
        /* CSS simplifié pour l'affichage */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        header {
            background: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
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
        .edit-button {
            background-color: #007BFF; /* Bleu */
            margin-left: 10px;
        }
        .edit-button:hover {
            background-color: #0056b3; /* Bleu foncé au survol */
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
    <h1>Liste des Événements</h1>
</header>

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
                <button class="edit-button" onclick="editEvent(${index})">Modifier</button>
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

    function editEvent(index) {
        const events = JSON.parse(localStorage.getItem("events")) || [];
        const event = events[index];

        // Rediriger vers la page principale avec l'index de l'événement à modifier
        localStorage.setItem("editIndex", index);
        // Si vous avez une page dédiée pour modifier l'événement, redirigez vers celle-ci
        window.location.href = "modifier_event.php"; // Changez le nom de fichier selon votre besoin
    }

    // Afficher les événements au chargement de la page
    displayEvents();
</script>

<footer>
    <a href="chef_Service.php">Retour</a> &copy; 2025 - Mairie de Bujumbura - Espaces Verts
</footer>

</body>
</html>