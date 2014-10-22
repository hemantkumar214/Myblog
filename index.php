
<?php
session_start();
include 'dbconnect.php';
$p=$_GET['p'];
$msg3=$_GET['msg3'];
$msg1=$_GET['msg1'];
$msg2=$_GET['msg2'];
if($p==1)
{ 
 echo '<script src="js/jquery-2.0.3.js"></script>
     <script type="text/javascript">   
    $(document).ready(function(){
   showSignUP();
   });
     </script>';
 
}

if(isset($_SESSION['name']))
{
    header("Location: showblog.php?msg= hello friends ");
    exit (0);
}
?>



<html lang="en">
<head>
  <title>My new webpage</title>
  <link rel="stylesheet" href="css/bootstrap.css">
   <script src="js/jquery-2.0.3.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
 
<style>

img{
	width: 100%;
	height: 100%;
	position: absolute;
	z-index: -1;
}

A:hover {
 color: #1CE62A /*The color of the mouseover or 'hover' link*/
}

.wrapper {
    width: 100%;
    height: 60px;
    background : #000000;
    background : -webkit-gradient(linear, left top, left bottom, from(rgb(168,168,168)), to(rgb(20,20,20)));
    background : -moz-linear-gradient(top, rgb(168,168,168), rgb(20,20,20));
    border-top: 2px solid #939393;
    position: relative;
    margin-bottom: 30px;
}


ul {
    margin: 0;
    padding: 0;
}
 
ul.menu {
    height: 0px;
    border-left: 1px solid rgba(0,0,0,0.3);
    border-right: 1px solid rgba(255,255,255,0.3);
    float:left;
}
 
ul.menu li {
    list-style: none;
    float:left;
    height: 58px;
    text-align: center;
    background: -webkit-gradient(radial, 50% 100%, 10, 50% 50%, 90, from(rgba(31,169,244,1)), to(rgba(0,28,78, 1)) );
    background: -moz-radial-gradient(center 80px 45deg, circle cover, rgba(31,169,244,1) 0%, rgba(0,28,78, 1) 100%);
    }
 
ul li a {
    display: block;
    padding: 0 20px;
    border-left: 1px solid rgba(255,255,255,0.1);
    border-right: 1px solid rgba(0,0,0,0.1);
    text-align: center;
    line-height: 58px;
    background : -webkit-gradient(linear, left top, left bottom, from(rgb(168,168,168)), to(rgb(20,20,20)));
    background : -moz-linear-gradient(top, rgb(168,168,168), rgb(20,20,20));
    -webkit-transition-property: background;
    -webkit-transition-duration: 700ms;
    -moz-transition-property: background;
    -moz-transition-duration: 700ms;
    }
 
ul li a:hover {
    background: transparent none;
}


.container1 {
  margin: 50px auto;
  width: 640px;
}
#div2{
    display: none;
}
 
.login {
  position: relative;
  margin: 0 auto;
  padding: 20px 20px 20px;
  width: 310px;
  background-color: #B7BFC1;

}

.login p.submit {
  text-align: right;
}
 
.login-help {
  margin: 20px 0;
  font-size: 11px;
  color: white;
  text-align: center;
  text-shadow: 0 1px #2a85a1;
}
 
.login-help a {
  color: #cce7fa;
  text-decoration: none;
}
 
.login-help a:hover {
  text-decoration: underline;
}
 
:-moz-placeholder {
  color: #c9c9c9 !important;
  font-size: 13px;
}
 
:-webkit-input-placeholder {
  color: #ccc;
  font-size: 13px;
}

.login:before {
  content: '';
  position: absolute;
  top: -8px;
  right: -8px;
  bottom: -8px;
  left: -8px;
  z-index: -1;
  background: rgba(0, 0, 0, 0.08);
  border-radius: 4px;
}
 
