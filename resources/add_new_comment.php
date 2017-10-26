<?php
        include "db_connect.php";
        session_start();
        //get data from submit form
        $postID = $_SESSION['pID'];
        $userID = $_SESSION['uID'];
        $commentContent = $_POST['commentContent'];

        $commentContent = mysqli_real_escape_string($connection, $commentContent);

        $sql = "INSERT INTO blog_comments (postID, userID, commentCont, commentDate) VALUES ('$postID', '$userID', '$commentContent', NOW())";

        if (mysqli_query($connection, $sql)) {
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }else{
            echo "Error: " .$sql. "<br/>" .mysqli_error($connection);
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