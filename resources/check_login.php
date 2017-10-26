<?php
    include "db_connect.php";
    //get data from login form
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //sanitze
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $stmt = $connection->prepare("SELECT * FROM blog_users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);

    $stmt->execute();

    $result = $stmt->get_result();
    /*$sql = "SELECT * FROM blog_users WHERE username = '$username' and password = '$password'";
    $result =  mysqli_query($connection, $sql);*/
    while($row = $result->fetch_assoc()) {
         $_SESSION['uID'] = $row["userID"];
         $uID = $_SESSION['uID'];
         $_SESSION['uName'] = "$username";
         $_SESSION['last_login'] = $row['last_login'];
    }

    
    $count = mysqli_num_rows($result);
    if ($count==1){
        //Add user "status" later for several admins.
        $sql2 = "UPDATE blog_users SET last_login = NOW() WHERE userID = $uID";
        $result2 =  mysqli_query($connection, $sql2);
        if ($uID == 1) {
            header("Location: ../admin_panel.php");
        }else{
            header("Location: ../index.php");
        }       
    }else{
        echo "<body>Wrong username or password.</body>";
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