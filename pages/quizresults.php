
<?php
include 'partials/navbar.php';

session_start();
include 'partials/dbconnect.php';
$currentquizname = $_SESSION['currentquizname'];
$sql = "select * from quizzes where quizname='{$currentquizname}'";
$result = mysqli_query($conn, $sql);

// echo gettype($result);

$row = mysqli_fetch_assoc($result);
// echo $row['correctanswers'];
$correctanswers = $row['correctanswers'];
// echo $correctanswers;

$correctanswers = json_decode($correctanswers, true);
// echo $correctanswers;

$optionsselected = $_SESSION['optionsselected'];
echo "You answered:: ". count($optionsselected);
echo "<br>";

$score = 0;
foreach($optionsselected as $name => $value){
    $key = str_replace("answer", "", $name);
    // $key = $name;
    // echo $name;
    // echo $key;
    if($correctanswers[$key] == $value){
        $score++;
    }
}

echo "Your Score:: " . $score;

$scores = json_decode($row['scoressorted'], true);

$username = $_SESSION['username'];

$scores[$username] = $score;


arsort($scores);

$scores = json_encode($scores);
$sql2 = "update quizzes set scoressorted = '{$scores}' where quizname = '{$currentquizname}'";

$result2 = mysqli_query($conn, $sql2);

$sql3 = "";

$scores = json_decode($scores);

echo "<br><br>LeaderBoard:: <br>";
$j = 1;
foreach($scores as $username => $score){
    echo $j . ".) ";
    echo "Username:: ".  $username. "  |  Score::  ". $score;
    echo "<br>"; 
}





?>