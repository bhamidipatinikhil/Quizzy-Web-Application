<?php

session_start();

echo $_SESSION['currentquizname'];
// echo $_SESSION['currentquizcontent'];

$currentquizname = $_SESSION['currentquizname'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['optionsselected'] = $_POST;
    header('location: quizresults.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../styles/attemptquiz.css" > -->
</head>
  <body>
    <?php
        include "partials/dbconnect.php";

        $sql = "select * from quizzes where quizname = '{$currentquizname}'";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        $nquizzes = mysqli_num_rows($result);

        if($nquizzes==1){
            $row = mysqli_fetch_assoc($result);

            $questions = $row['questions'];
            $questions = json_decode($questions, true);
            
            $options = json_decode($row['options'], true);
            $correctanswers = json_decode($row['correctanswers'], true);

            $nquestions = count($questions);
            
            echo "<div class='quiz-container' id='quiz'>
            <form method='post' action='attemptquiz.php'>
            <div class='quiz-header'>
            
            <ol>";
            for($i = 0; $i < $nquestions; $i++){
                echo "
                <li>
                    <h2 id='question'>{$questions[$i+1]}</h2>
                    <ul>
                        <li>
                            <input type='radio' name='answer". ($i+1). "' id='answer". ($i+1). "a' class='answer' value='a'>
                            <label for='answer". ($i+1). "a'>A) {$options[$i+1][0]}</label>
                        </li>
                        <li>
                            <input type='radio' name='answer". ($i+1). "' id='answer". ($i+1). "b' class='answer' value='b'>
                            <label for='answer". ($i+1). "b'>B) {$options[$i+1][1]}</label>
                        </li>
                        <li>
                            <input type='radio' name='answer". ($i+1). "' id='answer". ($i+1). "c' class='answer' value='c'>
                            <label for='answer". ($i+1). "c'>C) {$options[$i+1][2]}</label>
                        </li>
                        <li>
                            <input type='radio' name='answer". ($i+1). "' id='answer". ($i+1). "d' class='answer' value='d'>
                            <label for='answer". ($i+1). "d'>D) {$options[$i+1][3]}</label>
                        </li>
                    </ul>
                </li>";
            }
            echo "</ol>

            </div>
            <input type='submit' value='Submit' class='submitbtn' />
            </form>
          </div>";


        }

    ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>