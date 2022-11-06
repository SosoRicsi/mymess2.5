<?php 
    $db = new mysqli("localhost", "root", "", "fb_chalange");
session_start();
    echo $_SESSION['username']." ".$_SESSION['userid'];


    if(isset($_POST['submit'])) {
        $true = true;
        $errors = array();

        if(empty($_POST['content'])) {
            $true = false;
            array_push($errors, "A történet mező nem lehet üres!");
        }

        if($true) {
            /* header('location: ../account/index.php'); */
            session_start();
            $username = $_SESSION['username'];
            $userid = $_SESSION['userid'];
            $content = mysqli_real_escape_string($db, $_POST['content']);
            $date = date("Y-m-d h:i-a");

            $sql = "INSERT INTO history('username', 'userid', 'content', 'Date') VALUE('$username', '$userid', '$content', '$date')";
            if($db->query($sql)) {
                echo "Sikeres mentés!";
            } else {
                echo "Nem sikerült feltölteni!";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
    <form action="../history/index.php" method="POST">

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi bi-clock-history"></i></span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="content" placeholder="Történet">
        </div>

        <button class="btn btn-outline-info" type="submit" name="submit">Történet</button>
        <?php 
            if(!empty($errors)) {
                foreach ($errors as $key) {
                    echo "<div class='alert alert-danger' role='alert'>".$key."</div>";
                }
            }
        ?>
    </form>
</body>
</html>