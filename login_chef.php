<?php
session_start();

// Configuration de la connexion à la base de données
$host = "localhost"; // Remplace par ton hôte
$dbname = "gestion_espaces_verts"; // Remplace par ton nom de base de données
$username = "root"; // Remplace par ton nom d'utilisateur
$password = ""; // Remplace par ton mot de passe

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Requête pour vérifier les identifiants
    $sql = "SELECT * FROM chef_services WHERE Email = ? AND MotDePasse = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $motdepasse);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Identifiants corrects, redirection vers la page d'accueil
        header("Location: chef_Service.php");
        exit();
    } else {
        $message = "Identifiants incorrects !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion chef de service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Connexion Chef de Service</h2>
    <?php if (!empty($message)): ?>
        <div class="error"><?php echo $message; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="motdepasse" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</div>

</body>
</html>