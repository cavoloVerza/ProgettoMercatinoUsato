<?php

    session_start();
    include('../script.php');

    if( empty($_SESSION["loggato"]) ){
        header("Location: ../../pages/login/login.php");
    }

    $SOMMA_ID = $_POST['decisione'];
         if (strpos($SOMMA_ID, ',') !== false) {
               
            $parti = explode(",", $SOMMA_ID);
            $ID_PROPOSTA = $parti[1];
            $scelta = $parti[0];
            

         }
         
         $val = 0;
    if($scelta == " V"){
        $val = 2;
    }
    if($scelta == " X"){
        $val = 1;
    }
    $sql = "UPDATE proposta SET StatoOfferta = $val WHERE IDpro = $ID_PROPOSTA";
    $result = $conn->query($sql);
    if ($result == TRUE) {

        if($val == 2){
            $sql3 = "SELECT * FROM oggetto JOIN utente ON oggetto.IdUtente = utente.ID JOIN proposta ON proposta.IdOggetto = oggetto.IDogg WHERE IDpro = $ID_PROPOSTA";
            $result3 = $conn->query($sql3); 
            if ($result3->num_rows > 0) {
            while($COLONNA = $result3->fetch_assoc()) {
                $IDO = $COLONNA['IDogg'];
                }
            }

            $sql2 = "UPDATE oggetto SET StatoOggetto = 1 WHERE IDogg = $IDO";
            $result2 = $conn->query($sql2);

            
        }
        
        
            
            header('Location: ../../pages/dashboard/dashboard.php');
        

    }
    
    else {

        echo "2 " . $conn->error;
        // ERRORE DA GESTIRE
    }
?>