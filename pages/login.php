<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

  include 'partials/dbconnect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "Select * from players where username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);

  $row = mysqli_fetch_assoc($result);
  $aadhaar = $row['aadhaar'];
  $phone = $row['phonenumber'];
  $nickname = $row['nickname'];
  $cap1 = false;
  $cap2 = false;
  $cap3 = false;


  if(array_key_exists('submit', $_POST)) {
    if(strpos($aadhaar, $_POST['aadhaar']) != false && strlen($_POST['aadhaar'])!=0){
      $cap1 = true;
    }

    if(substr($phone, strlen($phone)-4, strlen($phone)) == $_POST['phonenumber'] && strlen($_POST['phonenumber'])!=0){
      $cap2 = true;
    }

    if($nickname==$_POST['nickname'] && strlen($_POST['nickname'])!=0){
      $cap3 = true;
    }
  }



  if($num==1 && ($cap1 && $cap2 && $cap3)){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;

      $sql2 = "select firstname, lastname from players where username='$username'";
      $result2 = mysqli_query($conn, $sql2);
      $row = mysqli_fetch_assoc($result2);
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];

      header("location: home.php");
  }
}


?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
    body {
        margin-left: 500px;
        margin-top: 50px
    }
    </style>

</head>

<body>

    <div class="main">
        <h2>Login Here</h2>
        <form action="login.php" id="login" method="post">

            <label>Username:</label>
            <br>
            <input type="text" required name="username" id="username" placeholder="Enter Username">
            <br><br>

            <label>Password:</label>
            <br>
            <input type="password" required name="password" id="password" placeholder="Enter your password">
            <br><br>

            <label>Captcha Verification Option:: </label>
            <br>

            <label for="aadhaar">Enter any 4 digits Aadhaar</label>
            <input type="text" name="aadhaar" id="aadhaar" placeholder="Enter aadhaar any 4 digits continuously">
<br><br>
            <label for="phonenumber">Enter last 4 digits phone number</label>
            <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter last 4 digits phone number">

            <br><br>
            <label for="nickname">Enter nickname</label>
            <input type="text" name="nickname" id="nickname" placeholder="Enter nickname">


            <input type="submit" value="Login" name="submit" id="submit">

            <br><br><br><br><br>

        </form>

        <button class="btn btn-primary" type="button" onclick="location.href='registration.php'">Sign Up</button>

    </div>


    <script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>