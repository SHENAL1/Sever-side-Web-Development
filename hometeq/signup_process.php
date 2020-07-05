<?php
	session_start();
	include("db.php");
	$pagename="Your sign up Results"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	$fName=$_POST['fName'];
	$lName=$_POST['lName'];
	$ads=$_POST['ads'];
	$pCode=$_POST['pCode'];
	$TNo=$_POST['TNo'];
	$EAddrs=$_POST['EAddrs'];
	$psw=$_POST['psw'];
	$cPsw=$_POST['cPsw'];
	
		//To check if the fields are filled.
		if (!empty($fName)&&($lName)&&($ads)&&($pCode)&&($TNo)&&($EAddrs)&&($psw)) {
			
			$validatePaswsword = strcmp($psw,$cPsw);
			
			//validating the password
			if($validatePaswsword == 0){
				
				//validating the email
				if (filter_var($EAddrs, FILTER_VALIDATE_EMAIL)) {	
	
					$SQL=
					"insert into 
						users(userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword)
						values ('".$fName."', '".$lName."', '".$ads."', '".$pCode."', '".$TNo."', '".$EAddrs."', '".$psw."')";
	
	
					$exeSQL=mysqli_query($conn,$SQL);
	
						//to check mysql errors
					if (mysqli_errno($conn)==0)
					{
						echo "<b>Sign-Up Successful! </b><br><br>";
						echo "You have sucessfully registered to our page. <br><br>";
						echo "To continue, please<a href='login.php'> LOGIN </a> ";
					}else{
						echo "<p>There is an error with the details you entered.</p>";
						
						//To check if the email exists in the database
						if (mysqli_errno($conn)==1062)
						{
							echo "<b>Sign-Up Failed</b><br><br>";
							echo "Email already in use .<br>";
							echo "You may be already registered or try another email address.<br><br>";
							echo "Go back to <a href='signup.php'>SIGN UP</a>";
						}
						if (mysqli_errno($conn)==1064)
						{
							echo "<b>Sign-Up Failed</b><br><br>";
							echo "<br>Invalid characters entered in the form.";
							echo "Make sure you avoid the following characters : apostrophes like ['] and backslahes like [\] <br><br>";
							echo "Go back to <a href='signup.php'>SIGN UP</a>";
						}
					}
					
				}else{
					echo "<b>Sign-Up Failed</b><br><br>";
					echo "Email not valid<br> ";
					echo "Make sure you enter a correct email address<br><br>";
					echo "Go back to <a href='signup.php'>SIGN UP</a> again.";
				}
				
				
			}else{
				echo "<b>Sign-Up Failed</b><br><br>";
				echo "The 2 Passwords are not matching<br>";
				echo "Make sure you ener them correctly<br><br>";
				echo "Go back to <a href='signup.php'>SIGN UP</a>";
				
			}

		}else{
			echo "<b>Sign-Up Failed</b><br><br>";
			echo"<p>Your SignUp form is incompleted and all fields are mandatory<p>";
			echo"Make sure you provide all the required details<br><br>";
			echo"Go back <a href='signup.php'>SIGN UP</a> ";
		}
	
	
	include("footfile.html"); //include head layout
	echo "</body>";
?>