<?php 
    $newcontent = $_POST['newcontnet'];
    $post = $_GET['postid'];
    include('../assets/navbar.php');
    $db = new mysqli("localhost", "root", "", "fb_chalange");
    

    if(isset($_POST['submit'])) {
        $true = true;
        $errors = array();


        if(empty($_POST['newcontent'])) {
            $true = false;
            array_push($errors, "Ha modosítani szeretnéd a posztot, nem hagyhatod üresen az 'Új tartalom mezőt'!");
        }
        if($true) {
            $cont = mysqli_real_escape_string($db, $_POST['newcontent']);
            $sql = "UPDATE post SET content='$newcontent' WHERE postid='$post'";
            $db->query($sql);

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poszt Módosítás <?php echo "#".$post; ?></title>
</head>
<body>
    <form action="<?php echo "editpost.php?postid=".$post."&content=".$newcontent; ?>" method="post">
        <div class="input-group ms-5 mb-5" style="width: 50%;">
            <span class="input-group-text">Új Tartalom</span>
            <textarea name="newcontnet" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="input-group ms-5 mb-5" style="width: 50%;">
            <input name="file" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <input class="ms-5 btn btn-outline-success" type="submit" value="Módosítás" name="submit">
    </form>
</body>
</html>