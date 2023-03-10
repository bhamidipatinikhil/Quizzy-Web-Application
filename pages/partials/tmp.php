<?php
session_start();

$currentquizname = $_SESSION['currentquizname'];
echo $currentquizname;
include "partials/dbconnect.php";

$sql = "select * from quizzes where quizname = '$currentquizname'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo jb($row['questions']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>