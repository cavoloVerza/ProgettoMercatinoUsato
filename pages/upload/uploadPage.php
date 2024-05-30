<?php

  session_start();
  include('../../php/script.php');

  if( empty($_SESSION["loggato"]) ){
              
    header("Location: ../login/login.php");
  }

  if(!isset($_SESSION["errorUpload"])) {

    $_SESSION["errorUpload"] = false;
  }

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <link rel="stylesheet" href="css/style.css">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Days+One&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="../../css/style.css">

  </head>

  <body>

  <?php
      
      if($_SESSION["errorUpload"]) {

        echo "<div class='main centro'>";
        echo "<h1 style=color:red>ERROR</h1>";
        echo  "<p>". $_SESSION["messaggio"]. "</p>";
        echo "</div>";

        $_SESSION["errorUpload"] = false;
      }
    
    ?>

    <div class="main">

      <p class="sign" align="center">Carica Articolo</p>

      <form action="../../php/upload/upload.php" method="POST" enctype="multipart/form-data">
          <input class="un " type="text" align="center" placeholder="Nome del prodotto" name="Nome" id="Nome" required>
          <input class="pass" type="text" align="center" placeholder="Descrizione del prodotto"  name="Descrizione" id="Descrizione">
          <p align="center" class="sign">Categoria del prodotto: </p>

          <select class="un " name="Categoria" id="Categoria" align="center">
            <?php 
                    
              $sql = "SELECT NomeCategoria FROM categoria";
              $result = $conn->query($sql);

              while($row = mysqli_fetch_assoc($result)){
                foreach ($row as $value) {
                  echo "<option value=$value>" . $value . "</option>";
                }

              }

            ?>
          </select>

          <input class="un " align="center" placeholder="Foto articolo" type="file" name="image" id="image" required>
          <button class="submit" align="center">Carica</button>
      </form> <br>

      <div class="un "align="center">
        <a href="../../index.php" >Torna alla Home</a>
      </div>
          
    </div>

  </body>
</html>