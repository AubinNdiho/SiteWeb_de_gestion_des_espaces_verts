
<?php 
$bdd=new PDO('mysql:host=localhost;dbname=gestion_espaces_verts','root','');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espaces_verts</title>


    <style>
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f4f9f4;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #2e8b57;
    margin-bottom: 30px;
}

table {
    width: 80%;
    margin: auto;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
}

th {
    background-color: #2e8b57;
    color: white;
    padding: 12px;
    text-align: center;
    font-weight: bold;
    border: 1px solid #ccc;
}

td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #d1f0d1;
}

 footer {
            text-align: center;
            background-color: #2e8b57;
            color: white;
            padding: 10px;
            margin-top: 40px;
        }
</style>

<!-- <style>

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

</style> -->
</head>
<body>
    

<table>

<tr>
<th>Nom</th>
<th>Localisation</th>
<th>Superficie</th>
<th>Type_espace</th>

</tr>
<?php 
$AffichageEspaces=$bdd->query('select  * from espaces_verts where order by id_espace desc ' );
while($affichageData=$AffichageEspaces->fetch())
{
?>

<tr>
    <td><?php echo $affichageData["Nom"];?></td>
    <td><?php echo  $affichageData["Localisation"];?></td>
    <td><?php echo $affichageData["Superficie"];?></td>
    <td><?php echo $affichageData["Type_espace"];?></td>
  
</tr>

<?php 
}
?>
</table>

<footer >

<a href="AccueilCit.php">Retour</a>

    &copy; 2025 - Mairie de Bujumbura

</footer>
</body>
</html>



