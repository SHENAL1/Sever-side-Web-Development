<?php
session_start();

include ("db.php"); //include db.php file to connect to DB
	$pagename="Process Orders"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	include ("detectlogin.php"); //if the user has logged in it will show the login users details
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	//SQL JOIN query to Retrieve the order number, order date and time, order status, user ID, name and surname of the user,  
	//name of the products and numbers of items for each product from Users, Orders, Order_Line and Product tables. 
				   
	//Run SQL Query 			   

	//Create an array of records to fetch the results of the execution of the SQL JOIN queries & iterate through the array 
	
	if(isset($_POST['update_orderNo'])){
		$status = $_POST['updateStatus'];
		
		$status_Ready = strcmp($status,'ready');
		$status_Collected = strcmp($status,'collected');
		
		if($status_Ready ==0)
		{
			
			$SQL1="UPDATE orders SET orderStatus = 'Ready' where orderNo = ".$_POST['update_orderNo']."";
			$exeSQL1=mysqli_query($conn, $SQL1) or die (mysqli_error($conn));
		}
		elseif($status_Collected ==0)
		{
			
			$SQL2="UPDATE orders SET orderStatus = 'Collected' where orderNo = ".$_POST['update_orderNo']."";
			$exeSQL2=mysqli_query($conn, $SQL2) or die (mysqli_error($conn));
		}
	}
	
	echo "<table>
 	 	 		<tr>
 	 	 			<th>Order No</th>
 	 	 			<th>Order Date Time</th>
 	 	 			<th>User Id</th>
 	 	 			<th>Name</th>
 	 	 			<th>Surname</th>
					<th>Staus</th>
					<th>Product</th>
					<th>Quantity</th>
 	 	 		</tr>";
				
	$SQL="SELECT orders.orderNo, orders.orderDateTime, users.userId, users.userFname, users.userSName , orders.orderStatus, product.prodName, order_line.quantityOrdered
	FROM (((orders
	INNER JOIN users ON orders.userId = users.userId)
	INNER JOIN order_line ON orders.orderNo = order_line.orderNo)
	INNER JOIN product ON order_line.prodId = product.prodId);";
				   
	//Run SQL Query 			   
	$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));			
				
	while($arrayu=mysqli_fetch_array($exeSQL))
	{
		echo "<form action=processorders.php method=post>";
		echo "<tr>
				
				<td>".$arrayu['orderNo']."</td>
				<td>".$arrayu['orderDateTime']."</td>
				<td>".$arrayu['userId']."</td>
				<td>".$arrayu['userFname']."</td>
				<td>".$arrayu['userSName']."</td>
				<td> ";
				
				$validateStatus_Placed = strcmp($arrayu['orderStatus'],'Placed');
				$validateStatus_Ready = strcmp($arrayu['orderStatus'],'Ready');
				$validateStatus_Collected = strcmp($arrayu['orderStatus'],'Collected');
				
					if($validateStatus_Placed==0)
					{
						echo" <select name= updateStatus>";
							echo "<option value='placed'>".$arrayu['orderStatus']."</option>";
							echo "<option value='ready'>Ready to Collect</option>";
						
						echo "</select>";
						echo "<input type=submit value= Update></input>";
					}
					elseif($validateStatus_Ready==0)
					{
						echo" <select name= updateStatus>";
							echo "<option value='ready'>".$arrayu['orderStatus']."</option>";
							echo "<option value='collected'>Collected</option>";
						
						echo "</select>";
						echo "<input type=submit value= Update></input>";
					}
					elseif($validateStatus_Collected==0)
					{
						echo "Collected";
					}
					
				echo "</td>
				
				
				
				<td>".$arrayu['prodName']."</td>
				<td>".$arrayu['quantityOrdered']."</td>
				
				
			</tr>";
 	 	 	echo "<input type=hidden name=update_orderNo value= ".$arrayu['orderNo'].">";			
			echo "</form>";
	}
	echo "</table>";
	
	
	
	
	/*if(isset($arrayu['orderStatus']))
	{
		echo "<select name= updateStatus>";

			echo "<option value='Placed'>Volvo</option>";
			echo "<option value='Ready to Collect'>Saab</option>";
	echo"</select>";
	}*/
	
	
	 
	//For every order create HTML table with Order No, Order Date Time, User Id, Name, Surname, Status, Product, Quantity 
	//In HTML table display values retrieved from the DB table through the array of records: Order No, Order Date Time,  
	//User Id, Name, Surname, Status, Product and Quantity 
	
	
	
	
	
	include("footfile.html"); //include head layout
	echo "</body>";
?>