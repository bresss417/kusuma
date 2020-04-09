<?php
    $conn = new mysqli("localhost","root","","kusuma");
    mysqli_set_charset($conn,'utf8');
    if(!$conn){
        echo "not work";
    }
?>