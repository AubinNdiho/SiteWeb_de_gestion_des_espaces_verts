<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un Commentaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            max-width:100%;
            margin: auto;
        }
        input, textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }

           header {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

    </style>
</head>
<body>

<header>
    <h1>📄Lancer un commentaire ou message</h1>
</header>

<h2>Formulaire d'un Commentaire</h2>
<form id="commentForm">
    <input type="text" id="name" placeholder="Votre nom" required>
    <input type="email" id="email" placeholder="Votre email" required>
    <input type="text" id="subject" placeholder="Sujet" required>
    <textarea id="message" placeholder="Votre message" rows="4" required></textarea>
    <button type="submit">Envoyer</button>
</form>

<script>
    document.getElementById('commentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;

        // Récupérer les commentaires existants
        const comments = JSON.parse(window.localStorage.getItem('comments')) || [];
        // Ajouter le nouveau commentaire
        comments.unshift({ name, email, subject, message });
        // Enregistrer les commentaires mis à jour
        window.localStorage.setItem('comments', JSON.stringify(comments));

        alert('Votre message a été envoyé !');
        document.getElementById('commentForm').reset();
    });
</script> <br>
<footer>
<div style="margin-top: 20px; text-align: center;">
    <a href="Acc.php" class="facture-button">⬅ Retour à l'Accueil</a>
</div>
  </footer>
</body>
</html>