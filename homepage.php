 <?php
    session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Home page</title>
 	<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
 <body style="background-color:#ecf0f1">
 <div id="main-wrapper">
 	<center>
 		<h2>Home Page</h2>
 		<h3>welocme <?php echo  $_SESSION['username'] ; ?> </h3>
 		<img src="img/login.png" class="image"/>
 	</center>
 	<form class="myform"  action="homepage.php" method="post">

      <input type="submit" name="logout" id="logout_btn" value="Logout" /><br>

      
 	</form>
<?php
       if(isset($_POST['logout'])) {
       	session_destroy();
       	header('location:login.php');
       }
       ?>
 </div>
 
 </body>
 </html>  