<?php 
    include("../assets/navbar.php");


    if(!empty($_SESSION['loggedin'])){
        $_SESSION['loggedin'] = "Elérhető";
    }else{
        session_destroy();
        header('location: /login/');
    }
    if($_SESSION['role'] == "user"){
        $_SESSION['role'] = "Felhasználó";
    }else if($_SESSION['role'] == "admin"){
        $_SESSION['role'] = "Készítő";
    }else if($_SESSION['role'] == ""){
        $_SESSION['role'] = "Nincs megadva";
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Profil - <?php echo $_SESSION['username']; ?></title>
</head>
<body class="">

        <div class="row">
            <div class="col text-start border m-0">
                <form action="" method="post">


                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-3 ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-postcard m-1"></i>Proli Adatok
                            </button>
                            <button type="button" class="btn btn-primary mt-3 ms-3" >
                                <a href="/" style="color: white; text-decoration: none;"><i class="bi bi-postcard m-1"></i>Poszt Írása</a>
                            </button>
                            <button type="button" class="btn btn-primary mt-3 ms-3 disabled" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-postcard m-1"></i>Történet írása
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="logged">Állapot: <?php echo $_SESSION['loggedin']; ?></p>
                                
                                    <p class="userid">Azonosító: <?php echo "#".$_SESSION['userid']; ?></p>
                                
                                    <p class="username">Felhasználónév: <?php echo $_SESSION['username']; ?></p>

                                    <p class="password">Jelszó: <a id="password"><?php echo $_SESSION['password']; ?></a></p>

                                    <p class="text-start">Profil módosítás: <i class="font-monospace">hamarosan...</i></p>

                                    <p class="role">Jogosultság: <?php echo $_SESSION['role']; ?></p>
                                
                                    <img style="width: 100px; border: 1px solid gray; border-radius: 50px;" class="text-center" src="<?php echo "../image/".$_SESSION['pfp']; ?>" alt="Profilkép">
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="text-start btn btn-outline-danger" data-bs-dismiss="modal">Bezárás</button>
                                </div>
                                </div>
                            </div>
                            </div>


                    
        
                </form>
            </div>
            <div class="post-box col text-start border m-0">
                <h1>Posztok</h1>
                <div class="posts border-light">
                    <?php include("../post/display_profile.php"); ?>
                </div>
            </div>
            <div class="col text-start border m-0">
                <h1>Történet</h1>

            </div>
        </div>
    <script src="account.js"></script>
    <style>
        .post-box{
            max-width: 96%;
        }
    </style>
</body>
</html>