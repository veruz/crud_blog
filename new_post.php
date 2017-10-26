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
        if (isset($_SESSION['uID'])) {
            echo $_SESSION['uName']."@CYB3R_CrUD:~$  ";
            if($_SESSION['uID'] == 1){
                echo '<a href="index.php">/home</a>'." ";
                echo '<a href="admin_panel.php">/root</a>'." ";
                echo '<a href="logout.php">/logout</a>';
            }else{
                header('Location: index.php');
            }
        }  
    ?>
    <h1>#CYB3R_CrUD</h1>
    <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></p>    
            <form action="resources/add_new_post.php" method="post">
            Post Title:<br><input type="title" name="title" /><br><br>
            Post Description:<br><input type="description" name="description" /><br><br>
            Post Content:<br><textarea id="content" class="text" cols="75" rows ="15" name="content"></textarea><br><br>
            <input type="submit" value="Post"/>
    </body>
</html>