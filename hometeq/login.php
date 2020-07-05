<?php
session_start();
$pagename="Login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); 
echo "<h4>".$pagename."</h4>"; 


echo"
<form action=login_process.php method=post>
<table>
  <tr>
    <td>Email Address: </td>
    <td><input type=text name=emailLog></td>
  </tr>
  <tr>
  <td>Password: </td>
  <td><input type=password name=pwordLog></td>
</tr>
</table>

<br>
<input type=submit value=Submit>   
<input type=reset value=Clear from>
</form>
";



include("footfile.html"); //include head layout
echo "</body>";
?>