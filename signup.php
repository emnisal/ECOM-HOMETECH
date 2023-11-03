<?php
session_start();
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); 
echo "<h4>".$pagename."</h4>";
echo "<table style='border: 0px'>";
echo "<form method=post action= signup_process.php>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*First Name</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='firstName'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Last Name</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='lastName'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Address</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='address'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Postcode</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='postcode'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Tel No</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='telNo'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Email Address</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='email'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Password</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=password name='pw1'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>*Confirm Password</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=password name='pw2'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<input type=submit name='signup' value='Sign up'>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=reset name='clearForm' value='Clear Form'>";
echo "</td>";
echo "</tr>";

echo "</form>";
echo "</table>";

include("footfile.html"); //include head layout
echo "</body>";
?>