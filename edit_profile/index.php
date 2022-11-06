<?php 
    include("../assets/navbar.php");

    $db = new mysqli("localhost", "root", "", "fb_chalange");

    session_start();
    if (!empty($_SESSION['loggedin'])) {
        $_SESSION['loggedin'] = "Elérhető";
    }else{
        session_destroy();
        header('location: /login/');
    }

    $nowuser = $_SESSION['username'];
    $nowpassword = $_SESSION['password'];

    if (isset($_POST['submit'])) {
        $true = true;
        $errors = array();

        if (empty($_POST['username'])) {
            $true = false;
            array_push($errors, "Minden mezőt ki kell tölteni! Üresen hagytad a felhasználónév mezőt!");
        }
        if (empty($_POST['password'])) {
            $true = false;
            array_push($errors, "Minden mezőt ki kell tölteni! Üresen hagytad a jelszó mezőt!");
        }

        if ($true) {
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = mysqli_real_escape_string($db, $_POST['password']);
            $password = md5($password);

            $sql = "UPDATE users SET `username`='$username', `password`='$password' WHERE `username`='$nowuser' AND `password`='$nowpassword'";
            if($db->query($sql)){
                echo "siker";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Profil Módosítás | <?php echo $_SESSION['username'] ?></title>
    </head>
    <body>
        <p style="font-size: 20px;" class="loggedin">Állapot: <u><b><?php echo $_SESSION['loggedin'] ?></u></b></p>
        <p style="font-size: 20px;" class="username">Felhasználónév: <u><b><?php echo $_SESSION['username'] ?></u></b></p>
        <p style="font-size: 20px;" class="password">Jelszó: <u><b><?php echo $_SESSION['password'] ?></u></b></p>
        <form action="" method="post">
            <input type="text" placeholder="Felhasználónév" name="username">
            <input type="text" placeholder="Jelszó" name="password">
            <input type="submit" value="Módosítás" name="submit">
        </form>
    </body>
</html>