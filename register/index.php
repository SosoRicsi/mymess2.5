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
    
            $userid = mt_rand(5, 50000);
            $type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
/* Üres username */
            if(empty($_POST['username'])) {
                $true = false; 
                array_push($errors, "Add meg a felhasználónevedet!");
            }
/* Üres password */
            if(empty($_POST['password'])) {
                $true = false;
                array_push($errors, "Add meg a jelszavadat!");
            }
/* Üres image */
            if(empty($_FILES['image']['name'])) {
                $true = false; 
                array_push($errors, "Nem töltöttél fel képet!");
            }
/* image típusa */
            if(!($type == 'jpeg' || $type == 'png' || $type == 'jpg')){
                $true = false;
                array_push($errors, "A kép csak jpg, jpeg vagy png kiterjesztésű lehet. Te ilyet próbáltál meg feltölteni: <u>".$type."</u>");
            }
/* Image mérete */
            if($_FILES['image']['size']>32000000) {
                $true = false;
                array_push($errors, "A kép maximum 4 mb lehet! Te ekkorát töltöttél fel: <u>".$_FILES['image']['size']."</u>");
            }
/* Kép létezése */
            if(file_exists('../image/'.$_FILES['image']['name'])) {
                $true = false;
                array_push($errors, "Ilyen nevű kép már létezik!");
            }
/* Ha lefut a $true */
            if($true){
                $username = mysqli_real_escape_string($db, $_POST['username']);
                $password = mysqli_real_escape_string($db, $_POST['password']);
                $password = md5($password);
                $date = date("Y-m-d h:i>a");

                $pfpname = mt_rand(5, 100).date("Y.m.d.h.ia").$userid.$username;

                $pfp = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],"../image/".$_FILES['image']['name']);

                $sql = "INSERT INTO `users`(`username`, `userid`, `password`, `registered`, `role`, `pfp`) VALUES ('$username','$userid','$password','$date','user','$pfp')";
                $db->query($sql);
            }
        }


?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regisztráció | Facebook Chalange - 14 day</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
    <body>
        <?php include("../assets/navbar.php"); ?>
        <div class="m-5">
            <form class="" action="index.php" method="post" enctype="multipart/form-data">
                <h1>Regisztráció</h1>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input name="username" type="text" class="form-control" placeholder="Felhasználónév" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-slash"></i></span>
                    <input name="password" type="password" class="form-control" placeholder="Jelszó" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>

                <input name="submit" class="m-3 btn btn-success" type="submit" value="Regisztráció">
                <p>Van már fiókod? <a href="/login">Bejelentkezés</a></p>
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
    </body>
</html>