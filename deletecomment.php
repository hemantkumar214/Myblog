
        <?php       
        session_start();
echo  $comment_id=(int) $_GET['commentid'];
include 'dbconnect.php';
if (isset($_SESSION['name'])) {
    $mysql = "SELECT user_id , blog_id FROM comment_detail WHERE comment_id=$comment_id";
    $user_id = mysqli_query($con, $mysql);
    $row = mysqli_fetch_array($user_id);
    echo $row[0];
    echo "blog id is";
    echo  $blogid=$row['blog_id'];
    echo "got it.";
    echo $_SESSION['id'];
    if ($row[0] == $_SESSION['id']) {
        $sql = "DELETE FROM comment_detail WHERE comment_id=$comment_id";
        if (mysqli_query($con, $sql)) {
            // echo "deleted";
           header("Location: Openblog.php?msg=  deleted. & blogid=$blogid ");
        }
    }
  else       
      header("Location: Openblog.php?msg=  you can't delete it. ");
}
else
    header("Location: index.php?msg= login your account  ");
        
        
        ?>
