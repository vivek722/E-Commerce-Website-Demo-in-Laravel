<?php
    $conn = mysqli_connect("localhost","root","","sportszone");

    if(!$conn) {
        echo "<script>alert('Connection Failed');</script>";
    } else {
        // echo "<script>alert('Successful');</script>";
    }
?>