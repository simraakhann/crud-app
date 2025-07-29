<?php

include 'connection.php';

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    
    $sql = "insert into `usersdata`.`users` 
    (username, email, password)
    values ('$username', '$email', '$password')";

  $result =  mysqli_query($connect, $sql);

  if($result){
      echo "
        <script>
            alert('form has been submitted');
            window.location.href = 'display.php';
        </script>

      ";
    //   header('location: display.php');
  }else{
    die(mysqli_connect_error());
  }

  mysqli_close($connect);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    

</head>
<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5"><u>Create an account</u></h2>

              <form method="post" id="registerForm" novalidate>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="username" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <div class="invalid-feedback text-danger mt-1"></div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                  <div class="invalid-feedback text-danger mt-1"></div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <div class="invalid-feedback text-danger mt-1"></div>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit" data-mdb-button-init
                    data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>


<script>
  document.getElementById("registerForm").addEventListener("submit", function (e) {
    let isValid = true;

    const name = document.getElementById("form3Example1cg");
    const email = document.getElementById("form3Example3cg");
    const password = document.getElementById("form3Example4cg");

    const fields = [name, email, password];

    fields.forEach(field => {
      const errorDiv = field.parentElement.querySelector('.invalid-feedback');

      if (field.value.trim() === "") {
        field.classList.add("is-invalid");
        errorDiv.textContent = "This field is required";
        isValid = false;
      } else {
        field.classList.remove("is-invalid");
        errorDiv.textContent = "";
      }
    });

    if (!isValid) {
      e.preventDefault(); // prevent form from submitting
    }
  });
</script>

</html>