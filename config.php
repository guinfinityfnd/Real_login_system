<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'test';

    #create connection
    $conn = mysqli_connect($host,$username,$password,$database);

    #check connection
    $result = mysqli_select_db($conn,$database);
    if (!$conn) {
        die('Error : '. mysqli_connect_error($conn));
    }
?>