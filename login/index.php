<?php
    $db = new mysqli("localhost", "root", "", "fb_chalange");

    session_start();
    if(!empty($_SESSION['loggedin'])){
        header('location: /account/');
    }else{
        session_destroy();
    }

        if(isset($_POST['submit'])){
            $true = true;
            $errors = array();
    
            /* Ha üresek a mezők */
            if(empty($_POST['username'])){
                $true = false;
                array_push($errors, "Üres a felhasználónév mező!");
            }
            if(empty($_POST['password'])){
                $true = false;
                array_push($errors, "Üres a jelszó mező!");
            }
    
            /* Ha lefut a $true változó */
            if($true){
                $username = mysqli_real_escape_string($db, $_POST['username']);
                $password = mysqli_real_escape_string($db, $_POST['password']);
                $mdpassword = md5($password);
    
                $sql = "SELECT * FROM users WHERE username='$username' AND password='$mdpassword'";
                
                $query = $db->query($sql);
                if(mysqli_num_rows($query) == 1){
                    session_start();
                    
                    
                    $result = $db->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            /* Minden adat lekérése adatbázisból */
                            $_SESSION['username'] = $username;
                            $_SESSION['password'] = $password;
                            $_SESSION['loggedin'] = "true";
                            $_SESSION['userid'] = $row['userid'];
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['role'] = $row['role'];
                            $_SESSION['pfp'] = $row['pfp'];
                        }
                    }    
                    header('location: /account/');

                }else{
                    array_push($errors, "Nem megfelelő adatok!");
                }
            }
        }
    




    $db->close();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés | Facebook Chalange - 14 day</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <?php include("../assets/navbar.php"); ?>
    <div class="m-5">
        <form onsubmit="return main()" name="logform" class="" action="index.php" method="post">
            <h1>Bejelentkezés</h1>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-slash"></i></span>
                <input name="password" type="password" class="form-control" placeholder="Jelszó" aria-label="Password" aria-describedby="basic-addon1">
            </div>
            <input name="submit" class="m-3 btn btn-success" type="submit" value="Bejelentkezés">
            <p>Nincs még fiókod? <a href="/register">Regisztráció</a></p>
            <p>Elfelejtetted a jelszavad? <a href="./new_password.php">Jelszó Visszaállítása</a></p>
        </form>
        <?php 
            if(!empty($errors)) {
                foreach($errors as $key){
                    echo $key."<br>";
                }
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="login.js"></script>
</body>
</html>