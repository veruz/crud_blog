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
                    echo '<a href="favourites.php">/favourites</a>'." ".
                    '<a href="logout.php">/logout</a>';
                }else{
                    echo '<a href="login.php">/login</a>'." ".
                    '<a href="register.php">/register</a>';
                }
    ?>
    <h1>#CYB3R_CrUD</h1>
    <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br></p>
    <?php
                
                $sql = "SELECT post_views.postID, post_views.view_count, blog_posts.postID, blog_posts.postTitle 
                        FROM post_views, blog_posts 
                        WHERE post_views.postID = blog_posts.postID 
                        ORDER BY postDate desc";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<a href="blog_post?pID='.$row["postID"].'">'.$row["postTitle"].'</br></a>';
                        echo  "<br>Page Views: " .$row["view_count"]."<br><br>";       
                        echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br>";
                    }
                }

    ?>
    </body>
</html>