<!DOCTYPE html>
<html lang="IT">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title>Accesso</title>
    <link rel="shortcut icon" href="assets/favicon.png" />

    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/login.css" rel="stylesheet">
</head>

<body id="login">
    <header class="container-fluid">
        <img src="assets/logo.png" class="img mx-auto d-block" alt="cdf">
    </header>

    <section class="container-fluid">
        <section class="row justify-content-center">
            <section>
                <form class="form-container" action="./autenticazione.php" method="post">    <!-- Dopo aver cliccato su "Accedi" si richiama file per l'autenticazione  -->
                    <div class="form-group">
                        <h3 class="text-left" id="login"><i class="icon far fa-user mr-2"></i><b>Accesso</b></h3>
                        <label for="Email"><i class="icon fas fa-at mr-1"></i>Inserire e-mail</label>
                        <input name="email" type="email" class="form-control" id="inputEmail"    
                            placeholder="esempio@gmail.it"></input>  <!-- Input per inserire l'Email -->
                    </div>
                    <div class="form-group">
                        <label for="Password"><i class="icon fas fa-key mr-1"></i>Inserire la password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword"
                            placeholder="password"></input>   <!--Input per inserire la password-->
                    </div>
                    <?php if(isset($_REQUEST["errore"])): ?>   <!-- Se viene ricevuto un messaggio di errore si riferisce all'utente che le credenziali sono errate -->
                    <p class="text-danger">Credenziali errate o assenti.</p>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-outline-light"><i
                            class="fas fa-sign-in-alt mr-2"></i><b>Accedi</button>

                </form>
            </section>
        </section>
    </section>

</body>

</html>

