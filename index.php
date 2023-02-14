<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

    $message = '';

  if (!empty($_POST['email']) && !empty($_POST['coment'])) {
    $sql = "INSERT INTO sugerencias (correo, comentario) VALUES (:correo, :coment)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $_POST['email']);
    $stmt->bindParam(':coment',  $_POST['coment']);

    if ($stmt->execute()) {
      $message = 'Comentario enviado';
    } else {
      $message = 'Lo sentimos, ocurrio un error al enviar el comentario';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gaming Fact</title>
    <!-- FUENTES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <!-- Barra de Navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand"  href="/login-php">
          <img src="img/logo2.png" width="60" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <?php if(!empty($user)): ?>

      </a>
              <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"> <?= $user['email']; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"> Cerrar Sesion</a>
            </li>

          </ul>
        </div>
            <?php else: ?>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Resgistrarse</a>
            </li>
          </ul>
        </div>
      <?php endif; ?>

      </div>
    </nav>

    <!-- Cabecera -->
    <header class="main-header">
      <div class="background-overlay text-white py-5">
        <div class="container">
          <div class="row d-flex h-100">
            <div class="col-sm-6 text-center justify-content-center align-self-center">
              <h1>
                Gaming Fact
              </h1>
              <p>El sito donde encontraras reseñas, actualizaciones trucos y mas sobre tus juegos favoritos.</p>
   
            </div>
            <div class="col-sm-6">
              <img src="img/fortnite.jpg" class="img-fluid d-none d-sm-block">
            </div>
          </div>
        </div>
      </div>
    </header>



    <!-- Contenido -->

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3" >
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/fortnite2.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">Fortnite</h5>
                <p class="card-text ">Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games</p>
                <a href="https://www.epicgames.com/fortnite/es-MX/home" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/cod4.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">Call of Duty 4</h5>
                <p class="card-text ">Call of Duty 4: Modern Warfare es un videojuego de disparos en primera persona de estilo bélico, desarrollado por Infinity Ward y distribuido por Activision</p>
                <a href="https://www.callofduty.com/mx/es/blackops4" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/death.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">Death Stranding</h5>
                <p class="card-text ">FDeath Stranding es un videojuego de acción y exploración en mundo abierto desarrollado por Kojima Productions y publicado por Sony</p>
                <a href="https://www.playstation.com/es-mx/games/death-stranding/" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/GTA5.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">Grand Theft Auto V</h5>
                <p class="card-text ">Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games.</p>
                <a href="https://www.rockstargames.com/V/" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/over.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">Overwatch</h5>
                <p class="card-text ">Overwatch es un videojuego de disparos en primera persona multijugador, desarrollado por Blizzard Entertainment. Fue lanzado al público el 24 de mayo del 2016</p>
                <a href="https://playoverwatch.com/" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/PUBG.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">Playerunknown's Battlegrounds</h5>
                <p class="card-text ">‎Playerunknown's Battlegrounds es un videojuego de supervivencia en línea multijugador masivo desarrollado y publicado por Bluehole Inc. para Microsoft Windows.‎</p>
                <a href="https://www.pubg.com/" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/witcher3.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">The Witcher 3: Wild Hunt</h5>
                <p class="card-text ">The Witcher 3: Wild Hunt es un juego de rol de acción desarrollado por el desarrollador polaco CD Projekt Red, y publicado por primera vez en 2015</p>
                <a href="https://thewitcher.com/en/witcher3" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-white "style="background: #30336b;" >
              <img src="img/world.jpg" class="card-img-top" alt="30">
              <div class="card-body  ">
                <h5 class="card-title ">World of Tanks</h5>
                <p class="card-text ">El modo de juego principal es el de jugador contra jugador, en el que cada jugador controla un vehículo blindado.</p>
                <a href="https://worldoftanks.com/" class="btn text-white">Saber mas...</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    </section>

    <!-- Acerca de -->
    <section class="m5 text-center text-white bg-dark">
      <div class="container">
        <div class="row">
          <div class="m-5">
            <h3>¿Quienes somos?</h3>
            <p>
             Gaming Fact es una colaboracion entre direrentes fanaticos de videojuegos quienes decidieron dar sus opiniones y experiencias sobre videojuegos, para que toda la comunidad pueda tener una mejr experiencia la jugar.   
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- Comentarios -->
    <section class="text-center team">
                
      <div class="container p-5">
        <?php if(!empty($message)): ?>
              <div class="toast show container-fluid bg-success">
              <div class="toast-header bg-success">
                <strong class="me-auto text-white">Comentario</strong>
                <button type="button" class="btn-close  btn-close-white" data-bs-dismiss="toast"></button>
              </div>
              <div class="toast-body text-white bg-success">
                 <p> <?= $message ?></p>
              </div>
            </div>
          <?php endif; ?>
        <h1 class="text-center text-white">¿Te interesa el proyecto?</h1>
         <h3 class="text-center text-white">Registrate o solo envia tus sugerencias</h3>
                     <form action="index.php" method="POST">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <i class="fas fa-envelope input-group-text"></i>
                          </div>
                          <input name="email" type="text" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <i class="fas fa-pencil-alt input-group-text"></i>
                          </div>
                          <textarea name="coment" type="text" cols="30" rows="10" placeholder="Comentarios" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                     </form>
      </div>
    </section>

  

    <footer>
      <div class="container p-3">
        <div class="row text-center text-white">
          <div class="col ml-auto">
            <p>Copyright: AlanGonzalez&copy; 2021</p>
          </div>
        </div>
      </div>       
    </footer>





    <!-- BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
