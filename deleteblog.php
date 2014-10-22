<html></body>
<?php
session_start();
$blog_id = (int) $_GET['blogid'];
include 'dbconnect.php';
if (isset($_SESSION['name'])) {
    $mysql = "SELECT author_id FROM blog_detail WHERE blog_id=$blog_id";
    $author_id = mysqli_query($con, $mysql);
    $row = mysqli_fetch_array($author_id);
    echo $row[0];
    echo $_SESSION['id'];
    if ($row[0] == $_SESSION['id']) {
        $sql = "DELETE FROM blog_detail WHERE blog_id=$blog_id";
        if (mysqli_query($con, $sql)) {
            //  echo "deleted";
            $sql = "DELETE FROM comment_detail WHERE blog_id=$blog_id";
            if (mysqli_query($con, $sql))
                header("Location: showblog.php?msg= blog deleted ");
        }
    }
    else       
       header("Location: showblog.php?msg=  you can't delete it. ");
}
else
    header("Location: index.php?msg= login your account  ");
?>
</body></html>  
