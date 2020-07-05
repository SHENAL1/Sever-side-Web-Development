<?php
session_start();
$pagename="Template"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; 

echo"Thank you ".$_SESSION['fname']." ".$_SESSION['sname']." for using hometeq. Hope to see you soon <br><br>";

session_unset();
session_destroy();

echo"Succesfully Logged Out!!!<br><br>";




include("footfile.html"); //include head layout
echo "</body>";
?>