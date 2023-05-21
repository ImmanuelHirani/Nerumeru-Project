<?php 
  include 'signIn-Up.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="asset/css/Log/Login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <title>Login | NeruMeru</title>
  </head>

  <style>
  .side-image {
    position: relative;
    bottom: 10px;
    left: 14px;
    border-radius: 10px 0 0 10px;
  }

  .side-image img {
    width: 100%;
    height: 100%;
    border-radius: 10px;
  }
  </style>

  <body>
    <div class="wrapper">
      <div class="container main">
        <div class="row">
          <div class="col-lg-6 col-sm-12 col-md-6 right">
            <div class="input-box">
              <header>Welcome Back</header>
              <form method="POST" >
                  <div class="input-field">
                      <input type="text" class="input" id="email" name="inUsEm" autocomplete="off" required/>
                      <label for="email">Username </label>
                  </div>
                  <div class="input-field">
                      <input type="password" class="input" id="password" name="inPass" required />
                      <label for="password">Password</label>
                  </div>
                  <div class="input-field">
                      <button class="btn btn-primary" type="submit" name="submit">Login</button> <!-- mengganti input submit dengan button -->
                  </div>
                  <div class="signin">
                      <span>Not Registered Yet? <a href="SignUp.php">Sign Up Here</a></span>
                  </div>
              </form>

              <?php
                  if(isset($_POST["submit"])){
                      if(signIn_user($_POST) > 0){
                          header("Location:index.php");
                      } else {
                          echo "<script>alert('Username / Email Address and Password does not match!');</script>";
                      }
                  }
              ?>
            </div>  
          </div>
          <div class="col-lg-6  col-sm-12 col-md-6 side-image ">
            <!-------Image-------->
            <img class="" src="asset/img/DogBG.jpg" alt="" />
            
          </div>
          
        </div>
      </div>
    </div>
  </body>
</html>
