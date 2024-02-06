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


if (isset($_POST['nom'], $_POST['prenom'], $_POST['classe'], $_POST['mg'])) {

  $sql = "INSERT INTO `eleve` (`Nomeleve`, `Prenomeleve`, `classe`, `Mg`) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[classe]', '$_POST[mg]')";
  $resultat = mysqli_query($conn, $sql);
  header("location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css">
  <title>Ajouter</title>
</head>

<body>
  <div class="container mt-5">
    <form action="" method="post">
      <div class="form-group">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control">
      </div>
      <div class="form-group">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" name="prenom" id="prenom" class="form-control">
      </div>
      <div class="form-group">
        <label for="classe" class="form-label">Class</label>
        <input type="text" name="classe" id="classe" class="form-control">
      </div>
      <div class="form-group">
        <label for="mg" class="form-label">Moyenne générale</label>
        <input type="text" name="mg" id="mg" class="form-control">
      </div>
      <button class="btn btn-primary">Ajouter</button>
    </form>
  </div>

</body>

</html>