<?php 
    $db = new mysqli("localhost", "root", "", "fb_chalange");
        
    $userid = $_SESSION['userid'];

    if($result = "SELECT * FROM history WHERE userid='$userid'") {
        echo "siker";
    }

    while ($fetch = $result->fetch_assoc()) {
        $husername   = $fetch['username'];
        $huserid     = $fetch['userid'];
        $hcontent    = $fetch['content'];
        $hdate       = $fetch['Date'];
    
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <p><?php echo $husername." > ".$hdate ?></p>
        <p><?php echo $hcontent; ?></p>
    </div>
</body>
</html>
<?php } ?>
