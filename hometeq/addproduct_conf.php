<?php
	session_start();
	include("db.php");
	$pagename="New Product Confirmation."; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	$pName=$_POST['pName'];
	$spName=$_POST['spName'];
	$lpName=$_POST['lpName'];
	$sDes=$_POST['sDes'];
	$lDes=$_POST['lDes'];
	$price=$_POST['price'];
	$stock=$_POST['stock'];

	
		//To check if the fields are filled.
		if (!empty($pName)&&($spName)&&($lpName)&&($sDes)&&($lDes)&&($price)&&($stock)) {
		
	
					$SQL=
					"insert into 
						product(prodId,prodName,prodPicNameSmall,prodPicNameLarge,prodDescriShort,prodPrice,prodQuantity)
						values ('".$pName."', '".$spName."', '".$lpName."', '".$sDes."', '".$lDes."', '".$price."', '".$stock."')";
	
	
					$exeSQL=mysqli_query($conn,$SQL);
	
						//to check mysql errors
					if (mysqli_errno($conn)==0)
					{
						echo "<b>The product has been added </b><br><br>";
						echo "Name of the small picture ".$spName."<br><br>";
						echo "Name of the large picture ".$lpName."<br><br>";
						echo "Short Description ".$sDes."<br><br>";
						echo "Long Description ".$lDes."<br><br>";
						echo "Price : ".$price."<br><br>";
						echo "Intial Quantity : ".$stock."<br><br>";
						echo "Go to <a href='index.php'> Home Tech </a> ";
					}else{
						echo "<p>There is an error with the details you entered.</p>";
						
						//To check if the product exists in the database
						if (mysqli_errno($conn)==1062)
						{
							echo "<b>Adding a new product Failed</b><br><br>";
							echo "The product name is already in use .<br>";
							echo "You may have already added the product try updating it.<br><br>";
							echo "Go back to <a href='addproduct.php'>Add a Product</a> ";
						}
						if (mysqli_errno($conn)==1064)
						{
							echo "<b>Adding a new product Failed</b><br><br>";
							echo "<br>Invalid characters entered in the form.";
							echo "Make sure you avoid the following characters : apostrophes like ['] and backslahes like [\] <br><br>";
							echo "Go back to <a href='addproduct.php'>Add a Product</a> ";
						}
						if (mysqli_errno($conn)==1054)
						{
							echo "<b>Adding a new product Failed</b><br><br>";
							echo "<br>Invalid characters entered in the form.";
							echo "Please enter the correct numerical value to the correct feilds.<br><br>";
							echo "Go back to <a href='addproduct.php'>Add a Product</a> ";
						}
					}
				
				

		}else{
			echo "<b>Adding a new product Failed</b><br><br>";
			echo"<p>The form is incomplete and all fields are mandatory<p>";
			echo"Make sure you provide all the required details<br><br>";
			echo"Go back <a href='addproduct.php'>Add a Product</a> ";
		}
	//echo"Hi $fname";
	
	include("footfile.html"); //include head layout
	echo "</body>";
?>