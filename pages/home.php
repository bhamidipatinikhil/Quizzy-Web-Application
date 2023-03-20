<?php

session_start();

$username = $_SESSION['username'];


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
    <link rel="stylesheet" href="../styles/homestyle.css">
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
	</main>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>