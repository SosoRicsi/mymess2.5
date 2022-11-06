<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
      <?php if($_SESSION['role'] == 'user'){ ?>
      <!-- Nem Admin -->
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="bi bi-house"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Regisztráció</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Bejelentkezés</a>
                    </li>
                </ul>
        <?php }else{   ?>
          <a class="navbar-brand" href="/"><i class="bi bi-house"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Regisztráció</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login/">Bejelentkezés</a>
                    </li>
                    <li class="nav-item">
                      <a href="">Felhasználók</a>
                    </li>
                </ul>
        </div> 
            <div style="display: none;" class="profile">
              <p class="username">Felhasználónév: <?php echo $_SESSION['username']."#".$_SESSION['userid'] ?></p>
            </div>
          </div>
        </div>
        <?php } ?>

<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  <h3 class="set-right"><i class="bi bi-person"></i></h3>
</button>

<!-- Modal -->
<?php 
  if(empty($_SESSION['loggedin'])){
   ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <a class="btn btn-light" href="/login/"><i class="bi bi-box-arrow-in-right m-1"></i>Bejelentkezés</a>
          <a class="btn btn-light" href="/register/"><i class="bi bi-box-arrow-in-right m-1"></i>Regisztráció</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  }else{
    ?>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <u><p><?php echo $_SESSION['username']."</u>#".$_SESSION['userid'] ?></p>
          <a href="/account/" class="btn btn-outline-secondary m-2"><i class="m-1 bi bi-gear-fill"></i>Fiók Beállítás</a><br>
          <a href="#" class="btn btn-outline-secondary m-2"><i class="bi bi-clock-history m-1"></i>Történet</a><br>
          <a href="/logout.php" class="btn btn-danger m-2"><i class="bi bi-box-arrow-in-left m-1"></i>Kijelentkezés</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
        </div>
      </div>
    </div>
  </div>
<?php 
  } 
?>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <style>
    /* width */
    ::-webkit-scrollbar {
      width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 5px grey; 
      border-radius: 50px;
    }
 
    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #145400; 
      border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #gray; 
    }
  </style>
  </body>
</html>
