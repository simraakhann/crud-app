<?php

include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
    }
    .table th {
      background-color: #6610f2;
      color: white;
    }
    .btn-view {
      background-color: #0d6efd;
      color: white;
    }
    .btn-update {
      background-color: #198754;
      color: white;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">All Registered Data</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        <?php 
        $sql ="select * from `usersdata`.`users`";
        $result =  mysqli_query($connect, $sql);

        if($result){
          while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];

            echo'
            
             <tr>
            <td>'.$id.'</td>
            <td>'.$username.'</td>
            <td>'.$email.'</td>
            <td>'.$password.'</td>
            <td>
             <a href="./profileupdate.php?updateid='.$id.'"> <button class="btn btn-sm btn-primary">Update</button> </a>

             <a href="./delete.php?deleteid='.$id.'"> <button class="btn btn-sm btn-danger">Delete</button> </a>
              
            </td>
          </tr>
            
            
            ';


          };
        }
   
        ?>
          <!-- Sample Users -->
         
        
          <!-- Add more rows dynamically as needed -->
        </tbody>
      </table>
      </div>
  </div>
   <a href="./index.php">
    <button class = "btn btn-warning" >Add Users</button>
  </a>
</div>

<!-- Optional: Bootstrap Modal for View -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="viewModalLabel">User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Example Details -->
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Email:</strong> john@example.com</p>
        <p><strong>Password:</strong> *********</p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS: Simulate Modal Open -->
<script>
  const viewButtons = document.querySelectorAll('.btn-view');
  viewButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = new bootstrap.Modal(document.getElementById('viewModal'));
      modal.show();
    });
  });
</script>

</body>
</html>
