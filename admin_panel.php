<?php
//connection to DB
include 'resources/db_connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>#CYB3R_CrUD</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body>
        <?php
            echo $_SESSION['uName']."@CYB3R_CrUD:~$  ";
            if (isset($_SESSION['uID'])) {
            if($_SESSION['uID'] == 1){
                echo '<a href="index.php">/home</a>'." ";
                echo '<a href="favourites.php">/favourites</a>'." ".
                '<a href="logout.php">/logout</a>';
            }else{
                header('Location: index.php');
            }
        }  
        ?>
        <h1>#CYB3R_CrUD</h1>
        <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></p>
             *<br>
             |_ _ _ _ <a href="new_post.php">/mkfile</a><br><br>            
             |_ _ _ _ <a href="new_comments.php">/updates</a><br><br>
             |_ _ _ _ <a href="page_views.php">/stats</a><br><br>
        <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></p>
    </body>
</html>