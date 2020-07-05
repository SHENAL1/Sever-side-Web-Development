 <?php
session_start();

include ("db.php"); //include db.php file to connect to DB
$pagename="View & Edit Products"; //create and populate variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");
include ("detectlogin.php"); //if the user has logged in it will show the login users details
echo "<h4>".$pagename."</h4>";


if(isset($_POST['update_prodId']))
{
		
	$newprice = $_POST['newPrice'];
	$newqutoadd = $_POST['p_quantity'];

	$SQL1="select prodPrice,  prodQuantity from Product where prodId = ".$_POST['update_prodId']." ";

	$exeSQL1=mysqli_query($conn, $SQL1) or die (mysqli_error($conn));
	
	while($arrayqu=mysqli_fetch_array($exeSQL1))
	{
		$newstock = ($arrayqu['prodQuantity'] + $newqutoadd);
		
		if(!empty($newprice)){
			$SQL2="UPDATE Product SET prodQuantity = ".$newstock." , prodPrice = ".$newprice." WHERE prodId = ".$_POST['update_prodId']." ";
			$exeSQL2=mysqli_query($conn, $SQL2) or die (mysqli_error($conn));
		}else{
			$SQL3="UPDATE Product SET prodQuantity = ".$newstock." WHERE prodId = ".$_POST['update_prodId']." ";
			$exeSQL3=mysqli_query($conn, $SQL3) or die (mysqli_error($conn));
		}
	}
		
}

$SQL="select prodId, prodName,prodDescripShort,prodPrice, prodPicNameSmall, prodQuantity from Product";

$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

echo "<table style='border: 0px'>";


	while ($arrayp=mysqli_fetch_array($exeSQL))
	{
	echo "<form action=editproduct.php method=post>";
	
		echo "<tr>";
			echo "<td style='border: 0px'>";
				echo"<a href = prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
				echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
				echo"</a>";
			echo "</td>";
			echo "<td style='border: 0px'>";
				echo "<h5>".$arrayp['prodName']."</h5>"; 
				echo "<p>".$arrayp['prodDescripShort']."</p>";
				echo "<p>Current Price : <b>£ ".$arrayp['prodPrice']."</b>
				New Price <input type = text name = newPrice></p>";
				echo "<p>Current Stock :<b> ".$arrayp['prodQuantity']."</b>
				Add No of items 
				";
				echo "<select name=p_quantity>";

				for($i=0; $i<$arrayp['prodQuantity']+1; $i++){

				   echo" <option value=$i>$i</option>";
				}
				echo"</select></p>";
				
				echo "<input type= submit name = update value='UPDATE'>";
				echo "<input type=hidden name=update_prodId value=".$arrayp['prodId'].">";
			echo "</td>";
		echo "</tr>";
	
	//echo "<input type=hidden name=update_prodPrice value=".$arrayp['prodId'].">";
	//echo "<input type=hidden name= update_prodQuantity value=p_quantity>";
	echo "</form>";
	
	
	
	}
echo "</table>";

	
include ("footfile.html");
echo "</body>";
?>