.login h1 {
  margin: -20px -20px 21px;
  line-height: 40px;
  font-size: 15px;
  font-weight: bold;
  color: #555;
  text-align: center;
  text-shadow: 0 1px white;
  background: #f3f3f3;
  border-bottom: 1px solid #cfcfcf;
  border-radius: 3px 3px 0 0;
  background-image: -webkit-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -moz-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -o-linear-gradient(top, whiteffd, #eef2f5);
  background-image: linear-gradient(to bottom, whiteffd, #eef2f5);
  -webkit-box-shadow: 0 1px #f5f5f5 ;
  box-shadow: 0 1px #f5f5f5 ;
}
 
.login p {
  margin: 20px 0 0;
}
 
.login p:first-child {
  margin-top: 0;
}
 
.login input[type=text], .login input[type=password] {
  width: 278px;
}
 
.login p.remember_me {
  float: left;
  line-height: 31px;
}
 
.login p.remember_me label {
  font-size: 12px;
  color: #777;
  cursor: pointer;
}
 
.login p.remember_me input {
  position: relative;
  bottom: 1px;
  margin-right: 4px;
  vertical-align: middle;
}

input {
  font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
  font-size: 14px;
}
 
input[type=text], input[type=password] {
  margin: 5px;
  padding: 0 10px;
  width: 200px;
  height: 34px;
  color: #404040;
  background: white;
  border: 1px solid;
  border-color: #c4c4c4 #d1d1d1 #d4d4d4;
  border-radius: 2px;
  outline: 5px solid #eff4f7;
  -moz-outline-radius: 3px;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}
 
input[type=text]:focus, input[type=password]:focus {
  border-color: #7dc9e2;
  outline-color: #dceefc;
  outline-offset: 0;
}
 
input[type=submit] {
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  background-image: -webkit-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: -moz-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: -o-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: linear-gradient(to bottom, #edf5f8, #cde5ef);
  -webkit-box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
  box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
}
.element{
    position:fixed; 
    top:85%; 
    left: 35%
}


</style>

<script type="text/javascript">

$(document).ready(function(){

  $("#list1").click(function(){
   
    $("#div2").hide().delay( 1300 );
    $("#div1").fadeToggle("slow");
    
  });

  $("#list2").click(function(){
    $("#div1").hide().delay( 1300 );    
    $("#div2").fadeToggle("slow");

  });
});





function showSignUP()
{
  
    $("#div1").hide().delay( 1300 );    
    $("#div2").fadeToggle("slow");
   
}

 function validateForm2(form2)
        {
      
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
           
            
        
              var username = form2.uid.value.trim();
              
               var email = form2.eid.value.trim();
              var pass = form2.pid.value.trim();
               var conpass = form2.cpid.value.trim();                          
                   
             
              if(username=='')
              {
              alert("enter username");
              return false;
              }
               if(email=='')
              {
              alert("enter email id");
              return false;
              }
              if(pass=='')
              {
              alert("enter password");
              return false;
              }
              if(conpass=='')
              {
              alert("enter confirm password");
              return false;
              }                     
                      
              
              else{
              
                     if (!filter.test(email))
                        { 
                         alert('Please provide a valid email address');
                         email.focus;
                         return false;
                        }
                       if(pass!=conpass) 
                       {
                       alert('password does not match');
                       return false;
                       }
              
                   }             
                   
      }







        
      function validateForm1()
        {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
           
             
        
              var email = document.getElementById('email');
              var pass = document.getElementById('pass');
            
              if(email.value.trim()=="")
              {
                    alert("enter email id");
                    return false;
              }
              else{
              
                     if (!filter.test(email.value))
                        {
                         alert('Please provide a valid email address');
                         email.focus;
                         return false;
                        }
                     else
                        {
                            if(pass.value.trim()=='')
                             {
                             alert("enter password");
                            return false;
                            }
                         }  
              
                   }             
                   
      }

</script>

</head>
<body>
    
<img src="05.jpg" alt="Responsive image"></image>

<div class="wrapper">

</div>

<div style="margin-top:-2%; margin-left:80%;">
	<ul class="pull-right list-inline">
		<li id="list1"><button  type="button" class="btn btn-info">Sign in</button></li>
		<li id="list2"><button  type="button" class="btn btn-info">Sign Up</button></li>
	</ul>
</div style>
     

<div class="container1" id="div1">
  <div class="login">
    <h1>Login</h1>
    <form name="signinform" action ="sign_process.php" method="post" onsubmit="return validateForm1();">
      <p style="margin-left:-3%"><input type="text" name="emailid" id="email" value="" placeholder=" Email_Id"></p>
      <p style="margin-left:-3%"><input type="password" name="pass" id="pass" value="" placeholder="Password"></p>
      <p class="remember_me" style="margin-left:-3%">
        <label>
         <label>
          <input type="checkbox" name="chkbx" id="remember_me">
          Remember me on this computer
        </label>
        </label>
      </p>
      <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
    
    <p id="msg1"> <?php   
echo  "&nbsp&nbsp<b>".$msg1."</b>" ; 
echo  "&nbsp&nbsp<b>".$msg2."</b>" ; 
   $msg1='';
   $msg2='';
        ?> </p>
  </div>
 
  <div class="login-help">
    <p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
  </div>
</div>

<div class="container1" id="div2">
  <div class="login">
    <h1>Sign Up</h1>
    <form  name="myform"  action="Register.php" method="post" onsubmit="return validateForm2(this);" >
      <p style="margin-left:-3%"><input type="text" name="username" id="uid" value="" placeholder="User Name"></p>
      <p style="margin-left:-3%"><input type="text" name="email_id" id="eid" value="" placeholder="Email Address"></p>
      <p style="margin-left:-3%"><input type="password" name="pass" id="pid" value="" placeholder="Password"></p>
      <p style="margin-left:-3%"><input type="password" name="con-pass" id="cpid" value="" placeholder="Confirm Password"></p>
      <p class="remember_me" style="margin-left:-3%">
        <label>
         <label>
          <input type="checkbox" name="chkbx" id="remember_me">
          Remember me on this computer
        </label>
        </label>
      </p>
      <p class="submit"><input type="submit" name="commit" value="Sign Up"></p>
    </form>
    
       <p id="msg3"> <?php   
echo  "&nbsp&nbsp<b>".$msg3."</b>" ; 

        ?> </p>
    
  </div>
</div>



<div class="element" style="color:white;" id="msg1">
    <h1 ALIGN="CENTER">Welcome To The Website</h1>
</div>

</body>
