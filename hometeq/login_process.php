<?php

session_start();
include("db.php");

	$pagename="Your Login Results"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	$email = $_POST['emailLog'];
	$password = $_POST['pwordLog'];
	
	//echo "Enerted email $email<br>";
	//echo "Enerted password $password<br>";
	
	if (!empty($password)&&($email)){
		
		$SQL="select userId, userType, userFName, userSName, userEmail, userPassword from Users where userEmail = '".$email." '";
		
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
		
		while ($arrayu=mysqli_fetch_array($exeSQL))
		{
			/*if (is_null($arrayu['userEmail']){
				
				//echo "Your email is invalid";
				//$arrayu['userEmail'] = "null";
				
			}else{
				//echo "Your email is valid";
			}*/
			
			$validateemail = strcmp($arrayu['userEmail'],$email);
			
			$validatePassword = strcmp($arrayu['userPassword'],$password);
			
			//validating the email
			//if(!$validateemail == 0){
			if((!$validateemail == 0) || (!$validatePassword == 0) ){
		
				//echo "The email you entered was not recognized<br><br>";
				
				echo "The Password or the email you have entered is not valid<br><br>";
				echo"Go back <a href='login.php'>LOGIN</a> ";
				
			}else{
				
				/*$validatePassword = strcmp($arrayu['userPassword'],$password);
			
				//validating the password
				if(!$validatePassword == 0){
				//if(!$arrayu['userPassword'] == $password){
		
					echo "The Password you entered is not valid<br><br>";
					echo"Go back <a href='login.php'>LOGIN</a> ";
				
				}else{*/
					echo "<b>Login Successful</b><br><br>";
					
					
					$_SESSION['userid'] = $arrayu['userId']; 
					//$_SESSION['usertype'] = $arrayu['userType'];  
					$_SESSION['fname'] = $arrayu['userFName']; 
					$_SESSION['sname'] = $arrayu['userSName']; 
					
					echo "Hello " .$_SESSION['fname']." ".$_SESSION['sname']."<br><br> ";
					
					//Validating the user Type
					$validateUserType = strcmp($arrayu['userType'],"A");
					if($validateUserType == 0){
						$_SESSION['user_type'] = "Administrator"; 
						echo "You have successfully logged in as a hometeq Administrator <br><br>";
						echo "Go to <a href='index.php'>Home Tech</a> <br>";
						echo "<a href='addproduct.php'> Add product </a></br></br>";
						
					}else{
						$_SESSION['user_type'] = "Customer"; 
						echo "You have successfully logged in as a hometeq Customer <br><br>";
						echo "Continue shoping for <a href='index.php'>Home Tech</a> <br><br>";
						echo "View your <a href='basket.php'>Smart Basket</a> ";
					}	
			}
		}
		
	}else{
			echo "<b>Login Failed!</b><br><br>";
			echo"<p>Your login form is incompleted and all fields are mandatory<p>";
			echo"Make sure you provide all the required details<br><br>";
			echo"Go back <a href='login.php'>LOGIN</a> ";
		}
	
	include("footfile.html"); //include head layout
	echo "</body>";
?>