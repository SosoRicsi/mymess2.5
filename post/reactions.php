<?php 
    $db = new mysqli("localhost","root","","fb_chalange");
    session_start();

    if(isset($_POST['like'])) {
        echo $_SESSION['posterid'];
        echo "<br>".$_SESSION['postid'];
        echo "<br>".$_SESSION['userid'];
        echo "<br>".$_SESSION['username'];

        $postid = $_SESSION['postid'];
        $posterid = $_SESSION['posterid'];
        $userid = $_SESSION['userid'];
        $date = date("h:i a");
        $cont = "like";

        $sql = "INSERT INTO reactions(postid, posterid, userid, Date, content) VALUES('$postid', '$posterid', '$userid', '$date', '$cont')";
        $db->query($sql);
        header('location: /');
    }
    
    if(isset($_POST['dislike'])) {
        echo $_SESSION['posterid'];
        echo "<br>".$_SESSION['postid'];
        echo "<br>".$_SESSION['userid'];
        echo "<br>".$_SESSION['username'];
        
        $postid = $_SESSION['postid'];
        $posterid = $_SESSION['posterid'];
        $userid = $_SESSION['userid'];
        $date = date("h:i a");
        $cont = "dislike";
        
        $sql = "INSERT INTO reactions(postid, posterid, userid, Date, content) VALUES('$postid', '$posterid', '$userid', '$date', '$cont')";
        $db->query($sql);
        header('location: /');
    }
    if(isset($_POST['comment'])) {
        echo "komment";
    }
?>