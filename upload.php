<?php
session_start();
include('script.php');

if( empty($_SESSION["loggato"]) ){
            
    header("Location: LoginPage.html");
}


        $targetDir = "imgs/";
        $nome = $_POST['Nome'];
        $descrizione = $_POST['Descrizione'];
        $categoria = $_POST['Categoria'];
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $imageLink = "http://example.com/" . $targetFile;
        
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    
            // Inserisce il link dell'immagine nel database
            $sql = "INSERT INTO oggetto(Foto) VALUES ('$imageLink')";
  
            echo "Immagine salvata con successo.";
        } else {
            echo "Si è verificato un errore durante il caricamento del file.";
        }
        /*
        $imgContent = file_get_contents($image['tmp_name']);


        $sql1 = $conn->prepare("SELECT categoria.ID FROM categoria WHERE categoria.NomeCategoria = 'Elettronica'");
        $sql1->bind_param('s', $categoria);
        $sql1->execute();
        $result = $sql1->get_result();
        $ID_CATE = $result->fetch_assoc()['ID'];



        
        $email = $_SESSION["email"];
        $pw = $_SESSION["pw"];
        $sql2 = $conn->prepare("SELECT utente.ID FROM utente WHERE utente.Email = '$email' && utente.Password = '$pw'");
        $sql2->bind_param('ss', $email, $pw);
        $sql2->execute();
        $result = $sql2->get_result();
        $ID_UT = $result->fetch_assoc()['ID'];



        $sql3 = $conn->prepare("INSERT INTO oggetto (Descrizione, Foto, IDCategoria, IdUtente, Nome) VALUES (?, ?, ?, ?, ?)");
        $sql3->bind_param('ssiss', $descrizione, $imgContent, $ID_CATE, $ID_UT, $nome);
        $sql3->send_long_data(1, $imgContent);
        
        if ($sql3->execute()) {
            $_SESSION["messaggio"] = "Prodotto caricato correttamente";
        } else {
            $_SESSION["messaggio"] = "Error uploading file: " . $conn->error;
        }

        header('Location: Messaggio.php');

    */


?>