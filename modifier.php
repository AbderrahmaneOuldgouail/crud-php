<?php
session_start();
if ($_SESSION['user'] == 'mabani_amina') {
  $user = 'Mabani_amina';
} else {
  header('location: connect.php');
}

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "Dbscolarite";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['modifier'])) {
    $search_sql = "SELECT * FROM eleve WHERE `eleve`.`iDeleve` = '$_POST[modifier]'";
    $search_resultat = mysqli_query($conn, $search_sql);
    $data = mysqli_fetch_all($search_resultat, MYSQLI_ASSOC);
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['nom'], $_POST['prenom'], $_POST['classe'], $_POST['mg'])) {
    $edit_sql = "UPDATE eleve SET Nomeleve = '$_POST[nom]',Prenomeleve = '$_POST[prenom]',classe = '$_POST[classe]',Mg = '$_POST[mg]'  WHERE iDeleve = '$_POST[id]'";
    $edit_resultat = mysqli_query($conn, $edit_sql);
    header("location: index.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css">
  <title>Modifier</title>
</head>

<body>
  <div class="container mt-5">
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $_POST['modifier'] ?>">
      <div class="form-group">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" value="<?= $data[0]['Nomeleve'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" name="prenom" id="prenom" value="<?= $data[0]['Prenomeleve'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="classe" class="form-label">Class</label>
        <input type="text" name="classe" id="classe" value="<?= $data[0]['classe'] ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="mg" class="form-label">Ville</label>
        <input type="text" name="mg" id="mg" value="<?= $data[0]['Mg'] ?>" class="form-control">
      </div>
      <button class="btn btn-primary mt-3">Modifier</button>
    </form>
  </div>
</body>

</html>