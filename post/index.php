<?php 
    $db = new mysqli('localhost', 'root', '', 'fb_chalange');

    $result = $db->query("SELECT * FROM post");

    while($fetch = $result->fetch_assoc()) {
        $username = $fetch['username'];
        $content = $fetch['content'];
        $date = $fetch['Date'];
    }

    if(isset($_POST['submit'])) {
        $true = true;
        $errors = array();

        if(empty($_POST['content'])) {
            $true = false;
            array_push($errors, "Üresen hagytad a mezőt!");
        }
        if($true) {
            $newcontent = mysqli_real_escape_string($db, $_POST['content']);
            $username = $_SESSION['username'];
            $userid = $_SESSION['userid'];
            $date = date('y-m-d h:i');
            $pfp = $_SESSION['pfp'];

            $sql = "INSERT INTO `post`(`username`, `Date`, `content`,`userid`, `pfp`, `status`) VALUES ('$username','$date','$newcontent','$userid','$pfp', 'active')";
            if($db->query($sql)) {
                header('location: ./');
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
    </head>
    <body>
        <div class="ms-5 mt-4">
            </div>
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Poszt írása
            </button>

            <!-- Modal -->
            <form action="index.php" method="post">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Poszt Írása</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body input-group">
                                <input name="content" type="text" class="form-control text-center bg-light" placeholder="Írj ide valamit" aria-label="Írj ide valamit" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2"><a href class="bi bi-emoji-smile m-1"></a> <a href class="bi bi-image m-1"></a></span>
                            </div>

                            
                            <div class="modal-footer">
                                <input type="button" value="Bezárás" class="btn btn-danger" data-bs-dismiss="modal">
                                <input type="submit" name="submit" value="Küldés" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="errors">
                <?php 
                    if(!empty($errors)) {
                        foreach ($errors as $key) {
                            echo $key;
                        }
                    }
                ?>
            </div>
    </body>
</html>