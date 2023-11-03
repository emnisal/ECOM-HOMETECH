<?php
session_start();
$pagename="Login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "<table style='border: 0px'>";
echo "<form method=post action= login_process.php>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>Email Address</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=text name='email'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<label>Password</label>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<input type=password name='password'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'>";
echo "<input type=submit name='login' value='Login'>";
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