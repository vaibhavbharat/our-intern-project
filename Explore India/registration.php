<?php
require_once("./config.php");
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["cpassword"];
  $users = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($users) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO users (username,email,password) VALUES('$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      '<script>alert("Registered Successfully")</script>';
    }
    else{
      echo
      '<script> alert("Password Does Not Match"); </script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <?php include("./includes/scripts.php"); ?>
</head>
<body>

<style>
body {
  background-image: url('./explo/log pic.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>



<?php include("./includes/navbar.php"); ?>

<div class="d-flex justify-content-center mt-5">
<div class="" style="width: 18rem;">
  <img src="">
  <div class="">
  <form action="" method="POST">
  <div class="form-group">
    <label for="username">User name</label>
    <input type="text" class="form-control" id="username" name="username">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted" ></small>
  </div>
  <div class="alert alert-danger" id="wrong-password" role="alert" onkeyup="mail()" style="display:none;">
  Password Doesn't Match
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="cpassword" onkeyup="check()">
  </div>
  <div class="alert alert-danger" id="wrong-password" role="alert" style="display:none;">
  Password Doesn't Match
</div>
  <button type="submit" value="submit" name="submit" id="button" class="btn btn-primary" abled> Register</button>
  <small id="emailHelp" class="form-text text-muted">Already have an Account ? <a href="./login.php">   <p style="color:black;">   <b>Click Here <b><p></a></small>
</form>
  </div>
</div>
</div>



<?php include("./includes/footer.php") ?>
<script>
    const password = document.getElementById("password");
    const cpassword = document.getElementById("cpassword");
    const submit = document.getElementById("button");
    const wrongPassword = document.getElementById("wrong-password");
    function check(){
        if(password.value === cpassword.value){
            submit.removeAttribute("disabled");
            wrongPassword.style.display="none";
        }else{
          wrongPassword.style.display="block";
          submit.setAttribute("disabled","true");
        }

      
    }
</script>
    
</body>
</html>