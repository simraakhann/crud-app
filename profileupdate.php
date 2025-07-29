
<?php

include 'connection.php';

$id = $_GET['updateid'];
// echo $id;
 $sql ="select * from `usersdata`.`users` where id=$id";
        $result =  mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];



if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    
    $sql = "update `usersdata`.`users` set
  `username`='$username',
 `email`='$email',
  `password`='$password'
  where `users`.`id`='$id'";


  $result =  mysqli_query($connect, $sql);

  if($result){
      echo "
        <script>
            alert('update has been submitted');
            window.location.href = 'display.php';
        </script>

      ";
    //   header('location: display.php');
  }else{
    die(mysqli_connect_error());
  }

  mysqli_close($connect);

}
// echo $id;
// echo $username;
// echo $email;
// echo $password;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Styles -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-header {
      background: linear-gradient(to right, #0d6efd, #6610f2);
      color: white;
      border-radius: .5rem .5rem 0 0;
      padding: 2rem;
    }
    .form-control:focus {
      border-color: #6610f2;
      box-shadow: 0 0 0 .25rem rgba(102, 16, 242, 0.25);
    }
    .success-message {
      display: none;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="card shadow">
    <div class="profile-header d-flex justify-content-between align-items-center">
      <h3 class="mb-0">Welcome, <span id="profileName"></span><u><?php echo $username?></u></h3>
      <a href="./display.php"></a><button class="btn btn-outline-light">Back to registered data</button>
    </div>

    <div class="card-body">
      <!-- <div class="alert alert-success success-message" id="successMsg">
        ✅ Your profile was updated successfully!
      </div> -->

      <form id="profileForm" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Full Name</label>
          <input type="text" class="form-control" name="username" id="username" value=<?php echo $username?> >
          <div class="invalid-feedback">Please enter your full name.</div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" value=<?php echo $email?>>
            <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" value=S<?php echo $password?>>
            <div class="invalid-feedback">Password must be at least 6 characters.</div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary w-100">💾 Save Changes</button>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS (optional for UI interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</body>
<script>
document.getElementById('profileForm').addEventListener('submit', function (e) {
  // Get form fields
  const username = document.getElementById('username');
  const email = document.getElementById('email');
  const password = document.getElementById('password');

  // Reset all previous errors
  [username, email, password].forEach(field => {
    field.classList.remove('is-invalid');
  });

  let isValid = true;

  // Full Name validation
  if (username.value.trim() === '') {
    username.classList.add('is-invalid');
    isValid = false;
  }

  // Email validation (basic)
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email.value.trim())) {
    email.classList.add('is-invalid');
    isValid = false;
  }

  // Password validation
  if (password.value.trim().length < 6) {
    password.classList.add('is-invalid');
    isValid = false;
  }

  if (!isValid) {
    e.preventDefault(); // Prevent form from submitting if validation fails
  }
});
</script>

</html>
