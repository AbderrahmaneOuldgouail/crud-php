<?php
$conn = mysqli_connect('localhost', 'root', '');


$dbname = "Dbscolarite";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

$resultat = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
  echo 'Base des donnes crée avec succé';
} else {
  echo 'Il existe un error';
}

$data = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create data base</title>
</head>
<body>
  <h1>Creation de base des donnes</h1>
  <a href="index.php">Retour vers acceuil</a>
</body>
</html>