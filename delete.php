<?php

include 'connection.php';

$id = $_GET['deleteid'];
// echo $id;
 $sql ="delete from `usersdata`.`users` where id=$id";
        $result =  mysqli_query($connect, $sql);

         if($result){
      echo "
        <script>
            alert('Data has been deleted successfully');
            window.location.href = 'display.php';
        </script>

      ";
    //   header('location: display.php');
  }else{
    die(mysqli_connect_error());
  }

  mysqli_close($connect);