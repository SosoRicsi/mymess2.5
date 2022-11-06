<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname='fb_chalange';
    
    $db = mysqli_connect($servername,$username,$password,$dbname);
    if(!$db){
        die('Connection error!');
    }
?>