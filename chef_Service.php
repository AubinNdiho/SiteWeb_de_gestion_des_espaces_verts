<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord-Employe</title>
  <link rel="stylesheet" href="style.css">
<style>


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
background-color: #f4f4f4;
}

header {
  background-color: #2c3e50;
  color: white;
  padding: 20px;
  text-align: center;
}

.container {
  display: flex;
}

.sidebar {
  width: 220px;
  background-color: #34495e;
  height: 135vh;
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
  padding: -30px;
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

.backgr{
   background: url(image/9.jpg) no-repeat center center/cover;
   color: white;
      text-align: center;
      padding: 150px 20px;
      /* position: relative; */
      animation: fadeIn 2s ease-in-out;
      width:100%;
      /* height:50%; */
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
    <h1>Gestion des Espaces Verts - Chef de Service</h1>
  </header>

  <div class="container">
    <nav class="sidebar">
      <ul>
        <!-- <li><a href="#">🏠 Tableau de bord</a></li> -->
        <li><a href="AffichDem.php">📄 Demandes</a></li>
        <li><a href="espaces_chef.php">🌳 Espaces verts</a></li>
        <li><a href="affichcit_chef.php">👥 Citoyens</a></li>
        <li><a href="Affichfact_chef.php"> 🚪 Factures</a></li>
        <li><a href="Affichloyer_chef.php">  📄 Historiques</a></li>
        <li><a href="affichevent.php"> 📒 Voir les événements</a></li>
        <li><a href="exempleespa.php"> 👀 Voir les commentaires ou messages</a></li>
        <li><a href="Corbeille.php"> 🗑 Corbeille</a></li>
        <br>
        <li><a href="login_chef.php"> 🔓 / 🚪 Deconnexion</a></li>
        <!-- <li><a href="#"> Déconnexion</a></li> -->
      </ul>
    </nav>
<div class="backgr">

    <main class="content">
      <h2>Bienvenue, Chef de service</h2>
      <p>Voici votre tableau de bord. Sélectionnez une option dans le menu.</p>


<div class="facture-box">
  <a href="EspaceAdmin.php" class="facture-button">🌳 Ajouter un Espace Vert</a>
</div>

<div  class="facture-box">
  <a href="LouerAdm.php" class="facture-button">📄 Louer un espace</a>
</div>


  <div class="facture-box">
    <a href="Facture.php" class="facture-button">🧾 Créer une Facture</a>
  </div>




<div  class="facture-box">
  <a href="Actualites.php" class="facture-button">📄 Lancer une actualite</a>
</div>

</main>
    
  </div>
</div>
  <!-- <img src="image/3.jpg" width="35%" height="25%" style="margin-left :58%;margin-top :-75%;"> -->

<footer>
    &copy; 2025 - Mairie de Bujumbura
</footer>

</body>
</html>
