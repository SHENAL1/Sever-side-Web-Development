<?php
	$pagename="Sign Up"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	echo "<form action= signup_process.php method=post>";
		echo "
		<table>
		<tr> 				
 	 	 	<tr><td>First Name:</td><td><input type=text name='fName' align='right' ></td></tr> 
 	 	 	<tr><td>Last Name:</td><td><input type=text name='lName'></td></tr>
 			<tr><td>Address:</td><td><input type=text name='ads'></td></tr>
 	 	 	<tr><td>Postcode:</td><td><input type=text name='pCode'></td></tr>
			<tr><td>Tel No:</td><td><input type=text name='TNo'></td></tr>
			<tr><td>Email Address:</td><td><input type=text name='EAddrs'></td></tr>
			<tr><td>Password:</td><td><input type=password name='psw'></td></tr>
			<tr><td>Confirm Password:</td><td><input type=password name='cPsw'></td></tr>
			
 	 	 	<tr><td><input type=submit value=Sign Up></input></td>
			<td><input type=reset value=Clear Form></input></td></tr>
			</tr>
			</table>
			";
	
 	 	 	//echo "<input type=hidden name=r_prodId value=".$index.">";
 	 	 	echo "</form>";
	include("footfile.html"); //include head layout
	echo "</body>";
?>