<?php 
    $db = new mysqli("localhost","root","","fb_chalange");
    
    $result = $db->query("SELECT * FROM post");

    while ($fetch = $result->fetch_assoc()) {
        $username = $fetch['username'];
        $content = $fetch['content'];
        $date = $fetch['Date'];
        $posterid = $fetch['userid'];
        $postid = $fetch['ID'];
        $upfp = $fetch['pfp'];
        $status = $fetch['status'];
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form class="forumbox" action="./post/reactions.php" method="post">
            <div class="box">
                <div class="post border border-white m-5 p-2 text-start" style="width: 500px; box-shadow: 1px 1px 10px gray;">
                    <p>
                        <?php if($status == 'active') { ?>
                        <?php 
                            if($_SESSION['userid'] ==  $posterid) {
                        ?>
                                <img style="width: 30px; height: 30px; border-radius: 50px; border: 1px solid gray;" src="<?php echo "../image/".$_SESSION['pfp']; ?>" alt="Profilkép">
                                <?php echo $username."#".$posterid." "; ?><?php echo "<a style='text-decoration: none;' class='text-muted'>> ".$date."</a>"; ?> <a class="btn btn-danger text-center" href="<?php echo 'post/delete.php?ID='.$postid ?>">Törlés</a>
                                <br>
                        <?php } else { ?>
                            <?php 
                                
                                $_SESSION['posterid']       = $posterid;
                                $_SESSION['postid']         = $postid;
                                $_SESSION['postername']     = $username;
                            ?>
                            <img style="width: 30px; height: 30px; border-radius: 50px; border: 1px solid gray;" src="<?php echo "../image/".$upfp; ?>" alt="Profilkép">
                            <?php echo $username."#".$posterid." ".$postid; ?><?php echo "<a style='text-decoration: none;' class='text-muted'>> ".$date."</a>"; ?> 
                            <br>
                        <?php } ?>
                    </p>
                    <hr>
                    <p class=""><?php echo $content; ?></p>
                    <?php if($_SESSION['userid'] == $posterid){ ?>
                            <!-- Reakciók Ha A tied A Poszt -->
                            <div class="btn-group">
                                <button class="btn btn-primary bi bi-hand-thumbs-up disabled" name="like" type="submit"></button> <!-- ---------- Like ---------- --> 
                                <button class="btn btn-primary bi bi-hand-thumbs-down disabled" name="dislike" type="submit"></button> <!-- ---------- Dislike ---------- -->
                                <button class="btn btn-primary bi bi-chat-square-dots disabled" name="comment" type="submit"></button><!-- ---------- Komment ---------- -->
                                <?php include_once("./post/display_reaction.php"); ?>
                            </div>
                    <?php } else { ?>
                        <!-- Reakciók Ha Nem tied A Poszt -->
                        <div class="btn-group">
                                <button class="btn btn-primary bi bi-hand-thumbs-up" name="like" type="submit"></button> <!-- ---------- Like ---------- --> 
                                <button class="btn btn-primary bi bi-hand-thumbs-down" name="dislike" type="submit"></button> <!-- ---------- Dislike ---------- -->
                                <button class="btn btn-primary bi bi-chat-square-dots" name="comment" type="submit"></button><!-- ---------- Komment ---------- -->
                                <?php include_once("./post/display_reaction.php"); ?> 
                            </div>
                            <?php } ?>
                            <?php } elseif($status == 'deleted') { ?>
                                <p class="p-0 m-0">
                                    <img style="width: 30px; height: 30px; border-radius: 50px; border: 1px solid gray;" src="<?php echo "../image/".$_SESSION['pfp']; ?>" alt="Profilkép">
                                    A poszt törölve lett!
                                </p> 
                            <?php } ?>
                </div>
            </div>
        </form>
    </body>
    <style>
        .box{
            display: flex;
        }
    </style>
</html>
<?php } ?>