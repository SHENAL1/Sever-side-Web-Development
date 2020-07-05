<?php
session_start();
include("db.php");
	$pagename="Order Confirmation"; //Create and populate a variable called $pagename
	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
	echo "<title>".$pagename."</title>"; //display name of the page as window title
	echo "<body>";
	include ("headfile.html"); //include header layout file
	include ("detectlogin.php");
	echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
	
	//store the current date and time in a local variable $currentdatetime
//use the date PHP function with the 'Y-m-d H:i:s' parameters to make it compatible with the MySQL format.
//write a SQL query to insert a new record in the Orders table to generate a new order.
//store the id of the user who is placing the order $_SESSION ['userId']and the current date and time
//Run the SQL query.
	
	
	$currentdatetime = date('Y-m-d H:i:s');
	//echo "<hr><b>".$currentdatetime."</b><br>";
	
	$userId=$_SESSION['userid'];
	//echo "id = ".$userId."<br>";
	
	//$orderTotal =
	
	/*$SQL="insert into 
						orders (userId, orderDateTime, orderTotal)
						values (".$userId.",'".$currentdatetime."', ".$orderTotal.")";*/
	
	$SQL="insert into 
						orders (userId, orderDateTime, orderStatus )
						values (".$userId.",'".$currentdatetime."', 'Placed')";
					
					$exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
					
	//if no database error is returned and the database error code is 0 i.e. if the new order was inserted correctly {  
	if (mysqli_errno($conn)==0){
		
		//SQL SELECT query to retrieve max order number for current user (for which id matches the id in the session)
		//to retrieve the order number of most recent order placed by current user 	
			
		$SQL="select orderNo, userId, orderDateTime from orders where userId = '".$userId." '";
		 
		//execute SQL query  
		$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
		
		//fetch the result of the execution of the SQL statement and store it in an array arrayord
		while ($arrayord=mysqli_fetch_array($exeSQL)){
			//store the value of this order number in a local variable
			$orderId= $arrayord['orderNo'];
			
			//display message to confirm that order has been placed successfully and display the order number.    
			echo "<b>Successful order </b> - ORDER REFERANCE NO : ".$orderId."";
			
			//as for basket.php, display a table header for product name, price, quantity and subtotal  
		}
			echo "<table>
 	 	 		<tr>
 	 	 			<th>Product Name</th>
 	 	 			<th>Price</th>
 	 	 			<th>Quantity</th>
 	 	 			<th>Sub Total</th>
 	 	 		</tr>";
				
				$total_amount=0;
				
			//as for basket.php, FOREACH loop through basket session array & split value from index for every cell  { 
			foreach($_SESSION['basket'] as $index => $value)
 	 	 	{       
			
			
				$SQL="select prodName,prodPrice from product where prodId=$index";
				
				//execute SQL query, fetch the records and store them in an array of records $arrayb.   
				$exeSQL1=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

				//SQL query to retrieve product id, name and price from product table for every index in FOREACH loop
				while ($arrayb=mysqli_fetch_array($exeSQL1))
				{
				//Calculate subtotal   
				$subTotal=$value*$arrayb['prodPrice'];
				
				//increment total (same as for basket.php)  } 
 	 	 		$total_amount+=$subTotal;

				//display the product name, price, ordered quantity and subtotal (same as for basket.php)
				echo "<form action=basket.php method=post>";
 	 	 		echo "<tr>
 	 	 				
 	 	 				<td>".$arrayb['prodName']."</td>
 	 	 				<td>".$arrayb['prodPrice']."</td>
 	 	 				<td>".$value."</td>
 	 	 				<td>".$subTotal."</td>
 	 	 				
 	 	 			</tr>";

				//SQL INSERT query to store details of ordered items in Order_line table in the DB i.e. order number,  
				//product id (index), ordered quantity (content of the session array) and subtotal. Execute query. 
				
				$SQL="insert into 
						order_line (orderNo, prodId, quantityOrdered, subTotal)
						values (".$orderId.",".$index.", ".$value.",".$subTotal.")";
					
					$exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
 	 	 	
 	 	 	echo "</form>";

				}
 	 	 	}
			//create a new table row to display the total (same as for basket.php) 
			echo "<tr><td colspan='3'><b>Total Amount</b></td>
 	 	 				<td>".$total_amount."</td>";	
				
			echo "</table>";
			
			//SQL UPDATE query to update the total value in the order table for this specific order 
			$SQL= "UPDATE orders SET orderTotal = '".$total_amount."' WHERE userId = '".$userId."'";
			
			$exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
		 
		
		
		//execute SQL query and display logout link. } 
		echo "<br>To log out and leave the system <a href = 'logout.php'>Logout</a>";
	
	//else i.e. if a database error is returned, display an order error message {
	}else{
		//Display an error message that indicates that there has been an error with placing the order } 
		echo "An Error occurred when placing the order";
	}
	//Unset the basket session array				
					
					
					
	
	include("footfile.html"); //include head layout
	echo "</body>";
?>