<?php
  session_start();
  include('../../php/script.php');

  if(!isset($_SESSION["errorLogin"])) {

    $_SESSION["errorLogin"] = false;
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>
  
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Sign in</title>
    
  </head>

  <body>

    <?php
      
      if($_SESSION["errorLogin"]) {

        echo "<div class='main centro'>";
        echo "<h1 style=color:red>ERROR</h1>";
        echo  "<p>". $_SESSION["messaggio"]. "</p>";
        echo "</div>";

        $_SESSION["errorLogin"] = false;
      }
    
    ?>

    <div class="main">

      <p class="sign" align="center">Sign in</p>

      <form action="../../php/login/LoginCode.php" method="POST">
        <input class="un " type="email" align="center" placeholder="Email" name="email" required>
        <input class="pass" type="password" align="center" placeholder="Password"  name="password" required>
        <button class="submit" align="center">Sign in</button>
      </form> 

      <h3 class="sign "align="center">Non hai un account? REGISTRATI! </h3>
      <div class="un "><a href="../registrazione/reg.php">Registrati</a></div>
      <div class="un "align="center">
        <a href="../../index.php" >torna alla Home</a>
      </div>

    </div>
     
  </body>

</html>

