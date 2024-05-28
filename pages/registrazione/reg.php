

<?php
  session_start();
  include('../../php/script.php');
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


</div>
    <div class="main">
      <p class="sign" align="center">Sign in</p>
      <form action="../../php/Registrazione/RegistrazioneCode.php" method="POST">
         <input class="un " type="text" align="center" placeholder="Nome" name="nome" required>
         <input class="pass" type="text" align="center" placeholder="Cognome"  name="cognome" required>
         <input class="pass" type="number" align="center" placeholder="Età"  name="eta" required>
        <input class="un " type="email" align="center" placeholder="Email" name="email" required>
        <input class="pass" type="password" align="center" placeholder="Password"  name="password" required>
        <a class="submit" align="center">Sign up</a>
        
      </form> 
        <h3 class="sign "align="center">Hai già un account? ACCEDI! </h3>
        <div class="un "><a href="../login/login.php">Accedi</a></div>
        <div class="un "align="center">
         <a href="../../index.php" >torna alla Home</a>
        </div>
        
    </div>
     
  </body>

</html>

