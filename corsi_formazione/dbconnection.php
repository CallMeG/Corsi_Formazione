<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "corsi_formazione";
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

$options = [PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES   => false];

try {
  $dbconnection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  header("location: errore.php"); //in caso di errore di connessione si viene riportati ad una pagina di errore
}
?>













