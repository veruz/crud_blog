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
        <?php
        if (isset($_GET['pID'])) {

            $blogPostID = $_GET['pID'];

            $sql = "SELECT postID, postTitle, postDesc, postCont, postDate 
                    FROM blog_posts WHERE postID = '$blogPostID'  
                    ORDER BY postID desc";
            
            $sql2 = "SELECT blog_comments.commentID, blog_comments.userID, blog_comments.postID, blog_comments.commentCont, blog_comments.commentDate, blog_users.username, blog_users.userID
                     FROM blog_comments, blog_users
                     WHERE postID = '$blogPostID' AND blog_users.userID = blog_comments.userID
                     ORDER BY commentID desc";

            $sql3 = "INSERT INTO post_views(postID, view_count) VALUES ('$blogPostID', 1) ON DUPLICATE KEY UPDATE view_count=view_count+1";

            $result = $connection->query($sql);
            $result2 = $connection->query($sql2);
            $result3 = $connection->query ($sql3);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h3>".$row["postTitle"]. "</h3><br>" . "<br><p>" .wordwrap($row["postCont"],85,"<br />\n"). "<p><br>Date: ".$row["postDate"]. "<br><br>";
                }
                if (isset($_SESSION['uID'])) {
                    echo '<a href="resources/add_favourite.php">/add_to_favourites</a><br>';
                }else{
                    echo "Log in to fave this!<br>";
                }
                echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br>"; 
                echo "<h3>Comments on this entry: </h3>";
                if ($result2->num_rows > 0) {
                    while($row = $result2->fetch_assoc()){
                        echo "&nbsp".$row['username'];
                        echo "<br> &nbspComment: " .$row["commentCont"]. "<br>&nbspDate: ".$row["commentDate"]. "<br><br>";
                    }
                }else{
                        echo "<br> &nbspNo comments on this post. Be the first to share your thoughts!<br>"; 
                }
                
                if (isset($_SESSION['uID'])) {
                    $_SESSION['pID'] = $blogPostID;
                    echo '<form action="resources/add_new_comment.php" method="post">
                    Comment:<br><br><textarea id="commentContent" class="text" cols="75" rows ="10" name="commentContent"></textarea><br>
                    <input type="submit" value="Comment"/>';                
                }else{
                    echo "Log in to comment!";
                }
            
            }else{
                echo "There is no post with this id!<br>";
            }
        }else {
            echo "No post!";
        }
            
        ?>

        <div id="footer"><br>
                <a href="https://github.com/veruz">/github</a>
                <a href="about.php">/sysinfo</a>
                </div>
        </div>
    </body>
</html>