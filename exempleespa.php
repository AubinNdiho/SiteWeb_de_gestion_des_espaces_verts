<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commentaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            max-width: 100%;
            margin: auto;
        }
        .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .comment h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .comment p {
            margin: 5px 0;
        }
        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #d32f2f;
        }

        
        footer {
            text-align: center;
            background-color: #2e8b57;
            color: white;
            padding: 10px;
            margin-top:250px;
            width:100%;
            margin-right:-50px;
        }
    </style>
</head>
<body>

<h2>Commentaires des Citoyens</h2>
<div id="commentsContainer">
    <!-- Les commentaires seront insérés ici par JavaScript -->
</div>

<script>
    function loadComments() {
        const comments = JSON.parse(window.localStorage.getItem('comments')) || [];
        const commentsContainer = document.getElementById('commentsContainer');
        commentsContainer.innerHTML = ''; // Réinitialiser le conteneur

        // Parcourir et afficher les commentaires
        comments.forEach(comment => {
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('comment');

            commentDiv.innerHTML = `
                <h3>${comment.name} (${comment.email})</h3>
                <p><strong>Sujet :</strong> ${comment.subject}</p>
                <p><strong>Message :</strong> ${comment.message}</p>
            `;

            const deleteButton = document.createElement('button');
            deleteButton.innerText = 'Supprimer';
            deleteButton.onclick = () => {
                const index = comments.indexOf(comment);
                comments.splice(index, 1); // Supprimer le commentaire du tableau
                window.localStorage.setItem('comments', JSON.stringify(comments)); // Mettre à jour le localStorage
                loadComments(); // Recharger les commentaires
            };

            commentDiv.appendChild(deleteButton);
            commentsContainer.appendChild(commentDiv);
        });
    }

    // Charger les commentaires au chargement de la page
    window.onload = loadComments;
</script>

<footer>
    <a href="chef_Service.php">Retour</a>
    &copy; 2025 - Mairie de Bujumbura
</footer>

</body>
</html>