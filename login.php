<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if ($results !=null && count($results) >0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /login-php");
    } else {
      $message = 'Lo sentimos, tu usuario no esta registrado!';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- FONT AWESOME -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">

  </head>
  <body>

    <?php require 'partials/header.php' ?>






   


    <section class="m5 text-center text-white ">
          <?php if(!empty($message)): ?>
            <div class="toast show container-fluid bg-danger">
              <div class="toast-header bg-danger">
                <strong class="me-auto text-white">Error!!!</strong>
                <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="toast"></button>
              </div>
              <div class="toast-body bg-danger ">
                 <p> <?= $message ?></p>
              </div>
            </div>
     
          <?php endif; ?>

      <div class="container-sm">


                <h1>Iniciar sesion</h1>
                <span>o <a href="signup.php" class="text-white">Registrate</a></span>

                <form action="login.php" method="POST">
                  <input name="email" type="text" placeholder="Ingresa tu correo">
                  <input name="password" type="password" placeholder="Ingresa tu contraseña">
                  <input type="submit" value="Enviar">
                </form>


      </div>

    </section>







        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>

</html>
