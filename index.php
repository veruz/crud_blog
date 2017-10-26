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
        <p>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br></p>
        <?php
            $sql = "SELECT postID, postTitle, postDesc, postCont, postDate FROM blog_posts ORDER BY postID desc";
            $result = $connection->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<a href="blog_post?pID='.$row["postID"].'">'.$row["postTitle"].'</br></a>';
                    echo  "<br>Description: " .$row["postDesc"]. "<br>Date: " .$row["postDate"]. "<br><br>";       
                    echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br><br>";
                }
            }else {
                echo "No posts!";
            }
        ?>

        <div id="footer"><br>
                <a href="https://github.com/veruz">/github</a>
                <a href="about.php">/sysinfo</a>
                </div>
        </div>
    </body>
</html>