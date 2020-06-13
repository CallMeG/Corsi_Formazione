<?php
session_start();
require "dbconnection.php";
$email=$_POST['email'];      // credenziali ricevute dal dal file index
$password=md5($_POST['password']);

try{
    $query="SELECT * FROM dipendente WHERE Email = '$email' AND Password = '$password'";        //selezioniamo il record nel quale sono presenti le credenziali dell'utente
    $result = $dbconnection->query($query);
    $row = $result->fetch();
}catch (PDOException $e) {
    header("location: errore.php");      //in caso di errore durante l'esecuzione della query si viene rimandati ad una pagina di errore
}

$id=$row['Email'];  //se il risultato della nostra query è vuoto si invia un errore alla pagina di index 
if($id==NULL){
    header("location: index.php?errore");
}else{
    $_SESSION["dipendente"] = $row["ID_Dipendente"];   //inseriamo all'interno delle variabili di sessione le informazioni dell'utente
    $_SESSION["sede"] = $row["ID_Sede"];
    $_SESSION["nome"] = $row["Nome"];
    $_SESSION["cognome"] = $row["Cognome"];
    $_SESSION["cf"] = $row["CF"];
    $_SESSION["data_nascita"] = $row["Data_Di_Nascita"];
    $_SESSION["telefono"] = $row["Telefono"];
    $_SESSION["email"] = $row[$address];
    header("location: bacheca.php");    //richiamo della pagina bacheca
}
?>
