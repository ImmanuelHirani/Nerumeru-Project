<?php
  include 'signIn-Up.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="asset/css/SignUp/SignUp.css    " />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <title>Sign Up | NeruMeru</title>
  </head>

  <style>

  .side-image {
    position: relative;
    bottom: 10px;
    right: 12px;

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
          <div class="col-lg-6 col-sm-12 col-md-6 side-image">
            <!-------Image-------->
            <img class="" src="asset/img/DogBG.jpg" alt="" />
            <div class="text"></div>
          </div>
          <div class="col-lg-6 col-sm-12 col-md-6 right">
            <div class="input-box">
              <header style="position: relative; top:10px">Create account</header>
              <form method="POST" enctype="multipart/form-data">
                <div class="input-field">
                  <input type="text" class="input" id="username" name="uname" required/>
                  <label for="username">Username</label>
                </div>
                <div class="input-field">
                  <input type="email" class="input" id="email" name="em" required />
                  <label for="email">Email</label>
                </div>
                <div class="input-field">
                  <input type="password" class="input" id="password" name="pass" required />
                  <label for="password">Password</label>
                </div>
                <div class="input-field">
                  <input type="tlp" class="input" id="tlp" name="tlp" required/>
                  <label for="text">No Telephone</label>
                </div>
                <div class="input-field">
                  <button class="btn btn-submit" name="submit">Sign Up</button>
                </div>
                <div class="signin">
                  <span style="position: relative; bottom:17px">Already have an account? <a href="Login.php">Sign-in Here</a></span>
                </div>
              </form>
              <?php
                if( isset($_POST["submit"]) ) {

                    // Cek apakah data berhasil di tambahkan atau tidak 
                    if( signUp_user($_POST) > 0 ) {
                        echo "<script>
                                    alert('Sign Up Successful!');
                                    window.location.href = 'Login.php';
                                </script>";
                    } else {
                        if($_POST["pass"] != $_POST["pass"]){
                            echo "<script>
                                        alert('Password and Confirm Password Does Not Match!');
                                        window.location.href = 'SignUp.php';
                                    </script>";
                        } else {
                            echo "<script>
                                        alert('The Username or Email Hasl Already Been Used!');
                                        window.location.href = 'SignUp.php';
                                    </script>";
                        }
                    }
                }   
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- <script>
    // mendapatkan referensi ke elemen tombol "Sign Up"
    const signUpButton = document.querySelector('.btn-submit');

    // menambahkan event listener untuk menangani klik tombol "Sign Up"
    signUpButton.addEventListener('click', function () {
      // menampilkan pesan peringatan
      alert('Pendaftaran berhasil!');
    });
  </script> -->
</html>
