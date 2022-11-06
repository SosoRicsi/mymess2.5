<?php 
     $db = new mysqli('localhost', 'root', '', 'fb_chalange');
     session_start();
     $id = $_GET['ID'];
 
     $sql = "UPDATE post SET `status`='active' WHERE ID='$id'";
     $query = $db->query($sql);
 
     if($query){
         header('location: ../account/');
     } else {
         header('location: ../account/');
         echo "Nem sikerült a visszaállítás!";
     }
?>