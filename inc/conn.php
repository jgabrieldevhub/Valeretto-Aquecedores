<?php
    $conn = mysqli_connect("localhost", "root", "", "db_valeretto");

    if(!$conn){
        die("<h3>Erro</h3>".mysqli_connect_error());
    }
?>