<?php
//connection to DB
include 'resources/db_connect.php';
session_start();

$last_login = $_SESSION['last_login'];
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
                echo '<a href="admin_panel.php">/root</a>'." ";
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
        <?php
            $sql = "SELECT blog_posts.postID, blog_posts.postTitle, blog_comments.commentID, blog_comments.userID, blog_comments.postID, blog_comments.commentCont, blog_comments.commentDate, blog_users.username, blog_users.userID
                     FROM blog_posts, blog_comments, blog_users
                     WHERE blog_posts.postID = blog_comments.postID AND blog_users.userID = blog_comments.userID AND commentDate > '$last_login'
                     ORDER BY commentID desc";
            $result = $connection->query($sql);
            if ($result->num_rows >0) {
                echo "The following new comments were posted since the last time you logged in: <br><br>";
                while ($row = $result->fetch_assoc()) {
                    echo "&nbsp".$row['username']. " on " . '<a href="blog_post?pID='.$row["postID"].'">'.$row["postTitle"].'</a>';
                    echo "<br> &nbspComment: " .$row["commentCont"]. "<br>&nbspDate: ".$row["commentDate"]. "<br><br>";
                }
            }else{
                echo "There haven't been any new comments.";
            }
        ?>
        <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></p>
    </body>
</html>