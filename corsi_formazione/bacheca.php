<!DOCTYPE html>
<html lang="IT">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title>Bacheca corsi</title>
	<link rel="shortcut icon" href="assets/favicon.png" />

	<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"></script>

	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bacheca.css" rel="stylesheet">
</head>

<body id="bacheca">
	<?php require_once './aderisci.php';?>

	<?php
if (isset($_SESSION['message'])):      
?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<!-- messaggio che avverte l'utente se l'iscrizione è avvenuta oppure no-->

		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>

	<?php endif ?>

	<header class="container-fluid">
		<img src="assets/logo.png" class="img mx-auto d-block" alt="cdf">
		<h3 class="cursor-default" style="text-align: left;">Benvenuto, <?php echo $nome;?> <?php echo $cognome;?>.</h3>
	</header>

	<section>

		<div class="row justify-content-center">

			<table class="table table-sm table-striped table-dark">

				<caption>Ciao <?php echo $nome;?>, qui è presente la lista dei corsi accessibili ai quali puoi
					iscriverti presso la tua sede.</caption>
				<thead class="thead-dark">
					<tr>
						<th>Adesione al corso</th> <!-- Campi della table -->
						<th>Nome del corso</th>
						<th>Posti disponibili</th>
						<th>Inizio corso</th>
						<th>Fine corso</th>
					</tr>
				</thead>

				<tbody>
					<?php $corsi->execute(array());
						$rows = $corsi->fetchAll(PDO::FETCH_ASSOC);     //record dei corsi tenuti nella sede dell'utente aggiunti ad un array associativo
						foreach ($rows as $row) {

					?>
					<tr>
						<td>
							<form action="aderisci.php" method="POST">

								<div class="form-group">
									<a href="bacheca.php?aderisci=<?php echo $row['ID_Corso'];?>" type="submit"
										name="aderisci" class="btn btn-success" id="aderisci"><?php echo "Iscriviti"?><i
											class="fas fa-check ml-2 icon"></i></a>
									<!-- bottone per iscriversi, se cliccato invia l'ID del corso ad aderisci.php -->
									<a href="bacheca.php?disdici=<?php echo $row['ID_Corso'];?>" type="submit"
										name="disdici" class="btn btn-danger"
										id="disdici"><?php echo "Disiscriviti" ?><i
											class="fas fa-times ml-2 icon"></i></a>
									<!-- bottone per disiscriversi, se cliccato invia l'ID del corso ad aderisci.php -->
							</form>
		</div>
		</td>
		<td><?php echo $row['Nome']; ?></td> <!-- echo dei dati relativi ai corsi svolti nella sede dell'utente -->
		<td><?php echo $row['disponibile'];?></td>
		<td><?php echo $row['inizio'];?></td>
		<td><?php echo $row['fine'];}?></td>

		</tr>


		</tbody>
		</table>



		<div class="row justify-content-center">

		</div>
		</div>
	</section>
	<div class="footer">
		<small>Gilt Andres, 5AI ITIS G. Marconi </small>
	</div>
</body>

</html>