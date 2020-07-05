<?php
	$pagename="Add a New Product"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	echo "<form action= addproduct_conf.php method=post>";
		echo "
		<table>
		<tr> 				
 	 	 	<tr><td>Product Name:</td><td><input type=text name='pName' align='right' ></td></tr> 
 	 	 	<tr><td>Small Picture Name:</td><td><input type=text name='spName'></td></tr>
 			<tr><td>Large Picture Name:</td><td><input type=text name='lpName'></td></tr>
 	 	 	<tr><td>Short Description:</td><td><input type=text name='sDes'></td></tr>
			<tr><td>Long Description:</td><td><input type=text name='lDes'></td></tr>
			<tr><td>Price:</td><td><input type=text name='price'></td></tr>
			<tr><td>Initial Stock Quality:</td><td><input type=text name='stock'></td></tr>
		
			
 	 	 	<tr><td><input type=submit value=Add Product></input></td>
			<td><input type=reset value=Clear Form></input></td></tr>
			</tr>
			</table>
			";
	
 	 	 	//echo "<input type=hidden name=r_prodId value=".$index.">";
 	 	 	echo "</form>";
	include("footfile.html"); //include head layout
	echo "</body>";
?>