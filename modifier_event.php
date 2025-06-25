<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Événement</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        h1 {
            margin: 0;
            font-size: 2.5em;
        }
        #eventForm {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #0056b3;
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
        <h1>Modifier l'Événement</h1>
    </header>

    <form id="editEventForm">
        <label for="title">Titre :</label>
        <input type="text" id="title" required>

        <label for="date">Date :</label>
        <input type="date" id="date" required>

        <label for="description">Description :</label>
        <textarea id="description" required></textarea>

        <button type="submit">Sauvegarder</button>
    </form>

    <script>
        const editIndex = localStorage.getItem("editIndex");
        const events = JSON.parse(localStorage.getItem("events")) || [];

        // Remplir le formulaire avec les données existantes
        const event = events[editIndex];
        document.getElementById("title").value = event.title;
        document.getElementById("date").value = event.date.split('T')[0]; // Format date
        document.getElementById("description").value = event.description;

        document.getElementById("editEventForm").onsubmit = function(e) {
            e.preventDefault();
            const updatedEvent = {
                title: document.getElementById("title").value,
                date: document.getElementById("date").value,
                description: document.getElementById("description").value,
            };
            events[editIndex] = updatedEvent;
            localStorage.setItem("events", JSON.stringify(events));
            window.location.href = "affichevent.php"; // Redirige vers la page principale
        };
    </script>

    <footer>
        <a href="chef_Service.php" style="color: white;">Retour</a>
        &copy; 2025 - Mairie de Bujumbura - Espaces Verts
    </footer>
</body>
</html>