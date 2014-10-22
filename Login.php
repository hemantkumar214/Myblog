

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="./assets/ico/favicon.png">
    <title>Signin Template for Login</title>   
    <link href="./dist/css/bootstrap.css" rel="stylesheet">   
    <link href="signin.css" rel="stylesheet">
 
    
    
    
    <script>
     function validateEmail()
    {
    var x=document.forms["myform"]["email_id"].value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
     alert("Not a valid e-mail address");
     return false;
    }    
    
  }
        
      function validateForm()
        {
         
            var x=document.forms["signinform"]["emailid"].value;
            if(x==""){
            alert ("enter email id");
            return false;
            }
            else
             {  if(validateEmail())
             {
                var y=document.forms["signinform"]["pass"].value;
                if(y=="")
                 {
                 alert ("enter password");
                  return false;
                 }
              }
              }
              }
      
        </script>
    
   
  </head>

  <body>   <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
               
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>


          <div class="page-header" >
  <h2>Welcome To The World Of Thoughts.......</h2>
</div>
    <div class="container">
        
        
     
        <?php 
   

echo  "&nbsp&nbsp<b>".$_GET['msg']."</b>" ;


        ?>

      <form class="form-signin" name="signinform" action ="sign_process.php" method="post" onsubmit="return validateForm();">
        <h2 class="form-signin-heading">Please sign in</h2>
         <input type="text" class="form-control" name="emailid" placeholder="Email_id" >
        
        <input type="password" class="form-control" name="pass"  placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me" name="chkbx"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
