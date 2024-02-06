<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['set'])) {
    $_SESSION['user'] = 'mabani_amina';
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

  <title>Document</title>
</head>

<body>
  <div class="container mt-5">
    <form action="" method="post">
      <div class="form-label">Set la session de Mabani amina</div>
      <input type="hidden" name="set" value="1">
      <button class="btn btn-primary" >Set session</button>
    </form>
  </div>
</body>

</html>