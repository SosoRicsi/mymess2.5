<?php 
    session_start();
    if($_SESSION['loggedin'] == "") {
        header('location: login/');
        session_destroy();
    } else {
    session_abort();

?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Főoldal | Facebook Chalange - 14 day</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
    <body>
        <?php 
            include("assets/navbar.php"); 
            include("assets/actionbar/index.php");
        ?>
        <div class="post">
            <?php include("post/index.php"); ?>
            <?php include("post/display.php"); ?>
        </div>
        <a href="#" class="top-btn"><i class="bi bi-arrow-bar-up"></i></a>
    </body>
    <style>
        .top-btn{
            bottom: 20px; 
            right: 20px; 
            position: fixed; 
            font-size: 25px;
            background-color: #000;
            padding: 0 6px;
            border-radius: 5px;
            color: white;
        }
        .top-btn:hover{
            color: #000;
            border: 1px solid black;
            background: transparent;
        }
    </style>
</html>
<?php } ?>