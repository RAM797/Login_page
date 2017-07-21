 <?php
 session_start();
require 'config.php';
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Registration page</title>
 	<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
 <body style="background-color:#ecf0f1">
 <div id="main-wrapper">
 	<center>
 		<h2>Registration Form</h2>
 		<img src="img/login.png" class="image"/>
 	</center>
 	<form class="myform"  action="register.php" method="post">
      <label><b>username :</b></label><br>
      <input type="text" name="username" class="inputvalues" placeholder="Type your username" required /><br>

      <label><b> password :</b></label><br>
      <input type="password" name="password" class="inputvalues" placeholder="Type your password" required/><br>

      <label><b>confirm password :</b></label><br>
      <input type="password" name="cpassword" class="inputvalues" placeholder="Retype your password" required /><br>

      <input type="submit" name="submit" id="signup_btn" value="Sign-up" /><br>
      
      <a href="login.php"><input type="button" name="button" id="back_btn" value="Back" /></a>       
      
 	</form>
 	<?php
      if(isset($_POST['submit'])) 
      {
      	
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				@$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from records where username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into records values('$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welc0ome")</script>';
								/*$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header( "Location: homepage.php");*/
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			
 	?>
 </div>
 
 </body> 
 </html>  f