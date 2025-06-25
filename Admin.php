
<?php 
$bdd=new PDO('mysql:host=localhost;dbname=gestion_espaces_verts','root','');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Administrateur</title>
  <link rel="stylesheet" href="style.css">

<style>

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

header {
  background-color: #2c3e50;
  color: #fff;
  padding: 20px;
  text-align: center;
}

.content {
  max-width: 600px;
  margin: 40px auto;
  background-color: white;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-bottom: 20px;
  color: #333;
  text-align: center;
}


form label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

form input,
form button {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form button {
  background-color: #1abc9c;
  color: white;
  border: none;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s;
}

form button:hover {
  background-color: #16a085;
}

table{
 
    border:none;
    border-collapse:collapse;
    margin-left:350px;
}
th,td{

padding:10px;
border :solid 2px black;
margin-top:-5px;

}

</style>

</head>
<body>

<header>
  <h1>🔐 Enregistrement Administrateur</h1>
</header>

<div class="content">
  <h2>Formulaire d’Ajout d’un Admin</h2>

  <form action="#" method="POST">

    <label for="nom"> Nom :</label>
    <input type="text" id="nom" name="nom" maxlength="50" required>
  <br><br>
    <label for="prenom"> Prénom :</label>
    <input type="text" id="prenom" name="prenom" maxlength="50" required>
<br><br>
    <label for="email"> Email :</label>
    <input type="email" id="email" name="email" maxlength="100" required>
<br><br>
    <label for="motdepasse"> Mot de passe :</label>
    <input type="password" id="motdepasse" name="mdp" maxlength="255" required>
<br><br>
    <button type="submit" name ="subm">✅ Enregistrer</button>
     </form>
</div>





<?php 
if(isset($_POST["subm"]))
{
$Rec_nom=$_POST["nom"];
$Rec_prenom=$_POST["prenom"];
$Rec_email=$_POST["email"];
$Rec_password=$_POST["mdp"];

$Insertadm="insert into Admin (Nom,Prenom,Email,MotDepasse) values ('$Rec_nom','$Rec_prenom','$Rec_email','$Rec_password')";
$bdd->exec($Insertadm);


?>

<table>

<tr>
<th>Nom</th>
<th>prenom</th>
<th>Email</th>
<th>Password</th>

</tr>
<tr>
    <td><?php echo $Rec_nom;?></td>
    <td><?php echo $Rec_prenom;?></td>
    <td><?php echo $Rec_email;?></td>
    <td><?php echo $Rec_password;?></td>
</tr>



</table>
<?php  }?>





<div style="margin-top: 20px;margin-left:350px;">
  <a href="AccueilAdmin.php" class="facture-button">⬅ Retour a l'Accueil</a>
</div>

</body>
</html>
