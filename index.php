<?php
session_start();
if ($_SESSION['user'] == 'mabani_amina') {
  $user = 'Mabani_amina';
}else {
  header('location: connect.php');
}

$conn = mysqli_connect('localhost', 'root', '');


$dbname = "Dbscolarite";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

$resultat = mysqli_query($conn, $sql);

if (!mysqli_query($conn, $sql)) {
  echo 'Il existe un error dans la création de la base des donnes';
  exit;
}

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "Dbscolarite";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

$sql = "CREATE TABLE IF NOT EXISTS eleve (
    iDeleve INT(6) PRIMARY KEY,
    Nomeleve VARCHAR(30),
    Prenomeleve VARCHAR(30),
    classe INT(6),
    Mg FLOAT(4)
)";
if (!mysqli_query($conn, $sql)) {
  echo 'Il existe un error dans la création de tableaux';
  exit;
}

$sql = "SELECT * FROM eleve ORDER BY Mg ASC";
$resultat = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($resultat, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['supprimer'])) {
    $delet_sql = "DELETE FROM `eleve` WHERE `eleve`.`iDeleve` = '$_POST[supprimer]'";
    $delet_resultat = mysqli_query($conn, $delet_sql);
    header("location: index.php");
  }
}
$retout = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['search'])) {
    $search_sql = "SELECT * FROM eleve WHERE `eleve`.`classe` = '$_POST[search]'";
    $search_resultat = mysqli_query($conn, $search_sql);
    $data = mysqli_fetch_all($search_resultat, MYSQLI_ASSOC);
    $retout = true;
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css">
  <title>Document</title>
</head>

<body>
  <div class="container mt-5">
    <?php if ($retout) : ?>
      <a href="index.php" class="btn btn-primary m-4">Retour</a>
    <?php endif ?>
    <form action="" method="post">
      <div class="form-group">
        <input type="search" name="search" id="search" class="form-control" placeholder="Recherche par Class">
      </div>
      <button class="btn btn-primary m-2">Rechercher</button>
    </form>
    <table class="table table-striped">
      <thead>
        <th>Nom eleve</th>
        <th>Prenom eleve</th>
        <th>Class</th>
        <th>Moyenne générale</th>
        <th>Supprimer</th>
        <th>Modifier</th>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $value) : ?>
          <tr>
            
            <td><?= $value['Nomeleve'] ?></td>
            <td><?= $value['Prenomeleve'] ?></td>
            <td><?= $value['classe'] ?></td>
            <td><?= $value['Mg'] ?></td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="supprimer" value="<?= $value['iDeleve'] ?>">
                <button class="btn btn-danger">Supprimer</button>
              </form>
            </td>
            <td>
              <form action="modifier.php" method="post">
                <input type="hidden" name="modifier" value="<?= $value['iDeleve'] ?>">
                <button class="btn btn-primary">Modifier</button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <form action="ajouter.php" method="post">
      <input type="hidden" name="ajouter">
      <button class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</body>

</html>