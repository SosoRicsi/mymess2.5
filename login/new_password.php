<?php 
    include("../assets/navbar.php");

    include("../db.php");

    if(isset($_POST['submit'])) {
        $true = false;
        $errors = array();

        if(empty($_POST['userid'])) {
            $true = false;
            array_push($errors, "Hiba! Üres az azonosító mező");
        }
        if($true) {
            $userid     = mysqli_real_escape_string($db, $_POST['userid']);
            $newpass    = mysqli_real_escape_string($db, $_POST['password']);

            $sql = "UPDATE `users` SET `password`='$newpass' WHERE 1 userid='$userid'";
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
    <title>Új Jelszó</title>
</head>
<body>
    <form action="new_password.php" method="POST" class="mb-5">
        <div style="width: 500px;" class="text-center m-5">
            <div class="input-group mb-3" >
                <span class="input-group-text" id="basic-addon1">#</span>
                <input name="userid" type="text" class="form-control" placeholder="Azonosító" aria-label="" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" >
                <span class="input-group-text" id="basic-addon1">#</span>
                <input name="userid" type="password" class="form-control" placeholder="Jelszó" aria-label="" aria-describedby="basic-addon1">
            </div>

            <input type="submit" name="submit" class="btn btn-outline-success" value="Visszaállítás">
        </div>
        <?php 
            if(!empty($errors)) {
                foreach ($errors as $key) {
                    echo $key;
                }
            }
        ?>
    </form>
</body>
</html>