<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>À propos - Gestion des Espaces Verts</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom, #e8f5e9, #c8e6c9);
      color: #2e7d32;
      overflow-x: hidden;
    }

    header {
      background-color: #2e7d32;
      color: white;
      padding: 2em 1em;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    header h1 {
      margin: 0;
      font-size: 3em;
      animation: fadeInDown 1s ease-in-out;
    }

    nav {
      display: flex;
      justify-content: center;
      margin-top: 1.2em;
      flex-wrap: wrap;
      gap: 15px;
    }

    nav a {
      color: white;
      text-decoration: none;
      background-color: #388e3c;
      padding: 10px 20px;
      border-radius: 25px;
      font-weight: bold;
      font-size: 1.1em;
      transition: background-color 0.3s, transform 0.3s;
    }

    nav a:hover {
      background-color: #66bb6a;
      transform: scale(1.05);
    }

   .hero {

      background: url(image/2.jpg) no-repeat center center/cover;
      color: white;
      text-align: center;
      padding: 150px 30px;
      position: relative;
      animation: fadeIn 2s ease-in-out;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(0, 100, 0, 0.5);
      z-index: 0;
    }
    .hero h2, .hero p {
      position: relative;
      z-index: 1;
    }
    .hero h2 {
      font-size: 3.5em;
      margin-bottom: 0.5em;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
    }
    .hero p {
      font-size: 1.4em;
      max-width: 700px;
      margin: 0 auto;
    }

    .content {
      padding: 60px 30px;
      background-color: #f1f8e9;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
    }

    .box {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      padding: 30px;
      max-width: 500px;
      flex: 1;
      animation: fadeInUp 1s ease-in-out;
    }

    .box h3 {
      color: #2e7d32;
      font-size: 1.7em;
      margin-bottom: 15px;
    }

    .box p {
      font-size: 1.1em;
      line-height: 1.6;
    }

    .team-section {
      background-color: #dcedc8;
      padding: 60px 20px;
      text-align: center;
    }

    .team-section h2 {
      font-size: 2.5em;
      margin-bottom: 30px;
    }

    .team-photos {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
    }

    .team-member {
      max-width: 200px;
      text-align: center;
    }

    .team-member img {
      width: 95%;
      border-radius: 50%;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .team-member p {
      margin-top: 10px;
      font-weight: bold;
    }

   footer {
      background-color: #1b5e20;
      color: white;
      text-align: center;
      padding: 2em 1em;
      animation: fadeInUp 2s ease-in-out;
      position: relative;
    }
    .footer-links {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
      margin-top: 20px;
    }
    .footer-links a {
      color: white;
      font-size: 1.5em;
      transition: transform 0.3s ease, color 0.3s ease;
    }
    .footer-links a:hover {
      color: #66bb6a;
      transform: scale(1.2);

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }}
  </style>
</head>
<body>
  <header>
    <h1 class="animate__animated animate__fadeInDown"><i class="fas fa-leaf"></i> Gestion des Espaces Verts</h1>
    <nav class="animate__animated animate__fadeInUp">
      <a href="index.php"><i class="fas fa-home"></i> Accueil</a>
      <a href="a_propos.php"><i class="fas fa-info-circle"></i> À propos</a>
      <a href="contact.php"><i class="fas fa-phone-alt"></i> Contact</a>
      <a href="actualites.php"><i class="fas fa-newspaper"></i> Actualités</a>
    </nav>
  </header>

  <section class="hero animate__animated animate__fadeIn">
    <h2>Notre Mission Verte</h2>
    <p>Favoriser une ville durable, propre et accueillante à travers la valorisation des espaces verts publics.</p>
  </section>

  <section class="content">
    <div class="box">
      <h3><i class="fas fa-seedling"></i> Pourquoi cette plateforme ?</h3>
      <p>Nous voulons connecter les citoyens avec les acteurs municipaux pour une gestion efficace des espaces verts.</p>
    </div>
    <div class="box">
      <h3><i class="fas fa-bullseye"></i> Objectifs</h3>
      <p>Créer un cadre numérique de participation active, optimiser les efforts d'entretien, et promouvoir l'écocitoyenneté.</p>
    </div>
  </section>

  <!-- <section class="team-section">
    <h2><i class="fas fa-users"></i> Notre Équipe</h2>
    <div class="team-photos">
      <div class="team-member">
        <img src="image/wknda17.jpg" alt="Ingenieur BackEnd">
        <p>Ingenieur BackEnd</p>
      </div>
       <div class="team-member">
        <img src="image/wknda16.jpg" alt="Chef de projet">
        <p>Admin</p>
      </div>
      <div class="team-member" >
        <img src="image/wknda15.jpg" alt="Designer">
        <p>Designer</p>
      </div>
    </div>
  </section> -->

  
  <footer class="animate__animated animate__fadeInUp">
    <p><i class="fas fa-leaf"></i> 2025 Mairie de Bujumbura - Tous droits réservés</p>
    <div class="footer-links">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
  </footer>

</body>
</html>
