<?php

session_start();

$username = $_SESSION['username'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $quizname = $_POST['name'];

  $_SESSION['currentquizname'] = $quizname;
  header("location: attemptquiz.php");

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
		.head1 {
			font-size:40px;
			color:#009900;
			font-weight:bold;
		}
		.head2 {
			font-size:17px;
			margin-left:10px;
			margin-bottom:15px;
		}
		body {
			margin: 0 auto;
			background-position:center;
			background-size: contain;
		}
	
		.menu {
			position: sticky;
			top: 0;
			background-color: #009900;
			padding:10px 0px 10px 0px;
			color:white;
			margin: 0 auto;
			overflow: hidden;
		}
		.menu a {
			float: left;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 20px;
		}
		.menu-log {
			right: auto;
			float: right;
		}
		footer {
			width: 100%;
			bottom: 0px;
			background-color: #000;
			color: #fff;
			position: absolute;
			padding-top:20px;
			padding-bottom:50px;
			text-align:center;
			font-size:30px;
			font-weight:bold;
		}
		.body_sec {
			margin-left:20px;
		}
	</style>
</head>
  <body>
    
    <!-- Header Section -->
	<header>
		<div class="head1">QUIZZY QUIZ PLATFORM</div>
		<div class="head2">You have logged in</div>
	</header>
	
	<!-- Menu Navigation Bar -->
	<nav class="menu">
		<a href="home.php">HOME</a>
		<a href="quizzeslist.php">QUIZZES LIST</a>
		<a href="#profile">PROFILE</a>
        <a href="logout.php">LOGOUT</a>
		<div class="menu-log">
		</div>
	</nav>
	
	<!-- Body section -->
	<main class = "body_sec">
		<section id="Content">
			<h3><center>
            <h1>Welcome <?php echo $username ?></h1>

            </center></h3>
		</section>



    <h3>QUIZ LIST</h3>
  <table border="15px" width="100%"  bgcolor="white" font-size: 30px;>
    <?php
      include "partials/dbconnect.php";

      $sql = "select * from quizzes";
      $result = mysqli_query($conn, $sql);
      $currentquizname = "";
      $nquizes = mysqli_num_rows($result);
      echo '<form action="quizzeslist.php" method="POST" id="quizzify"><table>';
      for($i = 0; $i < $nquizes; $i++){
        $row = mysqli_fetch_assoc($result);

        $quizname = $row['quizname'];

        echo '<tr bgcolor="pink">
        <th>'. $quizname. '</th>
        <th><input type="submit" name="'. $quizname. '" value="Attempt" onclick=""></th>
    </tr>';
      }

      echo "</table></form>";


    ?>
</table>
	</main>




  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>