<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord - Citoyen</title>
  <link rel="stylesheet" href="style.css">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}

header {
  background-color: rgb(241, 243, 245);
  color: white;
  padding: 20px;
  text-align: center;
  position: fixed;
  width: 100%;
}

.container {
  display: flex;
}

.sidebar {
  width: 220px;
  background-color: #34495e;
  height: 100vh;
  padding-top: 20px;
}
.sidebar ul {
  list-style: none;
}

.sidebar ul li {
  margin: 10px 0;
}

.sidebar ul li a {
  display: block;
  padding: 12px 20px;
  color: white;
  text-decoration: none;
  transition: background-color 0.3s;
}

.sidebar ul li a:hover {
  background-color: #1abc9c;
}

.content {
  flex-grow: 1;
  padding: 30px;
}

.date {
  font-size: 1.2em;
  color: white; /* Couleur blanche */
  text-align: right; /* Aligner à droite */
  margin-top: 20px; /* Espacement au-dessus */
}

.facture-box {
  margin-top: 40px;
  padding: 20px;
  border: 2px dashed #1abc9c;
  background-color: #e8f6f3;
  max-width: 400px;
  text-align: center;
  border-radius: 10px;
}

.facture-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #1abc9c;
  color: white;
  text-decoration: none;
  font-weight: bold;
  border-radius: 5px;
  transition: background 0.3s;
}

.facture-button:hover {
  background-color: #16a085;
}
.lien {
  text-decoration: none;
  padding: 10px;
  margin-left: 130px;
}

footer {
  text-align: center;
  background-color: #2e8b57;
  color: white;
  padding: 10px;
  margin-top: 40px;
}
.backgr {
  background: url(image/4.jpg) no-repeat center center/cover;
  color: white;
  text-align: center;
  padding: 150px 20px;
  animation: fadeIn 2s ease-in-out;
  width: 100%;
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
<br><br><br><br><br>
<div class="container">
    <nav class="sidebar">
      <ul>
        <li><a href="Affichagefact.php"> 🚪 Factures</a></li>
        <li><a href="Affichage loyer.php"> 📄 Historiques</a></li>
        <li><a href="login.php">Déconnexion</a></li>
      </ul>
    </nav>
    <div class="backgr">
        <main class="content">
            <h2>Bienvenue, Cher(e) Citoyen(ne)</h2>
            <p class="date">
                <?php
                date_default_timezone_set('Africa/Bujumbura'); // Définir le fuseau horaire du Burundi
                echo date('d/m/Y H:i'); // Afficher la date et l'heure
                ?>
            </p>
            <p>Voici votre tableau de bord. Sélectionnez une option dans le menu.</p>

            <div class="facture-box">
                <a href="Demande.php" class="facture-button">🧾 Faire une demande</a>
            </div>

            <div class="facture-box">
                <a href="exercice2.php" class="facture-button">🧾 Lancer un commentaire</a>
            </div>
        </main>
    </div> 
</div>

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