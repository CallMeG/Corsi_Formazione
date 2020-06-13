<?php
session_start();
require "dbconnection.php";
$dipendente = $_SESSION['dipendente'];  //variabili di sessione relativi all'utente loggato
$sede = $_SESSION['sede'];
$nome = $_SESSION["nome"];
$cognome = $_SESSION["cognome"];


$corsi = $dbconnection->prepare("SELECT Nome, (Limite_Iscritti-Iscritti) AS disponibile, ID_Corso, (Date_Format(Data_Inizio, '%d / %m / %Y')) AS inizio, (Date_Format(Data_Fine, '%d / %m / %Y')) AS fine FROM corso WHERE ID_Sede = '$sede'"); //query per i record dei corsi tenuti nella sede dell'utente

if(isset($_GET['aderisci'])){     //istruzioni svolte solo se l'utente ha cliccato sul bottone "Iscriviti"

	$corso = $_GET['aderisci'];    //ID del corso


	try{
		$inserisci = $dbconnection->prepare("INSERT INTO partecipazioni_corsi (ID_Dipendente, ID_Corso) VALUES ('$dipendente', '$corso')");  //inserimento delle partecipazioni
		$inserisci->execute();
	}catch (PDOException $e) {
		header("location: errore.php");  //in caso di errore durante l'inserimento si viene rimandati ad una pagina di errore
		exit();
	}

	$modifica = $dbconnection->prepare("UPDATE corso SET Iscritti = Iscritti + 1 WHERE ID_Corso = '$corso';");  //aumento di uno del numero dei partecipanti del corso
	$modifica->execute();	
		
	
	$_SESSION['message'] = "Iscritto con successo al corso";     //messaggio visualizzato dall'utente dopo essersi iscritto
	$_SESSION['msg_type'] = "success";
		
		header("location: bacheca.php");
		
		die();
		}

if(isset($_GET['disdici'])){ //istruzioni eseguite solo se l'utente ha cliccato sul bottone "Disiscriviti"

		$corso = $_GET['disdici']; //id del corso


		
		$disdetta = $dbconnection->prepare("DELETE FROM partecipazioni_corsi WHERE ID_Corso ='$corso' AND ID_Dipendente = $dipendente");  //delete dei record nella table partecipazioni
		$disdetta->execute();
		$modifica = $dbconnection->prepare("UPDATE corso SET Iscritti = Iscritti - 1 WHERE ID_Corso = '$corso' AND Iscritti >= 1;"); //diminuisco di uno il numero degli iscritti al corso
		$modifica->execute();
		
		$_SESSION['message'] = "Disiscritto con successo al corso";  //messaggio visualizzato dall'utente dopo essersi iscritto
		$_SESSION['msg_type'] = "danger";

				header("location: bacheca.php");
				die();

		}
?>

