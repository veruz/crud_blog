<?php
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
        <h1>Login here:</h1>
            <form action="resources/check_login.php" method="post">
            Username: <input type="text" name="username" /><br/>
            Password: <input type="password" name="password" /><br/>
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>
