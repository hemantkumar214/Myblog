
    <body>
        <?php
        session_start();
              echo "helo";
      echo     $title=$_POST['title'];
      echo     $desc=$_POST['desc'];
      echo     $blog_id=$_SESSION['blog_id'];
        include 'dbconnect.php';
        
        $sql= "UPDATE blog_detail
               SET blog_title='$title' , blog_content='$desc'
               WHERE blog_id=$blog_id ";
        if(mysqli_query($con , $sql))
                 header("Location: showblog.php?msg= blog updated "); 
        else
             header("Location: updateblog.php?msg= connection problem  "); 
        ?>
   
