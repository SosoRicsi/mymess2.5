<?php 
    $db = new mysqli("localhost", "root", "", "fb_chalange");
    $uid = $_GET['userid'];
    $sql = "SELECT * FROM users WHERE 'userid'='$uid'";
    $query = $db->query($sql);

    
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil</title>
    </head>
    <body>
        <p>
            <?php 
                while ($row = $query->fetch_assoc()) {
                    $uname = $row['username'];
                    $uid = $row['userid'];
                    $urole = $row['role']; 
                    echo $uname;
                }
            ?>
        
        </p>
    </body>
</html>
