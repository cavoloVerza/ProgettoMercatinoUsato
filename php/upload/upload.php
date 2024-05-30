<?php
    session_start();
    include('../script.php');

    if( empty($_SESSION["loggato"]) ){
        header("Location: ../../pages/login/login.php");
    }

    $nome = $_POST['Nome'];
    $descrizione = $_POST['Descrizione'];
    $categoria = $_POST['Categoria'];
    $image = $_FILES['image'];
                    
    if($categoria == "Vestiti") {
        $categoria = 1;
    }
    if($categoria == "Oggetti") {
        $categoria = 2;
    }
    if($categoria == "Elettronica") {
        $categoria = 3;
    }
    if($categoria == "Sport") {
        $categoria = 4;
    }
    
    // PORTA IL FILE NELLA CARTELLA DEDICATA [V]
    $target_dir = '../../images/';
    $target_file = $target_dir . $_FILES["image"]["name"];
    $imageTypeFile = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if($imageTypeFile == "jpg" || $imageTypeFile == "jpeg" || $imageTypeFile == "png") {

        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    else{

        $_SESSION["messaggio"] = "Errore durante il salvataggio dell'immagine.";
        $_SESSION["errorUpload"] = true;
        header('Location: ../../pages/upload/uploadPage.php');
    }

    $email = $_SESSION["email"];
    $pw = $_SESSION["pw"];
    
    $sql2 = "SELECT ID FROM utente WHERE utente.Email = '$email' && utente.Password = '$pw'";
    $result2 = $conn->query($sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $ID_UT = $row2['ID'];

    $target_dir = 'images/';
    $target_file = $target_dir . $_FILES["image"]["name"];
    
    $sql3 = "INSERT INTO oggetto(NomeOggetto, Foto, Descrizione, IDCategoria, IdUtente) VALUES ('$nome', '$target_file', '$descrizione', $categoria, $ID_UT)";

    if ($conn->query($sql3) == TRUE) {
        $_SESSION["messaggio"] = "Prodotto caricato correttamente";
        header("Location: ../../pages/profile/profile.php");
    } 
    else {
        $_SESSION["messaggio"] = "Errore durante il caricamento del prodotto: " . $conn->error;
        $_SESSION["errorUpload"] = true;
        header("Location: ../../pages/upload/uploadPage.php");
    }

?>