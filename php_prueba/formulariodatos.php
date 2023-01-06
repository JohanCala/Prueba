<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['year']) && !empty($_POST['votos'])) {
    $sql = "INSERT INTO election (year, vote_count, political_party, code_county) VALUES (:years, :votes, :selected_option_counties,:selected_option_political_party)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':votes', $_POST['votos']);
    $stmt->bindParam(':years', $_POST['year']);
    $stmt->bindParam(':selected_option_counties', $_POST['counties']);
    $stmt->bindParam(':selected_option_political_party', $_POST['political_party']);


    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <h1>Ingreso de datos</h1>
    
<form action="formulario.php" method = "post">
  <div class="mb-3">
    <label for="exampleyerar" class="form-label">Year</label>
    <input type="email" class="form-control" name="year" aria-describedby="emailHelp", placeholder="Entry the year">
    
  </div>
  <div class="mb-3">
    <label for="examplevotes1" class="form-label">Political Party</label>
    <select class="form-select form-select-lg mb-1" aria-label="Default select example", name="partidos">
      <option selected>Select Political Party</option>
      <option value="democrat">Demócrata</option>
      <option value="republic">Republicano</option>
      <option value="other">Otro</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="examplevotes1" class="form-label">County</label>
    <select class="form-select form-select-lg mb-1" aria-label="Default select example", name="counties">
      <option selected>Select one</option>
      <option value=1001>Autauga</option>
      <option value=1003>Baldwin</option>
      <option value=100>Bibb</option>
      <option value=1005>Barbour</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="examplevotes1" class="form-label">Total Counts</label>
    <input type="password" class="form-control" name="votos", placeholder="Entry the total count of votes">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
  
</body>
</html>