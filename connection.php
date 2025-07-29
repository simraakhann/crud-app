<?php


$server = 'localhost';
$username = 'root';
$password = '';

$connect = mysqli_connect($server, $username, $password);

if(!$connect){
    die("connection not connected".mysqli_connect_error($connect));
}
else{
    // echo 'connection success';
  
}

?>