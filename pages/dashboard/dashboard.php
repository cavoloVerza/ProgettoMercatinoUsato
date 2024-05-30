<?php

  session_start();
  include('../../php/script.php');

  if( empty($_SESSION["loggato"]) ){
              
    header("Location: ../login/login.php");
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

  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark bg-black">
        <div class="container-fluid">
          <img src="../../images/tondoo.png"class="logoNavbar">
          <div class="titolonav">
            <a  class="titolo" href="../../index.php">RE-VEND</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
              
              <a class="nav-link" href="../upload/uploadPage.php">Carica articolo</a>
              <a class="nav-link" href="">Dashboard</a>
            </ul>
           
            <div class="p1">
              <p class="prof">Account</p>
            </div>
            <div class="p2 me-2">
              <a href="" class="iconaprof"><i class="bi bi-person-circle" ></i></a>
            </div>
          </div>
        </div>
  </nav>




  <div class="container">
 

    <div class="tabe">

    
          <table style="border: 1px solid black" align="center" class="tabella">
          <tr>
            <th>Nome del prodotto</th>
            <th>Nome dell'interessato</th>
            <th>Data/ora della proposta</th>
            <th>Prezzo proposto</th>
            <th colspan="2">Stato</th>
            </tr>
     
            
            

      <?php  

        $email = $_SESSION['email'];
        $sql = "SELECT * FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID JOIN proposta ON proposta.IdOggetto = oggetto.IDogg WHERE Email = '$email'"; 
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($COLONNA = $result->fetch_assoc()) {
            if($_SESSION['email'] == $COLONNA['Email']){
              echo "<tr class='scelta'>";
              echo "<td>" . $COLONNA['NomeOggetto'] . "</td>";

                $id_offer = $COLONNA['IdOfferente'];
                $sql2 = "SELECT Nome FROM utente  WHERE ID = '$id_offer'";   
                $result2 = $conn->query($sql2);
                $roww = $result2->fetch_assoc();
              echo "<td>" . $roww['Nome'] . "</td>";


              echo "<td>" . $COLONNA['DataOra'] . "</td>";
              echo "<td>" . $COLONNA['Cifra'] . "</td>";
              if($COLONNA['StatoOfferta'] == 0){
                ?>
                <form action="../../php/dashboard/dashboardCode.php" method="POST">
                  <td> <button class="btn btn-light" style="border: 1px solid" value=" <?php echo "V," .  $COLONNA['IDpro']  ?> " name="decisione"> V </button> </td>
                  <td> <button class="btn btn-light" style="border: 1px solid" value=" <?php echo "X," . $COLONNA['IDpro'] ?> " name="decisione"> X </button> </td>
                </form>
                
                <?php
              }
              if($COLONNA['StatoOfferta'] == 1){
                echo "<td colspan='2'> X </td>";
              }
              if($COLONNA['StatoOfferta'] == 2){
                echo "<td colspan='2'> V </td>";
              }
              
              echo "</tr>";
                }                          
          }
        }
        else {
          echo "0 results";
        }
           
      ?> 

              
                        
                    </table>
          
                    </div>
     
                        </div>
                        <br>
     

  
               
  </div>
               

   </body>
</html>