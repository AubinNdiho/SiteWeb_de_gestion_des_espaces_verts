
<?php 
$bdd=new PDO('mysql:host=localhost;dbname=gestion_espaces_verts','root','');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Espace Vert</title>
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

padding: 11px;px;
border :solid 2px black;
margin-top:-5px;

}

</style>


</head>
<body>

<header>
  <h1>Ajout d'un Espace Vert</h1>
</header>

<div class="content">
  <h2>Formulaire Espace Vert</h2>

  <form action="#" method="POST">
    <label for="nom">Nom de l’espace :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="localisation">Quartier :</label>
    <input type="text" id="localisation" name="localisation" required>

    <label for="superficie">Superficie (en m²) :</label>
    <input type="number" id="superficie" name="superficie" required>

    <textarea style="width:103%;height:60px;"name="textarea"  placeholder="preciser sa localisation"required></textarea>

    <label for="type">Type d’espace :</label>
    <select id="type" name="type" required>
      <option value="">-- Choisir le type --</option>
      <option value="Jardin">Jardin</option>
      <option value="Jardin">Route</option>
      <option value="Pelouse">Pelouse</option>
      <option value="Parc urbain">Parc urbain</option>
      <option value="Zone fleurie">Zone fleurie</option>
     

    </select>
    <label for="type">Statut :</label>
    <select id="type" name="statut" required>
      <option value="">-- Choisir un statut --</option>
      <option value="disponible">Disponible</option>
    </select><br><br>

    <button type="submit"name="subm"> Enregistrer</button>
  </form>
</div>

<?php
if(isset($_POST["subm"]))
{
$Rec_nom=$_POST["nom"];
$Rec_localisation=$_POST["localisation"];
$Rec_superficie=$_POST["superficie"];
$Rec_description=$_POST["textarea"];
$Rec_type=$_POST["type"];
$Rec_statut=$_POST["statut"];


$InsertEspaces_verts="insert into espaces_verts (Nom,Localisation,Superficie,description,Type_espace,disponibilite)
 values ('$Rec_nom','$Rec_localisation','$Rec_superficie','$Rec_description','$Rec_type','$Rec_statut')";

$bdd->exec($InsertEspaces_verts);
?>


<?php  
}

?>


<div style="margin-top: 20px;margin-left:350px;">
  <a href="chef_service.php" class="facture-button">⬅ Retour </a>
</div>

</body>
</html>
