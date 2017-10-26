<?php    
    include "db_connect.php";
    session_start();
    //get data from login form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //sanitze
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $stmt = $connection->prepare("SELECT * FROM blog_users WHERE username = ?");
    $stmt->bind_param('ss', $username);

    $stmt->execute();

    $result = $stmt->get_result();
    
    /*$sql = "SELECT * FROM blog_users WHERE username = '$username'";
    $result =  mysqli_query($connection, $sql);*/

    $_SESSION[$username] = "$username";
    $_SESSION[$password] = "$password";

    //count entries. if result == 0 -> INSERT
    $count = mysqli_num_rows($result);
    if ($count==0){
        $sql = "INSERT INTO blog_users (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($connection, $sql)) {
            header("Location: ../index.php");
        }else{
            echo "Error: " .$sql. "<br/>" .mysqli_error($connection);
        }
               
    }else{
        echo "User with that name already exists.";
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