 <?php
 session_start();
 require 'config.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login page</title>
<link rel="stylesheet" type="text/css" href="style.css"/> 	

 </head>
 <body style="background-color:#ecf0f1">
 <div id="main-wrapper">
 	<center>
 		<h2>Login Form</h2>
 		<img src="img/login.png" class="image"/>
 	</center>
 	<form class="myform"  action="login.php" method="post">
      <label><b>username :</b></label><br>
      <input type="text" name="username" class="inputvalues" placeholder="Type your username" required/><br>

      <label><b>password :</b> </label><br>
      <input type="password" name="password" class="inputvalues" placeholder="Type your password" required/><br>

      <input type="submit" name="login" id="login_btn" value="Login" /><br>
      
     <a href="register.php"> <input type="button" name="" id="register_btn" value="Register" />  </a>     
      
 	</form>
 	<?php
                if(isset($_POST['login'])) 
      {
      	
				@$username=$_POST['username'];
				@$password=$_POST['password']; 	 
				$query = "select * from records WHERE username='$username' AND password='$password'";
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				
						if(mysqli_num_rows($query_run)!=1)
						{
						echo '<script type="text/javascript">alert("invalid credentials")</script>';
						}
						else
						{   $_SESSION['username'] = $username;
							header("Location:homepage.php");
						}
						}
 	 ?>
 </div>
 
 </body>
 </html>