<?php 
    $db = new mysqli("localhost", "root", "", "fb_chalange");

    /* Likeok megjelenítése */

    $sql_like = "SELECT * FROM reactions WHERE postid='$postid' AND content='like'";

    $result_like = $db->query($sql_like);

    $count_like = mysqli_num_rows($result_like);

    /* Dislikeok Száma */

    $sql_dislike = "SELECT * FROM reactions WHERE postid='$postid' AND content='dislike'";

    $result_dislike = $db->query($sql_dislike);

    $count_dislike = mysqli_num_rows($result_dislike);
    echo "Likeok száma: ".$count_like." Dislikeok Száma: ".$count_dislike;
?>