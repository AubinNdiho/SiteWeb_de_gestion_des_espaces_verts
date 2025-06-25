
<?php 
$bdd=new PDO('mysql:host=localhost;dbname=gestion_espaces_verts','root','');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire de Facture</title>
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
        padding: 15px;
        border: solid 2px black;
        margin-top: -5px;
}


</style>





</head>
<body>

  <header>
    <h1>Facturation - Espaces Verts</h1>
  </header>

  <div class="content">
    <h2>Remplir la facture</h2>
    <form action="#" method="POST">

     <label for="espace"> Espace  :</label>
    <select id="espace" name="espace" required>
    <?php
     $AffichageEspaces=$bdd->query('select * from espaces_verts ' );
       while($affichageData=$AffichageEspaces->fetch())
     {
     ?>
      <option  value="<?php echo $affichageData["Id_Espace"];?>">
        <?php echo $affichageData["Nom"];?></option>
    
    <?php 
     }?>
        </select>
    <br><br>

<label for="citoyen"> Citoyen :</label>
    <select id="citoyen" name="citoyen" required>
    <?php
     $AffichageCitoyen=$bdd->query('select * from citoyen' );
       while($affichageData=$AffichageCitoyen->fetch())
     {
     ?>
      <option  value="<?php echo $affichageData["Matricul"];?>">
        <?php echo $affichageData["Nom"];?></option>
    
    <?php 
     }?>
        </select>
    <br><br>

      <label for="montant">Montant à payer (BIF) :</label><br>
      <input type="number" id="montant" name="montant" required><br><br>

    
      
      <label for="date">Date de facturation :</label><br>
      <input type="date" id="date" name="date" required><br><br>
      
       <label for="statut">Statut(motif) :</label><br>
      <textarea name="statut" id="statut" rows="4" style="width:100%;"></textarea>

      <br><br>

      <button type="submit" name ="submi">🧾 Générer la facture</button>
    </form>
  </div>

 
<?php
if (isset($_POST["submi"]))
{
$Rec_espace=$_POST["espace"];
$Rec_matricul =$_POST["citoyen"];
$Rec_montant=$_POST["montant"];
$Rec_date=$_POST["date"];
$Rec_statut=$_POST["statut"];


$InsertFacture="insert into facture (id_Espace,Matricul,Montant,Date_Facture,Statut_Paiement) values ('$Rec_espace','$Rec_matricul','$Rec_montant','$Rec_date','$Rec_statut')";
$bdd->exec($InsertFacture);

?>

<?php 
}
?>
 <div style="margin-top: 20px;margin-left:350px;">
  <a href="chef_service.php" class="facture-button">⬅ Retour au chef</a>
</div>


</body>
</html>














