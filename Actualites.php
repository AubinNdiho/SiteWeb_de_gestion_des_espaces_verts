<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Actualités - Espaces Verts</title>
    <style>
         body {
            font-family: Arial;
            background-color: #f9f9f9;
            margin: 0;
            }
        header {
        background-color:rgb(241, 243, 245);
        color: white;
        padding: 20px;
        text-align: center;
        position :fixed;
        width:100%;
        }
        .actu {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .actu h3 {
            color: #2e8b57;
            margin-bottom: 5px;
        }
        .actu p {
            margin: 5px 0;
            line-height: 1.6;
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
        .event {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.2s;
        }
        .event:hover {
            transform: scale(1.02);
        }
        .date {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
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
        





    </style>
</head>
<body>


<header>
    <h1>Actualités</h1>
</header>
<!-- 
<header>
        <h1>Citoyen(ne)</h1>
<a class ="lien"href="AccueilCit.php">Accueil</a>
<a class ="lien" href="A propos de nous.php">A propos de nous</a>
<a class ="lien" href="contact.php">contact</a>
<a class ="lien" href="Actualites.php">Actualites</a>
<a class ="lien" href="Espaces_cit.php">Espaces verts</a>
</header> -->
<br><br><br><br>

<div id="eventContainer"></div>

<div id="eventForm">
    <h3>Ajouter ou Modifier un événement</h3>
    <input type="text" id="eventTitle" placeholder="Titre de l'événement" required>
    <input type="date" id="eventDate" required>
    <textarea id="eventDescription" placeholder="Description de l'événement" required></textarea>
    <button onclick="addEvent()">Ajouter</button>
    
</div>

<script>
    let editIndex = null;

    function addEvent() {
        const title = document.getElementById("eventTitle").value;
        const date = document.getElementById("eventDate").value;
        const description = document.getElementById("eventDescription").value;

        if (title && date && description) {
            const event = { title, date, description };
            const events = JSON.parse(localStorage.getItem("events")) || [];
            
            if (editIndex !== null) {
                events[editIndex] = event; // Modifier l'événement existant
                editIndex = null; // Réinitialiser l'index après la modification
            } else {
                events.push(event); // Ajouter un nouvel événement
            }
            
            localStorage.setItem("events", JSON.stringify(events));

            // Réinitialiser le formulaire
            document.getElementById("eventTitle").value = '';
            document.getElementById("eventDate").value = '';
            document.getElementById("eventDescription").value = '';
        } else {
            alert("Veuillez remplir tous les champs.");
        }
    }

    function editEvent(index) {
        const events = JSON.parse(localStorage.getItem("events")) || [];
        const event = events[index];

        // Remplir les champs du formulaire avec les détails de l'événement
        document.getElementById("eventTitle").value = event.title;
        document.getElementById("eventDate").value = event.date;
        document.getElementById("eventDescription").value = event.description;

        // Définir l'index pour la modification
        editIndex = index;
    }
</script>

<footer>
   
    <a href="chef_Service.php">Retour</a> &copy; 2025 - Mairie de Bujumbura - Espaces Verts
</footer>

</body>
</html>
