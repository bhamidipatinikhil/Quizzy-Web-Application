<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'partials/dbconnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $tagline = $_POST['tagline'];

    $sql = "insert into `players` (username, password, firstname, lastname, email, tagline) values ('$username', '$password', '$firstname', '$lastname', '$email', '$tagline')";
    $result = mysqli_query($conn, $sql);
    header("location: login.php");


}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        body {margin-left: 500px; margin-top: 10px}
    </style>

</head>
  <body>
  <div class="main">
       <h2>Register Here</h2>
	   <form action="registration.php"
	   id="register" method="post">
	   <label> First Name: </label>
	   <br>
	   <input type="text" required name="firstname" id="firstname" placeholder="Enter Your First Name">
	   <br><br>
	   <label> Last Name: </label>
	   <br>
	   <input type="text" required name="lastname" id="lastname" placeholder="Enter Your Last Name">
	   <br><br>
	   <label>Username:</label>
	   <br>
	   <input type="text" required name="username" id="username" placeholder="Enter Username">
	   <br><br>
	   <label>Email ID:</label>
	   <br>
	   <input type="email" required name="email" id="email" placeholder="Enter Your Valid Email Id">
	   <br><br>
       <label>Tagline</label>
	   <br>
	   <textarea required name="tagline" id="tagline" placeholder="Enter a short tagline about you"></textarea>
	   <br><br>
	   <label>Password:</label>
	   <br>
	   <input type="password" required name="password" id="password" placeholder="Enter your password">
       <br><br>
	   <label>Confirm Password:</label>
	   <br>
	   <input type="password" required name="cpassword" id="cpassword" placeholder="Re-enter Your Password"> 
	   <br><br>
	   <input type="submit" value="submit" name="submit" id="submit">
       <br><br>
</form>
	   </div>

       <button class="btn btn-primary" type="button" onclick="location.href='login.php'">Already Registered, Log in</button>




  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>