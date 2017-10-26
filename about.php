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
                    echo '<a href="admin_panel.php">/root</a>'." ";
                }
                 echo '<a href="index.php">/home</a>'." ";
                echo '<a href="favourites.php">/favourites</a>'." ".
                '<a href="logout.php">/logout</a>';
            }else{
                 echo '<a href="index.php">/home</a>'." ";
                echo '<a href="login.php">/login</a>'." ".
                '<a href="register.php">/register</a>';
            }
        ?>
    <h1>#CYB3R_CrUD</h1>
        <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></p>
        <p>Cybercrud is a simple XAMPP stack based blog, created by V. Kyriakidis as his 2016-2017 semester project for the Internet Applications course.</p>
    </body>
</html>