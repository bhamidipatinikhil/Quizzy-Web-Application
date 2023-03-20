<?php

include "partials/dbconnect.php";

$quizname = "Quiz 1";
$questions = array(
    1 => "Which one is the smallest ocean in the world?",
    2 => "Which country gifted the Statue of Liberty to USA in 1886?", 
    3 => "Dead Sea is located between which two countries?",
    4 => "In which ocean Bermuda Triangle region is located?",
    5 => "Which country is known as the Playground of Europe?",
    6 => "Which of the following is the capital of Arunachal Pradesh?",
    7 => "Which is the largest coffee-producing state of India?",
    8 => "Which is the Capital of Mizoram?",
    9 => "Which state has the largest area?",
    10 => "Which is the national sport of india?",
);
$questions = json_encode($questions);
$options = array(
    1 => ["Indian", "Pacific", "Atlantic", "Arctic"],
    2 => ["Canada", "France", "Brazil", "England"],
    3 => ["Jordan and Israel", "Jordan and Sudan", "Turkey and UAE", "UAE and Egypt"],
    4 => ["Arctic", "Pacific", "Indian", "Atlantic"],
    5 => ["Austria", "Holland", "Switzerland", "Italy"],
    6 => ["Itanagar", "Dispur", "Imphal", "Panaji"],
    7 => ["Kerala", "Tamil Nadu", "Karnataka", "Rajasthan"],
    8 => ["Aizwal", "Jaipur", "Gangtok", "Khawzawl"],
    9 => ["Maharashtra", "Madhya Pradesh", "Uttar Pradesh", "Rajasthan"],
    10 => ["Cricket", "Hockey", "Football", "Kho-Kho"]
);
$options = json_encode($options);
$correctanswers = array(
    1 => 4,
    2 => 2,
    3 => 1,
    4 => 4,
    5 => 3,
    6 => 1,
    7 => 3,
    8 => 1,
    9 => 4,
    10 => 2,
);
$correctanswers = json_encode($correctanswers);
$scoressorted = array();
$scoressorted = json_encode($scoressorted);


$sql = "insert into `quizzes`(id, quizname, questions, options, correctanswers, scoressorted) values (1, '$quizname', '$questions', '$options', '$correctanswers', '$scoressorted')";
$result = mysqli_query($conn, $sql);


?>