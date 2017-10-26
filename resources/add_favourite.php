<?php
//connection to DB
include 'db_connect.php';
session_start();

$uID = $_SESSION['uID'];
$pID = $_SESSION['pID'];

$sql = "SELECT * FROM user_favourites WHERE userID = '$uID' AND postID = '$pID'";
$result =  mysqli_query($connection, $sql);
$count = mysqli_num_rows($result);
if ($count==0){
    $sql = "INSERT INTO user_favourites (userID, postID) VALUES ($uID, $pID)";
    if (mysqli_query($connection, $sql)) {
       header("Location: ../index.php");
    }else{
        echo "Error: " .$sql. "<br/>" .mysqli_error($connection);
    }
}else{
    echo "You already added this to your favourites!";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>#CYB3R_CrUD</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
    </body>
</html>