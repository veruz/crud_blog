<?php
        include "db_connect.php";
        session_start();

        //get data from submit form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];

        // escape variables because symbols mess up the database entry
        $title = mysqli_real_escape_string($connection, $title);
        $description = mysqli_real_escape_string($connection, $description);
        $content = mysqli_real_escape_string($connection, $content);

        $sql = "INSERT INTO blog_posts (postTitle, postDesc, postCont, postDate) VALUES ('$title', '$description', '$content', NOW())";

        if (mysqli_query($connection, $sql)) {
            echo "Blog post added!";
            header("Location: ../admin_panel.php");
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